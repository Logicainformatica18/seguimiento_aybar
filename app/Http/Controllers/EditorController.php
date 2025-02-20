<?php

namespace App\Http\Controllers;
use App\Models\Editor;
use Illuminate\Http\Request;

class EditorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');


    }
    public function index()
    {
        //
        $Editor = Editor::orderBy('id','DESC')->get();
        return view("Editor.Editor", compact("Editor"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $Editor = Editor::orderBy('id','DESC')->get();
        return view("Editor.Editortable", compact("Editor"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Editor = new Editor;
        $Editor->description = $request->description;

        $Editor->save();
        return $this->create();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Editor  $Editor
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $show="%".$request["show"]."%";
        $Editor=Editor::where('description',"like",$show)->all();
        return view('Editortable',compact('Editor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Editor  $Editor
     * @return \Illuminate\Http\Response
     */

    public function edit(Request $request)
    {
        //
        $Editor = Editor::find($request->id);
        return $Editor;
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Editor  $Editor
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request)
    {
        $Editor = Editor::find($request->id);
        $Editor->description = $request->description;

        $Editor->save();
        return $this->create();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Editor  $Editor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Editor::find($request->id)->delete();
        return $this->create();
    }
}
