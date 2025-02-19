<?php

namespace App\Http\Controllers;

use \Illuminate\Support\Facades\Auth;
use App\Models\Section;
use Illuminate\Http\Request;
class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $section = Section::orderBy('id','DESC')->get();
        return view("Section.Section", compact("section"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $section = Section::orderBy('id','DESC')->get();
        return view("Section.Sectiontable", compact("section"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $section =new Section();
        $section->description =strtoupper($request->description);
        $section->code = $request->code;
        $section->nivel = $request->nivel;
        $section->module = $request->module;
        $section->detail = $request->detail;
        $section->updated_by = Auth::user()->id;
        $section->save();
        
       
    }

    /**
     * Display the specified resource.
     */
    public function show(Section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $section = Section::find($request->id);
        return $section;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $section = Section::find($request->id);
        $section->description =strtoupper($request->description);
        $section->code = $request->code;
        $section->nivel = $request->nivel;
        $section->module = $request->module;
        $section->detail = $request->detail;
        $section->updated_by = Auth::user()->id;
        $section->save();
    }
    public function updateDinamic(Request $request)
    {
        $section = Section::find($request->id);
        $section->code = $request->code;
        $section->nivel = $request->nivel;
        $section->save();
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $section = Section::find($request->id);
        $section->delete();
        return $this->create();
    }
}
