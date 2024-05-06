<?php

namespace App\Http\Controllers;

use App\Helpers\DataTableHelper;
use App\Models\User;
use Illuminate\Http\Request;

class TestController extends Controller
{


    public function ajaxIndex(Request $request){
        $columnMapping = [
            'id' => 'id',
            'Name Data' => 'name',
            'Email' => 'email',
            'Created At' => 'created_at',
            'Status' => 'status',
            'Action' => 'id',
        ];
        $relations = ['rolename'];
        $pageStr = "user_table";
        $query = User::with($relations)->whereNotIn('role',['admin']);
        return DataTableHelper::getData($request, $query, $columnMapping,$pageStr);
    }

    public function index(Request $request)
    {
        dd(public_path('storage'),storage_path('app/public'));
        return view('test');
    }


}
