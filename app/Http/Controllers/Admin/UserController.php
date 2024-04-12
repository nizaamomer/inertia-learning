<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{
    public function index()
    {

        return Inertia::render('Admin/Users/index',  [
            'users' => User::all(),
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
            'email' => 'required',
            'password' => 'required',
        ]);
        User::create($data);

        return to_route('users.index');
    }
}
