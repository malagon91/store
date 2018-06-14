<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use \Carbon\Carbon;


class TransactionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trans = Transaction::with('representative')->paginate(2);
        return response()->json($trans);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = $request->get('id');
        if ($id == 0){
            $item = new Transaction([
                'representative_id' => $request->get('representative_id'),
                'amount' => $request->get('amount'),
                'due_date' => Carbon::parse($request->get('due_date')),
                'customer_name' => $request->get('customer_name'),
                'wtp' => $request->get('wtp'),
                'notes' => $request->get('notes'),
            ]);
            if($item->save())
            return response()->json('Successfully added');
         else
            return response()->json('Error saving data');
        }else{
            $mod = Transaction::find($id);
            $mod->representative_id =$request->get('representative_id');
            $mod->amount =$request->get('amount');
            $mod->due_date = Carbon::parse($request->get('due_date'));
            $mod->customer_name =$request->get('customer_name');
            $mod->wtp =$request->get('wtp');
            $mod->notes =$request->get('notes');
            if($mod->save())
                return response()->json('Successfully updated');
            else
               return response()->json('Error saving data');



        }
    }
// * id', 'representative_id','amount','due_date','customer_name',
//'wtp','notes'];

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Transaction::destroy($id);
        return response()->json('Successfully');


    }
}
