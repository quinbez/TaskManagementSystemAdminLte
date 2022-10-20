<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TeamMembersController extends Controller
{
    public function index(){

        $members = User::where('role', 'member')->get();
        $project = Project::select('title', 'id');
        return view('user.team', compact('members', 'project'));
    }
}
