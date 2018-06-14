<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Representative;
use \Carbon\Carbon;


class RepresentativeapiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rep = Representative::paginate(2);
        return response()->json($rep);
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
     *     id: number;
	*name: string;
	*email: string;
	*dob: string;
	*schema: string;
	*curp: string;
	*rfc: string;
	*created_at: string;
	*updated_at: string;
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $id = $request->get('id');
        if ($id == 0){
        $item = new Representative([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'dob' => Carbon::parse($request->get('dob')),
            'schema' => $request->get('schema'),
            'curp' => $request->get('curp'),
            'rfc' => $request->get('rfc'),


          ]);
         if($item->save())
            return response()->json('Successfully added');
         else
            return response()->json('Error saving data');
        }else{
            $itemRep = Representative::find($id);
            $itemRep->name = $request->get('name');
            $itemRep->email = $request->get('email');
            $itemRep->dob = Carbon::parse($request->get('dob'));
            $itemRep->schema = $request->get('schema');
            $itemRep->curp = $request->get('curp');
            $itemRep->rfc = $request->get('rfc');

            if($itemRep->save())
            return response()->json('Successfully updated');
         else
            return response()->json('Error saving data');


        }
    }

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
        Representative::destroy($id);
        return response()->json('Successfully');

    }
}
