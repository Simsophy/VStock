<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Password;

class UserController extends Controller
{
    // 📋 List users
    public function index()
    {
        $users = User::all();
        return view('admins.users.index', compact('users'));
    }

    // ➕ Show create form
    public function create()
    {
        return view('admins.users.create');
    }

    // 💾 Store new user
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|min:3|max:100',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = new User();
        $user->uuid = Str::uuid();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('user.index')
            ->with('success', 'User created successfully.');
    }

    // ✏️ Edit user form
  // ✏️ Edit user form
public function edit($id)
{
    $user = User::findOrFail($id); // use id
    return view('admins.users.edit', compact('user'));
}

// 🔄 Update user
public function update(Request $request, $id)
{
    $user = User::findOrFail($id); // use id

    $request->validate([
        'name'     => 'required|string|max:255',
        'email'    => 'required|email|unique:users,email,' . $user->id,
        'password' => 'nullable|string|min:6|confirmed',
    ]);

    $user->name = $request->name;
    $user->email = $request->email;

    if ($request->filled('password')) {
        $user->password = Hash::make($request->password);
    }

    $user->save();

    return redirect()->route('user.index')
        ->with('success', 'User updated successfully.');
}

// ❌ Delete user
public function delete($uuid)
{
    $user = User::where('uuid', $uuid)->firstOrFail();

    if (Auth::id() == $user->id) {
        return redirect()->route('user.index')
            ->with('error', 'You cannot delete your own account.');
    }

    $user->delete();

    return redirect()->route('user.index')
        ->with('success', 'User deleted successfully.');
}

    // 🚪 Logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }

    // Show login form
    public function login()
{
    if (Auth::check()) {
        return redirect()->route('admin.dashboard');
    }
    return view('auth.login'); // public login page
}





}
