<?php

namespace App\Http\Controllers;

use App\Mail\Cleaner\ForgotPasswordMail;
use App\Mail\WebSiteMail;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Validator;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login(Request $request)
    {
        // dd(User::all());
        if($request->isMethod('POST')){

            $validator = Validator::make($request->all(), [
                'email' => 'required|email|exists:users,email',
                'password' => 'required'
            ]);

            $remember_me = $request->has('remember_me') ? true : false;

            if (User::where(['login_status' => '0', 'email' => $request->email])->exists()) {
                $validator->errors()->add('email', 'Login Access Failed.');
                return redirect()->back()->withErrors($validator)->withInput();
            }

            if (User::where(['status' => '0', 'email' => $request->email])->exists()) {
                $validator->errors()->add('email', 'Inactive user found.');
                return redirect()->back()->withErrors($validator)->withInput();
            }

            // Check for validation failure after adding custom errors
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            } else {
                // Perform login attempt if validation passes
                if (Auth::guard('web')->attempt($request->only(['email', 'password']), $remember_me)) {
                    if(Auth::guard('web')->user()->role == 'cleaner') return redirect()->route('cleaner.dashboard');
                    else return redirect()->route('dashboard');
                } else {
                    // Add custom error message if login attempt fails
                    $validator->errors()->add('email', 'Invalid email or password.');
                    return redirect()->back()->withErrors($validator)->withInput();
                }
            }




        }
        return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function regester()
    {
        return view('auth.regester');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function forgotpwd(Request $request)
    {
        if($request->isMethod('POST')){
            $this->validate($request,[
                'email' => 'required|email|exists:users,email'
            ]);

            $password = $this->randomPassword();
            $newPassword = Hash::make($password);

            $sendmail = Mail::to($request->email)->send(new WebSiteMail('lost_password','Lost Password',['NEW_PASSWORD'=>$password]));
            // $sendmail = Mail::to($request->email)->send(new ForgotPasswordMail('Forgot Password',['code'=>'5655']));
            if($sendmail){
                User::where('email',$request->email)->update(['verify_code'=>'5655','password'=>$newPassword]);
                return  redirect()->back()->with('success','Forgot Password Mail Send Successfully.');
            }
        }
        return view('auth.forgot-password');
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
