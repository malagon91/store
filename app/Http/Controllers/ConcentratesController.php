<?php

namespace App\Http\Controllers;
use DB;
use App\Quotation;
use Illuminate\Http\Request;
use App\Representative;
use App\Transaction;

class ConcentratesController extends Controller
{
    public function index()
    {

        $resume = Representative::join('transactions','representatives.id','=','transactions.representative_id')
                    ->select('representatives.name',DB::raw('SUM(transactions.amount) as total'))
                    ->groupBy('representatives.name')
                    ->get();
        return response()->json($resume);

    }
}
