<?php

namespace App\Helpers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Cache;
use Auth;
use Str;

class DataTableHelper
{
    public static function getData(Request $request, Builder $query, array $columnMapping, string $pageStr)
    {

        $cacheKey = 'datatable_' . $pageStr . '_' . md5(serialize($request->all()));
        // Cache::forget($cacheKey);
        if (Cache::has($cacheKey)) {
            return Cache::get($cacheKey);
        }

        $columns = array_column($request->input('columns'), 'data');
        $columnData = $request->input('columns');
        $totalDataQuery = clone $query;
        $totalData = $totalDataQuery->count();

        $limit = $request->input('length');
        $start = $request->input('start');
        $orderColumnIndex = $request->input('order.0.column') ?? 'id';
        $orderDirection = $request->input('order.0.dir') ?? 'DESC';

        // dd($request->all() );

        // Apply search filter
        $searchValue = $request->input('search.value');
        if (!empty($searchValue)) {
            $query->where(function ($query) use ($columnMapping, $searchValue) {
                foreach ($columnMapping as $columnLabel => $columnPath) {
                    // Split the column path by dots to get nested relations
                    $columnParts = explode('.', $columnPath);
                    $lastPart = end($columnParts); // Get the last part of the column path

                    // Extract the column name from the last part
                    $columnName = preg_replace('/\.(.*)/', '', $lastPart);

                    // Apply where condition based on the column path
                    if (count($columnParts) > 1) {
                        // Handle nested relations
                        $relation = implode('.', array_slice($columnParts, 0, -1));
                        $query->orWhereHas($relation, function ($query) use ($lastPart, $searchValue) {
                            $query->where($lastPart, 'LIKE', '%' . $searchValue . '%');
                        });
                    } else {
                        // Handle direct column access
                        $query->orWhere($columnName, 'LIKE', '%' . $searchValue . '%');
                    }
                }
            });
        }
        if ($columns) {
            foreach ($columns as $kk => $col) {
                if (isset($columnData[$kk]['search']['value']) && $columnData[$kk]['search']['value'] !== null) {
                    $query->Where($columnMapping[$col], $columnData[$kk]['search']['value']);
                }
            }
        }

        $totalFiltered = $query->count();



        // Order by column
        $orderColumn = $columns[$orderColumnIndex]??'id';
        $query->orderBy($orderColumn, $orderDirection);

        // Fetch data
        $data = $query->offset($start)
            ->limit($limit)
            ->get();


        $formattedData = [];
        if ($pageStr == "user_table") {
            $formattedData = self::userData($data, $columns, $columnMapping);
        }elseif($pageStr == "client_table"){
            $formattedData = self::clientData($data, $columns, $columnMapping);
        }



        // Prepare JSON response
        $json_data = [
            "draw" => intval($request->input('draw')),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $formattedData
        ];

        Cache::put($cacheKey, $json_data, now()->addMinutes(.5));

        return response()->json($json_data);
    }


    // Helper function to get nested property
    private static function getNestedProperty($item, $property)
    {
        $nestedProperties = explode('.', $property);
        $value = $item;
        foreach ($nestedProperties as $nestedProperty) {
            if (is_array($value) && array_key_exists($nestedProperty, $value)) {
                $value = $value[$nestedProperty];
            } elseif (is_object($value) && isset($value->{$nestedProperty})) {
                $value = $value->{$nestedProperty};
            } else {
                return '';
            }
        }
        return $value;
    }


    private static function clientData($items, $columns, $columnMapping)
    {
        $D = json_decode(json_encode(Auth::guard('adminLogin')->user()->get_role()),true);
        $arr = [];
        foreach($D as $v)
        {
            $arr[] = $v['permission_id'];
        }

        $formattedData = [];
        foreach ($items as $item) {
            $nestedData = [];
            foreach ($columns as $column) {
                $actualColumnName = $columnMapping[$column] ?? $column;
                $newNColumn = self::getNestedProperty($item, $actualColumnName);

                $nestedData[$column] = $newNColumn;

                $tdHtml = '';
                if($column == "Status"){
                    $tableId = $nestedData['id'];
                    $tdHtml = '<div class="form-group">
                        <select class="form-control select2 form-select" onchange="changeStatus(\'' . $tableId . '\',this)" data-placeholder="Choose one" style="padding: 8px 15px;">
                            <option value="1"';
                    if ($newNColumn == 1) {
                        $tdHtml .= ' selected';
                    }
                    $tdHtml .= '>Active</option>
                            <option value="2"';
                    if ($newNColumn == 2) {
                        $tdHtml .= ' selected';
                    }
                    $tdHtml .= '>Inactive</option>
                        </select>
                        <p id="message' . $tableId . '" class="message"></p>
                    </div>';
                    $nestedData[$column] =$tdHtml;
                }

                if($column == "Action"){
                    $tableId = $nestedData['id'];
                    $actionHtml = '<div class="g-2">';

                    if (in_array("22", $arr)) {
                        $actionHtml .= '<a class="btn text-info btn-sm" href="' . route('client.view', ['id' => $tableId]) . '" data-bs-toggle="tooltip" data-bs-original-title="View"><span class="fe fe-eye fs-14"></span></a>';
                    }

                    if (in_array("23", $arr)) {
                        $actionHtml .= '<a class="btn text-primary btn-sm" href="' . route('client.edit', ['id' => $tableId]) . '" data-bs-toggle="tooltip" data-bs-original-title="Edit"><span class="fe fe-edit fs-14"></span></a>';
                    }

                    if (in_array("24", $arr)) {
                        $actionHtml .= '<a class="btn text-danger btn-sm" href="' . route('clientDelete', ['id' => $tableId]) . '" data-bs-toggle="tooltip" data-bs-original-title="Delete"><span class="fe fe-trash-2 fs-14"></span></a>';
                    }

                    $actionHtml .= '</div>';
                    $nestedData['Action'] = $actionHtml;
                }
            }
            $formattedData[] = $nestedData;
        }
        return $formattedData;
    }




    private static function userData($items, $columns, $columnMapping)
    {

        $formattedData = [];
        $i = 1;
        foreach ($items as $item) {
            $nestedData = [];
            // foreach ($columns as $column) {
            //     $actualColumnName = $columnMapping[$column] ?? $column;
            //     $newNColumn = self::getNestedProperty($item, $actualColumnName);

            //     $nestedData[$column] = $newNColumn;


            //     if ($column == "Status" && $newNColumn == 1) {
            //         $nestedData[$column] = "Active";
            //     } elseif ($column == "Status" && $newNColumn == 2) {
            //         $nestedData[$column] = "Inactive";
            //     }
            // }
            // if ($column == "Name") {
                $nestedData['Name'] = ($item->name??'').' '.($item->surname??'');
                $nestedData['Email'] = $item->email;
                $nestedData['Team Player Type'] = Str::ucfirst($item->role);
            // }
            $statusHtml = '';

            $tableId = $item->id;
            if(auth()->user()->role=='admin' || auth()->user()->canAny(['team-player-activate,team-player-deactivate'])){
                $statusHtml = '<div class="form-group">
                    <select class="form-control select2 form-select" onchange="statusChange(this,'.$item->id.',\'users\')" data-placeholder="Choose one" style="padding: 8px 15px;">';
                   if(auth()->user()->can('team-player-activate')){
                        $statusHtml .= '<option value="1"';
                        if ($item->status == 1) {
                            $statusHtml .= ' selected';
                        }
                        $statusHtml .= '>Active</option>';
                    }

                    if(auth()->user()->can('team-player-deactivate')){
                        $statusHtml .=  '<option value="2"';
                        if ($item->status == 2) {
                            $statusHtml .= ' selected';
                        }
                        $statusHtml .= '>Inactive</option>';
                    }
                $statusHtml .= '</select>
                    <p id="message' . $tableId . '" class="message"></p>
                </div>';
            }
            $nestedData['Status'] =$statusHtml;


            $actionTd = '';

            if(auth()->user()->can('team-player-view')){
                $actionTd .= '<a href="'.route('hr.team-player.show',['team_player'=>$item->id]).'"><span class="btn btn-info waves-effect waves-light table-btn-custom"><i class="uil-eye"></i></span></a>';
            }
            if(auth()->user()->can('team-player-edit')){
                $actionTd .= '<a href="'.route('hr.team-player.edit',['team_player'=>$item->id]).'"><span class="btn btn-warning waves-effect waves-light table-btn-custom"><i class="uil-edit"></i></span></a>';
            }
            $nestedData['id'] = $i++;
            $nestedData['Action'] = $actionTd;
            $formattedData[] = $nestedData;

        }
        return $formattedData;
    }
}
