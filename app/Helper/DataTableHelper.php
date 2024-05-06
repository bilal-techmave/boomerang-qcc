<?php

namespace App\Helpers;

use Illuminate\Http\Request;

class DataTableHelper
{
    public static function getData(Request $request, $model, $columns)
    {
        $totalData = $model::count();
        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $orderColumn = $columns[$request->input('order.0.column')];
        $orderDirection = $request->input('order.0.dir');

        $query = $model::query();

        // Search
        if (!empty($request->input('search.value'))) {
            $search = $request->input('search.value');
            $query->where(function ($query) use ($columns, $search) {
                foreach ($columns as $column) {
                    $query->orWhere($column, 'LIKE', '%' . $search . '%');
                }
            });

            $totalFiltered = $query->count();
        }

        // Order
        $query->orderBy($orderColumn, $orderDirection);

        // Pagination
        $data = $query->offset($start)
            ->limit($limit)
            ->get();

        $formattedData = [];
        foreach ($data as $item) {
            $nestedData = [];
            foreach ($columns as $column) {
                // Add each column value to the nested data
                $nestedData[$column] = $item->$column;
            }
            $formattedData[] = $nestedData;
        }

        $json_data = [
            "draw"            => intval($request->input('draw')),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"            => $formattedData
        ];

        return response()->json($json_data);
    }
}
