<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersDashboardController extends Controller
{
    public function index(){
        $data["team_member"] = User::where('role', 'member')->count();
        $data["total_project"] = Project::where('team_member', Auth::user()->id)->count();
        $data["total_tasks"] = Task::where('user_id', Auth::user()->id)->count();
        $data['pending_task'] = Task::where('user_id', Auth::user()->id)->where('status', 'pending')->count();
        $data['on_progress'] = Task::where('user_id', Auth::user()->id)->where('status', 'on_progress')->count();
        $data['completed'] = Task::where('user_id', Auth::user()->id)->where('status', 'completed')->count();

        return view('user.dashboard', $data);
    }
}
