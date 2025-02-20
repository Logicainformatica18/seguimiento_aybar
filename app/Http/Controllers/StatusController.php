<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Status;
class StatusController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');


    }
    public function index()
    {
        //
        $Status = Status::orderBy('id','DESC')->get();
        return view("Status.Status", compact("Status"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $Status = Status::orderBy('id','DESC')->get();
        return view("Status.Statustable", compact("Status"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Status = new Status;
        $Status->description = $request->description;

        $Status->save();
        return $this->create();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Status  $Status
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $show="%".$request["show"]."%";
        $Status=Status::where('description',"like",$show)->all();
        return view('Statustable',compact('Status'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Status  $Status
     * @return \Illuminate\Http\Response
     */

    public function edit(Request $request)
    {
        //
        $Status = Status::find($request->id);
        return $Status;
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Status  $Status
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request)
    {
        $Status = Status::find($request->id);
        $Status->description = $request->description;

        $Status->save();
        return $this->create();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Status  $Status
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Status::find($request->id)->delete();
        return $this->create();
    }
}
