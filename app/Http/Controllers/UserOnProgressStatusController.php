<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class UserOnProgressStatusController extends Controller
{
    public function edit($id)
    {
        $tasks = Task::findOrFail($id);
        $project = Project::select('title', 'id')->get();
        $members = User::select('name','id')->get();
        return view('user.onprogressedit', compact('tasks', 'members','project'));
    }

    public function update(Request $request)
    {
        $id = $request->onprogressId;
        $tasks = Task::findOrFail($id);
        $taskUpdate =[
            'status'=> 'on_progress',
            'completed'=> 0
        ];
        $tasks->update($taskUpdate);
        return redirect('user/onprogress/task');
    }
}
