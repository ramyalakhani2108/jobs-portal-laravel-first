<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
       return view('auth.login');
    }

    public function store(Request $request)
    {
       
        $validatedAttributes = $request->validate([
            'email' => ['required','email','max:254'],
            'password' => ['required']
        ]);

        //attempt to login
        if(! Auth::attempt($validatedAttributes))
        {
            throw ValidationException::withMessages([
                'email' => ['your credentials doens\'t matched']
            ]);
        }

        //regenerate session token
        $request->session()->regenerate();

         return redirect('/jobs');
    }

    public function destroy()
    {
        Auth::logout();

        return redirect('/');
    }

}
