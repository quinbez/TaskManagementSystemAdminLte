<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class CompletedController extends Controller
{
    public function index(){
        $tasks = Task::where('user_id', Auth::user()->id)->where('status', 'completed')->get();
        return view('user.completed', compact('tasks'));
    }
}
