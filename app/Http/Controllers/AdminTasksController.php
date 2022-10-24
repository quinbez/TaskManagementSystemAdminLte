<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditTasksRequest;
use App\Models\Task;
use App\Models\Project;
use App\Models\User;
use App\Http\Requests\TasksRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdminTasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::all();
        return view('task.allTasks', compact('tasks'));

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $members= User::where('role', 'member')->get();
        $project = Project::select('id','title')->get();
        return view('task.assignTasks', compact('project','members'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        // dd($request->all());
        $project = Project::find($request->project_id);
        $user = User::find($request->user_id);

        // $check = DB::table('project_user')->where('project_id', $project->id)->where('user_id', $user->id)->count();

        // if($check){
        //     Session::flash('error', 'Duplicate');
        //     return redirect('dashboard');

        // }else{
            $user->projects()->save($project);

            $startDate = Carbon::parse($request->start_date)->format('Y-m-d');
            $deadline = Carbon::parse($request->end_date)->format('Y-m-d');

            $addedTasks=[
                'user_id' => $request->user_id,
                'project_id' => $request->project_id,
                'name' => $request->name,
                'start_date' => $startDate,
                'end_date' => $deadline,
                'description' => $request->description,
            ];
            Task::create($addedTasks);
            return redirect('task/index');
        // }
        // dd($check);



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
        $tasks = Task::findOrFail($id);
        $project = Project::select('title', 'id')->get();
        $members = User::select('name','id')->get();
        return view('task.editTask', compact('tasks', 'members','project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditTasksRequest $request)
    {
        $id = $request->taskId;
        $tasks = Task::findOrFail($id);
        $startDate = Carbon::parse($request->start_date)->format('Y-m-d');
        $deadline = Carbon::parse($request->end_date)->format('Y-m-d');


        $taskUpdate =[
            'user_id' => $request->user_id,
                'project_id' => $request->project_id,
                'name' => $request->name,
                'start_date' => $startDate,
                'end_date' => $deadline,
                'description' => $request->description,
        ];
        $tasks->update($taskUpdate);

        // $project = $tasks->project;
        // $project->update(['completed', 0]);
        return redirect('task/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Task::findOrFail($id)->delete();

        return redirect('/task/index');
    }

    public function expiringTasks()
    {

        $tasks = Task::where('status', '!=', 'completed')->where(function ($q) {
            return $q->whereDate('end_date', '>=', Carbon::now())->whereDate('end_date', '<=', Carbon::now()->addDays(2));
        })->get();

        return view('task.viewExpiringTasks', compact('tasks'));

    }
}
