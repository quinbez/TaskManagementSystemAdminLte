<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class UserPendingStatusController extends Controller
{
    public function edit($id)
    {
        $tasks = Task::findOrFail($id);
        $project = Project::select('title', 'id')->get();
        $members = User::select('name','id')->get();
        return view('user.editstatus', compact('tasks', 'members','project'));
    }

    public function update(Request $request)
    {
        $id = $request->statusTaskId;
        $tasks = Task::findOrFail($id);
        $taskUpdate =[
            'status'=>$request->status
        ];
        $tasks->update($taskUpdate);
        return redirect('user/pending/task');
    }
}
