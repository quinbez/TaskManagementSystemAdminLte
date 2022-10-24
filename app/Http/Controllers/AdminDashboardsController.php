<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminDashboardsController extends Controller
{


    public function index()
    {
        // dd(Auth::user());
        $data["total_admin"] = User::where('role', 'admin')->count();
        $data["total_members"] = User::where('role', 'member')->count();
        $data["total_task"] = Task::count();
        $data["total_category"] = Category::count();
        $data["total_project"] = Project::count();
        $data['pending_task'] = Task::where('status', 'pending')->count();
        $data['on_progress'] = Task::where('status', 'on_progress')->count();
        $data['completed'] = Task::where('status', 'completed')->count();

        if(Auth::user()->role == 'admin'){
            return view('dashboard.dashboard', $data);
        }elseif (Auth::user()->role == 'member') {
            return redirect('/user');
        }


}
}
