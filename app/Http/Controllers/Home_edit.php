<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Section;
class Home_edit extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');


    }
    /**
     * Display a listing of the resource.
     */
    public function template()
    {
        $section = Section::where("module","=","1")->orderBy("nivel","asc")->get();
        return view('home_edit.template',compact('section'));
    }
    public function home()
    {
        $section = Section::where("module","=","2")->orderBy("nivel","asc")->get();
        return view('home_edit.home',compact('section'));
    }
    public function us()
    {
        $section = Section::where("module","=","3")->orderBy("nivel","asc")->get();
        return view('home_edit.us',compact('section'));
    }
    public function project()
    {
        $section = Section::where("module","=","4")->orderBy("nivel","asc")->get();
        return view('home_edit.project',compact('section'));
    }
    public function blog()
    {
        $section = Section::where("module","=","5")->orderBy("nivel","asc")->get();
        return view('home_edit.blog',compact('section'));
    }
    public function contact()
    {
        $section = Section::where("module","=","6")->orderBy("nivel","asc")->get();
        return view('home_edit.contact',compact('section'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $id)
    {
   
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
