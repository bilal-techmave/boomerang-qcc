<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ImageController extends Controller
{
    public static function upload($image,$folderName)
    {

        $fileName = 'image_' . now()->format('YmdHisu') . '.' . $image->getClientOriginalExtension();
        $image->storeAs($folderName, $fileName, 'public');
        return $folderName.'/'.$fileName;
    }
}
