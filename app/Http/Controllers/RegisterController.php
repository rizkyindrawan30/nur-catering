<?php

namespace App\Http\Controllers;

use App\Models\Gender;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use function GuzzleHttp\Promise\all;

class RegisterController extends Controller
{
    public function index()
    {
        $title = "Register";
        $genders = Gender::all();
        $user = User::all();
        return view('auth.register', compact('title', 'genders', 'user'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'      => 'required|max:255',
            'email'     => 'required|email:dns|unique:users',
            'gender'    => 'required',
            'password'  => 'required|min:8'
        ]);
        // dd($validatedData);
        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        return redirect('/login')->with('success', 'Registrasi Berhasil! Silakan Login.');
    }
}
