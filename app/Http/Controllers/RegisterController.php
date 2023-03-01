<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use function Psy\bin;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
      return view('register.index', [
        'title' => 'Register',
        'active' => 'register',
      ]);
    }

    public function store(Request $request): RedirectResponse
    {
      $validatedData = $request->validate([
        'name' => 'required|max:255',
        'username' => 'required|unique:users|max:255',
        'email' => 'email:dns|required|unique:users',
        'password' => 'required|min:4|max:14',
      ]);

//      $validatedData['password'] = bcrypt($validatedData['password']);
      $validatedData['password'] = Hash::make($validatedData['password'], [
        'rounds' => 10,
      ]);

      User::create($validatedData);

      $request->session()->flash('success', 'Registration successful! Please login');

      return redirect('/login');
    }
}
