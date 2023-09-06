<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $users = User::where('type','admin')->orWhere('type', 'student');
        if(request()->get('type')=='admin'){
            $users = User::where('type','admin');
        }

        if(request()->get('type')=='student'){
            $users = User::where('type','student');
        }

        if(request()->get('searchQuery')){
            $users = $users->where('name', 'LIKE', "%".request()->get('searchQuery')."%")->orWhere('email', 'LIKE', "%".request()->get('searchQuery')."%");
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
    public function store(UserRequest $request)
    {

        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'type'=>$request->type
        ]);

        //User::create($request->post());
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
        $user = User::find($id) ?? abort(404, 'User not found.');
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, string $id)
    {

        // if ($request!=null)
        // {
            User::where('id', $id)->update(
            ['name' =>$request->name, 
            'password' => bcrypt($request->password), 
            'email' =>$request->email ,
            'type'=>$request->type
            ]
            );
        // }

        return redirect()->route('users.index')->withSuccess('User Updated Successfully.');
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
