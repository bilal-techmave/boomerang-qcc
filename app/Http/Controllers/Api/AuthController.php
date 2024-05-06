<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Common\ImageController;
use App\Http\Controllers\Controller;
use App\Mail\Cleaner\ForgotPasswordMail;
use App\Mail\WebSiteMail;
use App\Models\User;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login','paymentGate', 'register','forgot_password','verity_reset_code','update_password']]);//login, register methods won't go through the api guard
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return  response()->json([
                'status' => false,
                'message' => $validator->errors()->first(),
                'response' => $validator->errors()
            ], 422);
        }elseif(!User::where(['role'=>'cleaner','email'=>$request->email])->exists()){
            return  response()->json([
                'status' => false,
                'message' => 'The selected email is invalid.'
            ], 422);
        }elseif(User::where(['role'=>'cleaner','email'=>$request->email,'login_status'=>'0'])->exists()){
            return  response()->json([
                'status' => false,
                'message' => 'The selected email is not allowed for login.'
            ], 422);
        }elseif(User::where(['role'=>'cleaner','email'=>$request->email,'status'=>'0'])->exists()){
            return  response()->json([
                'status' => false,
                'message' => 'The cleaner is inactive.'
            ], 422);
        }

        if (!$token = JWTAuth::attempt($validator->validated())) {
            return  response()->json([
                'status' => false,
                'message' => 'Invalid Credentials.'
            ], 422);
        }

        return $this->respondWithToken($token);
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            'email' => 'required|string|email|max:100|unique:users,email',
            'password' => 'required|min:6',
        ]);
        if($validator->fails()){
            return  response()->json([
                'status' => false,
                'message' => $validator->errors()->first(),
                'response' => $validator->errors()
            ], 400);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'cleaner',
            'status' => 0
        ]);

        // $token = JWTAuth::fromUser($user);

        return response()->json([
            'status' => true,
            'message' => 'Your cleaner request has been submitted successfully, you will get a mail once admin approve it',
        ], 200);
    }

    public function logout()
    {
        auth()->logout();
        return response()->json([
            'status' => true,
            'message' => 'Successfully logged out'
        ]);
    }


    public function refresh(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|exists:users,email',
        ]);
        if($validator->fails()){
            return  response()->json([
                'status' => false,
                'message' => $validator->errors()->first(),
                'response' => $validator->errors()
            ], 400);
        }
        $user = User::where('email',$request->email)->first();
        if(User::where(['role'=>'cleaner','email'=>$request->email,'login_status'=>'0'])->exists()){
            return  response()->json([
                'status' => false,
                'message' => 'The selected email is not allowed for login.'
            ], 422);
        }elseif(User::where(['role'=>'cleaner','email'=>$request->email,'status'=>'0'])->exists()){
            return  response()->json([
                'status' => false,
                'message' => 'The cleaner is inactive.'
            ], 422);
        }
        $token = JWTAuth::fromUser($user);
        return response()->json([
            'status' => true,
            'image_root' => 'https://techmavedesigns.com/development/boomerang_qcc/storage/app/public',
            'user' => $user,
            'access_token' => $token,
        ], 200);
    }


    protected function respondWithToken($token)
    {
        return  response()->json([
            'status' => true,
            'image_root' => 'https://techmavedesigns.com/development/boomerang_qcc/storage/app/public',
            'user'=>auth()->user(),
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }

    public function profile()
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
            if (!$user) {
                return  response()->json([
                    'status' => false,
                    'message'=>'user not found'
                ],403);
            }
        } catch (JWTException $e) {
            return  response()->json([
                'status' => false,
                'message'=>$e->getMessage()
            ],500);
        }

        return  response()->json([
            'status' => true,
            'user'=>$user,
            'image_root' => 'https://techmavedesigns.com/development/boomerang_qcc/storage/app/public'
        ]);
    }


    public function forgot_password(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:100|exists:users,email',
        ]);
        if($validator->fails()){
            return  response()->json([
                'status' => false,
                'message' => $validator->errors()->first(),
                'response' => $validator->errors()
            ], 400);
        }else
        $user = User::where(['role'=>'cleaner','email'=>$request->email])->first();
        if(!$user){
            return  response()->json([
                'status' => false,
                'message' => 'The selected email is invalid.'
            ], 422);
        }

        // $verify_code = rand(1000,9999);
        $data = ['code'=>'5655'];

        $password = $this->randomPassword();
        $newPassword = Hash::make($password);

        $sendmail = Mail::to($request->email)->send(new WebSiteMail('lost_password','Lost Password',['NEW_PASSWORD'=>$password]));
        // $sendmail = Mail::to($request->email)->send(new ForgotPasswordMail('Forgot Password',['code'=>'5655']));
        if($sendmail){
            User::where('email',$request->email)->update(['verify_code'=>'5655','password'=>$newPassword]);
            return  response()->json([
                'status' => true,
                'message' => 'Mail sent.'
            ]);
        }

        return  response()->json([
            'status' => true,
            'message' => 'Mail Failed Please Try After Sometime.'
        ]);
    }

    public function verity_reset_code(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:100|exists:users,email',
            'verify_code' => 'required|min:4'
        ]);

        if($validator->fails()){
            return  response()->json([
                'status' => false,
                'message' => $validator->errors()->first(),
                'response' => $validator->errors()
            ], 400);
        }
        $user = User::where(['role'=>'cleaner','email'=>$request->email])->first();
        if(!$user){
            return  response()->json([
                'status' => false,
                'message' => 'The selected email is invalid.'
            ], 422);
        }
        if(!User::where(['role'=>'cleaner','email'=>$request->email,'verify_code'=>$request->verify_code])->exists()){
            return  response()->json([
                'status' => false,
                'message' => 'Invalid verification code.'
            ], 422);
        }

        User::where('email',$request->email)->update(['verify_code'=>'1']);
        return  response()->json([
            'status' => true,
            'message' => 'Code Verified.'
        ]);

    }

    public function update_password(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:100|exists:users,email',
            'password' => 'required|min:6'
        ]);

        if($validator->fails()){
            return  response()->json([
                'status' => false,
                'message' => $validator->errors()->first(),
                'response' => $validator->errors()
            ], 400);
        }
        $user = User::where(['role'=>'cleaner','email'=>$request->email,'verify_code'=>'1'])->first();
        if(!$user){
            return  response()->json([
                'status' => false,
                'message' => 'The selected email is invalid.'
            ], 422);
        }

        User::where('email',$request->email)->update(['verify_code'=>null,'password'=>Hash::make($request->password)]);
        return  response()->json([
            'status' => true,
            'message' => 'Password updated successfully.'
        ]);




    }

    public function edit_profile(Request $request){
        $validator = Validator::make($request->all(), [
            'name'=>'nullable',
            'password' => 'nullable|min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'nullable|min:6',
            'profile_image'=>'nullable|image|max:2048'
        ]);

        if($validator->fails()){
            return  response()->json([
                'status' => false,
                'message' => $validator->errors()->first(),
                'response' => $validator->errors()
            ], 400);
        }

        $cleaner_id = auth()->user()->id;

        $cleaner_profile = 'cleaner';
        $after_image = $request->file('profile_image');
        $cleaner_data = array();
        $cleaner_data['name'] = $request->name;
        if($request->password){
        $cleaner_data['password'] = Hash::make($request->password);
        }
        if($after_image){
            $profile_image= ImageController::upload($after_image,$cleaner_profile);
            $cleaner_data['profile_image'] = $profile_image;
        }

        User::where(['role'=>'cleaner','id'=>$cleaner_id])->update($cleaner_data);
        $user = User::where(['role'=>'cleaner','id'=>$cleaner_id])->first();
        return  response()->json([
            'status' => true,
            'user'=>$user,
            'message' => 'Profile updated successfully.',
        ]);
    }

    protected function randomPassword() {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }


}
