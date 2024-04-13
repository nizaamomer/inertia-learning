<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{
    public function index(Request $request)
    {
        // sleep('3');
        // $users = User::all();
        $users = User::when($request->search, function ($q) use ($request) {
            $q->where('name', 'LIKE', '%' . $request->search . '%');
        })->paginate(7)->withQueryString();

        return Inertia::render('Admin/Users/index', [
            'users' => $users,
            'search' => $request->search
        ]);
    }
    public function create()
    {
        return Inertia::render('Admin/Users/form');
    }
    public function store(Request $request)
    {

        $data = $request->validate([
            'name' => 'required',
            'image' => 'required|image',
            'email' => 'required',
            'password' => 'required',
        ]);
        User::create($data);

        return to_route('admin.users.index')->with('message', 'user created successfully');
    }
    public function destroy(User $user)
    {

        $user->delete();

        return to_route('admin.users.index')->with('message', 'user deleted successfully');
    }
    public function edit(User $user)
    {
        return Inertia::render('Admin/Users/form', [
            'user' => $user,
        ]);
    }
    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => 'required',
            'image' => 'required|image',
            'email' => 'required',
            'password' => 'required',
        ]);
        $user->update($data);

        return to_route('admin.users.index')->with('message', 'user updated successfully');
    }
}
