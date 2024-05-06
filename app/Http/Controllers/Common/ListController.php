<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use App\Models\ClientPortfolio;
use App\Models\ClientPortfolioSite;
use App\Models\ClientSite;
use App\Models\Comment;
use App\Models\JobsubType;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class ListController extends Controller
{
    public function statusUpdate(Request $request)
    {
        try{
            DB::table($request->tdata)->where('id',$request->id)->update(['status'=>$request->status]);
            Cache::forget('all_'.$request->tdata);
            return 1;
        } catch (\Exception $e) {
            return 0;
        }
    }


    // public function addComment(Request $request){
    //     $user_id = $request->user_id;
    //     $user_type = $request->user_type;
    //     $contact_type = $request->contact_type;
    //     $data_id = $request->data_id;

    //     $addedcomment = Comment::create(['contact_type'=>$contact_type,'data_id'=>$data_id,'user_id'=>$user_id,'user_type'=>$user_type]);
    //     return ['data'=>$addedcomment];
    // }

    public function addPerson(Request $request){
        $name = $request->personName;
        $surname = $request->personSurname;
        $email = $request->personEmail;
        $phone_number = $request->personPhoneNumber;
        if(User::where('email',$email)->exists()){
            return ['status'=>false,'msg'=>'This Email Already Exists.'];
        }else{
            $adduser = User::create(['name'=>$name,'surname'=>$surname,'email'=>$email,'phone_number'=>$phone_number,'login_status'=>0,'status'=>1]);
            return ['status'=>true,'data'=>$adduser->id];
        }

    }


    public function deleteRecord(Request $request){
        $data_id=$request->data_id;
        $table_name=$request->table_name;
        $tname = "App\Models\\" . $table_name;
        $tname::whereId($data_id)->delete();
        return ['status'=>1,'msg'=>'deleted'];
    }


    public function subJob(Request $request){
        $job_id=$request->worktype;
        $all_subjob = JobsubType::where(['job_type_id'=>$job_id,'status'=>'active'])->get()->pluck('name','id')->toArray();
        return ['status'=>1,'data'=>$all_subjob];
    }

    public static function getDistance($lat1,$long1,$lat2,$long2){
        $earthRadius = 6371; // Radius of the earth in kilometers
        // Convert latitude and longitude from degrees to radians
        $lat1Rad = deg2rad($lat1);
        $lon1Rad = deg2rad($long1);
        $lat2Rad = deg2rad($lat2);
        $lon2Rad = deg2rad($long2);

        // Calculate the change in coordinates
        $deltaLat = $lat2Rad - $lat1Rad;
        $deltaLon = $lon2Rad - $lon1Rad;

        // Haversine formula to calculate distance
        $a = sin($deltaLat / 2) * sin($deltaLat / 2) + cos($lat1Rad) * cos($lat2Rad) * sin($deltaLon / 2) * sin($deltaLon / 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        $distances = $earthRadius * $c;
        $distance = $distances*1000;
        return $distance;
    }


    public function clientPortfolioData(Request $request){
        try{
            $client_id = $request->client_id;
            if($client_id){
                $allportfolio = ClientPortfolio::where('client_id',$client_id)->get();
                $allsites = ClientPortfolioSite::with('site')->whereIn('client_portfolio_id',$allportfolio->pluck('id')->toArray())->get();
                return response()->json([
                    'status' => true,
                    'data' => $allportfolio,
                    'sites' =>$allsites
                ], 200);
            }else{
                return response()->json([
                    'status' => false,
                    'message' => 'Site Not Found.'
                ], 200);
            }
        }catch(Exception $e){
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 200);
        }
    }

    public function portfolioSiteData(Request $request){
        try{
            $portfolio_id = $request->portfolio_id;
            $client_id = $request->client_id;
            if($portfolio_id){
                $allsites = ClientSite::where(['portfolio_id'=>$portfolio_id,'client_id'=>$client_id])->get();
                return response()->json([
                    'status' => true,
                    'data' => $allsites
                ], 200);
            }else{
                return response()->json([
                    'status' => false,
                    'message' => 'Site Not Found.'
                ], 200);
            }
        }catch(Exception $e){
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 200);
        }
    }
}
