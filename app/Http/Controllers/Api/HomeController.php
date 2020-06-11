<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return response()->json([
            'success'=>true,
            'message'=>'success',
            'data'=>'Selamat Datang'
        ]);
    }

    public function create(Request $request)
    {
        return response()->json($request->all());
    }
}
