<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Name' => ['required', 'string', 'max:255'],
            'Email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'Password' => ['required', 'string', 'min:8'],
            'Phone' => ['nullable', 'string', 'max:15'],
            'Address' => ['nullable', 'string', 'max:255'],
            'Role' => ['nullable', 'string', 'max:15'],
        ]);

        User::create([
            'Name' => $request->Name,
            'Email' => $request->Email,
            'Password' => Hash::make($request->Password),
            'Phone' => $request->Phone,
            'Address' => $request->Address,
            'Role' => 'client',
        ]);

        return redirect('/login')->with('success', 'Registration successful!');
    }
}
