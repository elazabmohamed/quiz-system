<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserCreateRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('type','student');

        if(request()->get('studentName')){
            $users = $users->where('name', 'LIKE', "%".request()->get('studentName')."%");
        }

        $users = $users->paginate(10);
        return view('admin.user.list', compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserCreateRequest $request)
    {
        User::create($request->post());
        return redirect()->route('users.index')->withSuccess('User Added Successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    
        $user= User::find($id) ?? abort(404, 'User not found.');
        $user->delete();
        return redirect()->route('users.index')->withSuccess('User Deleted Successfully.');
    }
}
