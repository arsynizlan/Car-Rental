<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function index()
    {
        return view('pages.auth.index');
    }

    public function login(Request $request)
    {
        $rules = [
            'email' => 'required|email',
            'password' => 'required'
        ];
        $messages = [
            'email.required' => 'E-mail wajib diisi!',
            'email.email' => 'E-mail valid!',
            'password.required' => 'Password wajib diisi!',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if ($request->has('remember')) {
            $remember = true;
        } else {
            $remember = false;
        }

        Auth::attempt($data, $remember);

        if (Auth::check()) {
            return redirect()->to('/dashboard');
        }

        return back()->with('loginError', 'Email atau Password Salah!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->to('/');
    }
}