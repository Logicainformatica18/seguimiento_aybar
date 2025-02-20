<?php

namespace App\Http\Controllers;
use App\Models\Business_partner;
use Illuminate\Http\Request;

class Business_partnerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');


    }
    public function index()
    {
        //
        $Business_partner = Business_partner::orderBy('id','DESC')->get();
        return view("Business_partner.Business_partner", compact("Business_partner"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $Business_partner = Business_partner::orderBy('id','DESC')->get();
        return view("Business_partner.Business_partnertable", compact("Business_partner"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Business_partner = new Business_partner;
        $Business_partner->description = $request->description;

        $Business_partner->save();
        return $this->create();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Business_partner  $Business_partner
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $show="%".$request["show"]."%";
        $Business_partner=Business_partner::where('description',"like",$show)->all();
        return view('Business_partnertable',compact('Business_partner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Business_partner  $Business_partner
     * @return \Illuminate\Http\Response
     */

    public function edit(Request $request)
    {
        //
        $Business_partner = Business_partner::find($request->id);
        return $Business_partner;
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Business_partner  $Business_partner
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request)
    {
        $Business_partner = Business_partner::find($request->id);
        $Business_partner->description = $request->description;

        $Business_partner->save();
        return $this->create();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Business_partner  $Business_partner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Business_partner::find($request->id)->delete();
        return $this->create();
    }
}
