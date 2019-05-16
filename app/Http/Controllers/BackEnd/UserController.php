<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $users = User::get();
        return view('BackEnd/users/index', compact('users'));
    }

    public function create(){
        return view('BackEnd/users/add');
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        User::create($request->all());
        return redirect('/admin/user');
    }

    public function edit(User $user){
        return view('BackEnd/users/edit', compact('user'));
    }

    public function update(Request $request, User $user){
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => 'required|string|max:255|unique:users,email,'.$user->id.',id',
        ]);
        
        $user->fill($request->all())->save();
        return redirect('/admin/user');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect('/admin/user');
    }
}
