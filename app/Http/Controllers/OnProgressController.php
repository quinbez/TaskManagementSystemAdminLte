<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class OnProgressController extends Controller
{
    public function index(){
        $tasks = Task::where('user_id', Auth::user()->id)->where('status', 'on_progress')->get();
        return view('user.onProgress', compact('tasks'));
    }
}
