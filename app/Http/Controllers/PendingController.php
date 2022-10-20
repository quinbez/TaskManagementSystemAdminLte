<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PendingController extends Controller
{
    public function index(){
        DB::table('tasks')->update(['seen' => 1]);
        $tasks = Task::where('user_id', Auth::user()->id)->where('status', 'pending')->get();
        return view('user.pending', compact('tasks'));
    }
}
