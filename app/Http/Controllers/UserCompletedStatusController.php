<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class UserCompletedStatusController extends Controller
{
    // public function edit($id)
    // {
    //     $tasks = Task::findOrFail($id);
    //     $project = Project::select('title', 'id')->get();
    //     $members = User::select('name','id')->get();
    //     return view('user.completededit', compact('tasks', 'members','project'));
    // }

    public function update( $id)
    {
        // $id = $request->completedId;
        $tasks = Task::findOrFail($id);
        $taskUpdate =[
            'status'=> 'completed'
        ];
        $tasks->update($taskUpdate);
        return redirect('user/completed/task');
    }
}
