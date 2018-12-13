<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    public function index() {
        return view('auth.changepass');
    }

    public function edit(Request $request) {
        $user = auth()->user();

        $data = $request->validate([
            'password' => 'required',
            'new_password' => 'required|string|min:6|confirmed'
        ]);

        if (! Hash::check($data['password'], $user->password)) {
            return redirect()->back()->withErrors(
                ['password' => 'Senha atual incorreta']
            );
        }

        $user->password = Hash::make($data['new_password']);
        $user->save();

        return redirect('/');
    }
}
