<?php

namespace App\Http\Controllers;

use App\Models\ProjectDetail;
use App\Http\Requests\StoreProjectDetailRequest;
use App\Http\Requests\UpdateProjectDetailRequest;
use Illuminate\Http\Request;
class ProjectDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Project = ProjectDetail::where("project_id")->orderBy('id','DESC')->get();
        return view("ProjectDetail.ProjectDetail", compact("ProjectDetail"));
    }
    public function list(Request $request)
    {
        $Project = ProjectDetail::where("detail", "=", $request->description)->first();
        if ($Project=="") {
            abort(404);
        }
        else{
            return view("Project.Project_detail",compact("Project"));

        }
        
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
    public function store(StoreProjectDetailRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ProjectDetail $projectDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProjectDetail $projectDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectDetailRequest $request, ProjectDetail $projectDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProjectDetail $projectDetail)
    {
        //
    }
}
