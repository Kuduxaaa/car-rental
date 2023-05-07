<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('admin.users', ['users' => $users]);
    }

    public function delete($id)
    {
        $user = User::where('id', $id)->first();

        if ($user)
        {
            $user->delete();
        }

        return redirect()->back();
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:users',
            'password' => 'required|string|confirmed'
        ]);

        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');

        User::create([
            'name' => $name,
            'email' => $email,
            'role' => 2,
            'password' => $password
        ]);
        
        return redirect(route('users'));
    }
}
