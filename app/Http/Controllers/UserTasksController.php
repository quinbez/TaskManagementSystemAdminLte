<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class UserTasksController extends Controller
{
    public function index(){
        // dd(Auth::user()->role);
        $tasks = Task::where('user_id', Auth::user()->id)->get();
        return view('user.assignedTasksadminlte', compact('tasks'));
    }


    public function expiring()
    {
        $tasks = Task::where('user_id', Auth::user()->id)->where('status', '!=', 'completed')->where(function ($q) {
            return $q->whereDate('end_date', '>=', Carbon::now())->whereDate('end_date', '<=',Carbon::now()->addDays(2));
        })->get();

        return view('user.expiringTasksAdminlte', compact('tasks'));

    }

    public function toOnProgress($id){
        $tasks = Task::findOrFail($id);
        $taskUpdate =[
            'status'=> 'on_progress',
            'on_progress'=> 1,
            'seen' => 0
        ];
        $tasks->update($taskUpdate);
        return redirect('user/onprogress/task');


    }
    public function toCompleted($id){
        $tasks = Task::findOrFail($id);
        $taskUpdate =[
            'status'=> 'completed',
            'completed' => 1,
            'on_progress'=> 0,
            'seen' => 0
        ];
        $tasks->update($taskUpdate);
        return redirect('user/completed/task');

    }

}