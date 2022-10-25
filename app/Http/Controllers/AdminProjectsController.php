<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditProjectRequest;
use Illuminate\Http\Request;
use App\Http\Requests\ProjectsRequest;
use App\Models\Project;
use App\Models\Category;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;

class AdminProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $projects = Project::get();
        return view('project.allProjects', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::select('type','id')->get();
        $teams = User::where('role', "member")->get();
        return view('project.addProjects', compact('categories','teams'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectsRequest $request)
    {
        // $teamMembers = implode(',',$request->team_member);
        // $users = User::whereIn('id', $request->team_member)->get();
        try{
        $startDate = Carbon::parse($request->start_date)->format('Y-m-d');
        $deadline = Carbon::parse($request->deadline)->format('Y-m-d');
        // dd($teamMembers);
        $addedProject=[
            'title' => $request->title,
            'category_id' => $request->category_id,
            'team_member' => '0',
            'start_date' => $startDate,
            'deadline' => $deadline,
            'description' => $request->description,
            'status'=>'Pending'
        ];

         $project = Project::create($addedProject);
         $project->users()->attach($request->team_member);
         if($project) {
             return redirect('project/index')->with('success', 'Project has been created successfully');
         }else{
             return redirect('project/index')->with('error', 'Project has not been created');
         }
     }catch(Exception $ex){
          return redirect('project/index')->with('error', 'Unknown error occured');
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
        $categories = Category::select('type', 'id')->get();
        $projects = Project::findOrFail($id);
        $teams = User::where('role', 'member')->whereNotIn('id', $projects->users->pluck('id')->toArray())->get();
        return view('project.editProject',compact('projects', 'categories','teams'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditProjectRequest $request)
    {
        try{
        $id = $request->projectId;
        $projects = Project::findOrFail($id);
        $startDate = Carbon::parse($request->start_date)->format('Y-m-d');
        $deadline = Carbon::parse($request->deadline)->format('Y-m-d');
        $projectUpdate =[
            'title'=>$request->title,
            'category_id'=>$request->category_id,
            'description'=>$request->description,
            'start_date'=>$startDate,
            'deadline'=>$deadline,
        ];

        $projects->users()->sync($request->team_member);
        $updated = $projects->update($projectUpdate);
        if($updated) {
            return redirect('project/index')->with('success', 'Project has been updated successfully');
        }else{
            return redirect('project/index')->with('error', 'Project has not been updated successfully');
        }
    }catch(Exception $ex){
         return redirect('project/index')->with('error', 'Unknown error occured');
    }
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Project::findOrFail($id)->delete();

        return redirect('/project/index');
    }
}
