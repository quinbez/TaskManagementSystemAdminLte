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
        return view('user.alltasks', compact('tasks'));
    }


    public function expiring()
    {
        $tasks = Task::where('user_id', Auth::user()->id)->where('status', '!=', 'completed')->where(function ($q) {
            return $q->whereDate('end_date', '>=', Carbon::now())->whereDate('end_date', '<=',Carbon::now()->addDays(2));
        })->get();

        return view('user.expiring', compact('tasks'));

    }

    public function toOnProgress($id){
        $tasks = Task::findOrFail($id);
        $taskUpdate =[
            'status'=> 'on_progress'
        ];
        $tasks->update($taskUpdate);
        return redirect('user/onprogress/task');


    }
    public function toCompleted($id){
        $tasks = Task::findOrFail($id);
        $taskUpdate =[
            'status'=> 'completed',
            'completed' => 0
        ];
        $tasks->update($taskUpdate);
        return redirect('user/completed/task');

    }

}
