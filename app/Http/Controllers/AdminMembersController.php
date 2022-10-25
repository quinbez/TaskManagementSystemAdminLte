<?php

namespace App\Http\Controllers;

use App\Http\Requests\MembersRequest;
use App\Http\Requests\EditUserRequest;
use App\Models\User;
use App\Models\Task;
use App\Models\Project;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminMembersController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = User::where('email', "!=", Auth::user()->email)->get();
        return view('member.allMembers', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('member.addMembers');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MembersRequest $request)
    {

        // dd("hello");
        try {
            // dd($request);
            // $request['password']='123456789';
            $input = $request->validated();
            $updated = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'role' => "member",
                'password' => Hash::make($request->password),
            ]);
             if($updated){
              return redirect('member/index')->with('success', 'Member has been created successfully');
            }else{
                return redirect('member/index')->with('error', 'Member has not been created successfully');

            }
        }catch(Exception $ex){
            return redirect('member/index')->with('error', 'error occured');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $members = User::findOrFail($id);
        return view('member.editMember', compact('members'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditUserRequest $request)
    {
        try{
        $id = $request->memberId;
        $member = User::findOrFail($id);
        $memberUpdate = [
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'role' => $request->role,
        ];
        // $input = $request->all();
        // dd($input);
       $updated = $member->update($memberUpdate);
       if($updated){
        return redirect('member/index')->with('success', 'Member has been updated successfully');
    }else{
        return redirect('member/index')->with('error', 'Member has not been updated successfully');

    }
}catch(Exception $ex){
    return redirect('member/index')->with('error', 'error occured');
}
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::findOrFail($id)->delete();

        return redirect('/member/index');
    }

    public function search(Request $request)
    {
        $members = User::where('name', 'like', "%$request->search%")->get();
        $tasks = Task::where('name', 'like', "%$request->search%")->get();
        $projects = Project::where('title', 'like', "%$request->search%")->get();
        $categories = Category::where('type', 'like', "%$request->search%")->get();
        if (count($members) > 0) {
            return view('member.allMembers', compact('members'));
        } elseif (count($tasks) > 0) {
            return view('task.allTasks', compact('tasks'));
        } elseif (count($projects) > 0) {
            return view('project.allProjects', compact('projects'));
        } elseif (count($categories) > 0) {
            return view('category.allCategories', compact('categories'));
        } else
            return redirect()->back()->with('error', ' Nothing found');
    }
}
