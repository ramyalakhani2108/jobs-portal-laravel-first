<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
   
    public function create()
    {
       return view('auth.register');
    }

    public function store(Request $request)
    {
        $validatedAttributes =  $request->validate([
            'first_name' => ['required', 'min:2'],
            'last_name' => ['required','min:2'],
            'email' => ['required','email','max:254'],
            'password'  => ['required',Password::min(6)->letters()->numbers()->mixedCase()->symbols()->max(18),'confirmed'], //confirmed will look for password_confirmation field to match it 
        ]);

        
        $user = User::create($validatedAttributes);

        Auth::login($user);

        return redirect('/jobs');
    }
}
