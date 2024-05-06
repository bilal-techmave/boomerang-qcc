<?php

namespace App\Http\Controllers;

use App\Models\GeoCity;
use App\Models\GeoState;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;

class GeoController extends Controller
{

    protected $geoStates ;
    protected $geoCities ;

    public function __construct()
    {
        $stateCacheKey = 'all_geo_states';
        $cityCacheKey = 'all_geo_cities';

        $this->geoStates = Cache::remember($stateCacheKey, 60, function () {
            return GeoState::orderBy('id','DESC')->get();
        });
        $this->geoCities = Cache::remember($cityCacheKey, 60, function () {
            return GeoCity::with(['state'])->orderBy('id','DESC')->get();
        });
    }

    public function city_index()
    {
        return view('dashboard.financial.work-order-dashboard');
    }

    public function managerDashboard()
    {
        return view('dashboard.financial.manager-dashboard');
    }

    public function cities(Request $request) {
        $states = $this->geoStates;
        $cities = $this->geoCities;
        return view('administration.cities',compact('cities','states'));
    }

    public function create_city(Request $request){
        $this->validate($request,[
            'city_name' => 'required|unique:geo_cities,city_name',
            'geo_state_id' => 'nullable'
        ]);
        $citydata = [
            'geo_state_id'  => $request->geo_state_id,
            'city_name'     => $request->city_name,
        ];
        $city = GeoCity::create($citydata);
        if ($city) {
            Cache::forget('all_geo_cities');
            return redirect()->route('administration.cities')->with('success','City Added Successfully');
        }
        else{
            return redirect()->back()->with('error','Something went wrong');
        }
    }

    public function update_city(Request $request){

        $oldCityData = GeoCity::whereId($request->id)->first();
        $validator = Validator::make($request->all(), [
            'city_name' => 'required|unique:geo_cities,city_name,'.$oldCityData->city_name.',city_name',
            'geo_state_id' => 'nullable'
        ]);
        if($validator->fails()){
            return  response()->json([
                'status' => false,
                'message' => $validator->errors()->first(),
                'response' => $validator->errors()
            ], 400);
        }else{
            $citydata = [
                'geo_state_id'  => $request->geo_state_id,
                'city_name'     => $request->city_name,
            ];
            $city = GeoCity::whereId($request->id)->update($citydata);
            if ($city) {
                Cache::forget('all_geo_cities');
                return redirect()->route('administration.cities')->with('success','City Updated Successfully');
                
                // return redirect()->route('administration.cities')->with('success','City Updated Successfully');
            }
            else{

                return redirect()->route('administration.cities')->with('success','Something went wrong');
            }
        }
    }

    public function unique_check(Request $request){
        if($request->colname){
            if($request->previousVal && trim($request->previousVal) != '' && $request->previousVal == urldecode($request->colvalue)){
                return response()->json([
                    "status" => true,
                    "message"=> "1"
                ]);
            }elseif(GeoCity::where($request->colname, urldecode($request->colvalue))->exists()){
                return response()->json([
                    "status" => false,
                    "message"=> "Please fill unique data. It's already exists."
                ]);
            }
            return response()->json([
                "status" => true,
                "message"=> $request->colname.' '.urldecode($request->colvalue)
            ]);
        }else{
            return response()->json([
                "status" => true,
                "message"=> "3"
            ]);
        }
    }

    public function unique_check_state(Request $request){
        if($request->colname){
            if($request->previousVal && trim($request->previousVal) != '' && $request->previousVal == urldecode($request->colvalue)){
                return response()->json([
                    "status" => true,
                    "message"=> "1"
                ]);
            }elseif(GeoState::where($request->colname, urldecode($request->colvalue))->exists()){
                return response()->json([
                    "status" => false,
                    "message"=> "Please fill unique data. It's already exists."
                ]);
            }
            return response()->json([
                "status" => true,
                "message"=> $request->colname.' '.urldecode($request->colvalue)
            ]);
        }else{
            return response()->json([
                "status" => true,
                "message"=> "3"
            ]);
        }
    }


    


    public function states(Request $request) {
        $states = $this->geoStates;
        return view('administration.states',compact('states'));
    }

    public function create_state(Request $request){

        $this->validate($request,[
            'state_name' => 'required|unique:geo_states,state_name',
            'state_timezone' => 'nullable'
        ]);

        $statedata = [
            'state_name'     => $request->state_name,
            'state_timezone'     => $request->state_timezone,
        ];
        $state = GeoState::create($statedata);
        if ($state) {
            Cache::forget('all_geo_states');
            return redirect()->route('administration.states')->with('success','State Added Successfully');
        }
        else{
            return redirect()->back()->with('error','Something went wrong');
        }
    }

    public function update_state(Request $request){
        // dd($request->all());
        $oldStateData = GeoState::whereId($request->id)->first();
        $validator = Validator::make($request->all(), [
            'state_name' => 'required|unique:geo_states,state_name,'.$oldStateData->state_name.',state_name',
            'state_timezone' => 'nullable'
        ]);
        if($validator->fails()){
            return  response()->json([
                'status' => false,
                'message' => $validator->errors()->first(),
                'response' => $validator->errors()
            ], 400);
        }else{
            $statedata = [
                'state_name'     => $request->state_name,
                'state_timezone'     => $request->state_timezone,
            ];
            $state = GeoState::whereId($request->id)->update($statedata);
            if ($state) {
                Cache::forget('all_geo_states');
                return redirect()->route('administration.states')->with('success','State Updated Successfully');
            }
            else{
                return redirect()->route('administration.states')->with('error','Something went wrong');
                
            }
        }
    }



}
