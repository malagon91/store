<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Representative;


class RepresentativescbxController extends Controller
{
    public function index()
    {
        $rep = Representative::select('id','name')->get();
        return response()->json($rep);

    }
}
