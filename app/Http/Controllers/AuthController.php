<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return inertia('login');
    }
    public function loginStore(Request $request)
    {
        $data = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        if (!Auth::attempt($data))
            return redirect()->back()->withErrors(['email' => 'zyandyaryakant hallan ']);
        return to_route('admin.users.index');
    }
    public function logout()
    {
        Auth::logout();
        return to_route('login');
    }
}
