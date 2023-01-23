<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class Take_img extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function main(Request $request)
    {
        return response()->json(array(
            'status' => 200,
            'message' => 'www.google.com'
        ));
    }
}