<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    public function index()
    {
        return view('user.index', [
            'title' => 'User Page',
            'users' => User::all()
        ]);
    }

    public function create()
    {
        return view('user.create', [
            'title' => 'Add User'
        ]);
    }

    public function store(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:8', Rules\Password::defaults()]
        ]);

        // dd($request->all());
        $user->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('user.index')->with('success', 'User has been created');
    }

    public function show(User $user)
    {
        return view('user.show', ['user' => $user, 'title' => 'Profile']);
    }

    public function edit(User $user)
    {
        return view('user.edit', [
            'user' => $user
        ]);
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => ['required', 'email', Rule::unique('users')->ignore($user)],
        ]);

        // dd($request->all());
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);
        return redirect()->route('user.index')->with('success', 'User has been updated');
    }

    public function destroy(User $user)
    {
        if ($user->status === 0) {
            $user->delete();
            return response()->json([
            'status' => 'success',
            'message' => 'User has been deleted'
        ]);
        }
    }
}
