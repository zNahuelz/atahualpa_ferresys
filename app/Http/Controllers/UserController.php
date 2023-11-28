<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function register(Request $request){
        $incomingFields = $request->validate([
            'name' => ['required','min:3','max:80'],
            'surname' => ['required','min:3','max:80'],
            'password' => ['required','min:5','max:30'],
            'dni' => ['required','min:8','max:15',Rule::unique('users','dni')],
            'email' => ['required','max:100'],
            'phone' => ['min:9','max:9'],
        ]);
        $incomingFields['password'] = bcrypt($incomingFields['password']);
        $user = User::create($incomingFields);
        auth()->login($user);
        return redirect('/dashboard');
    }

    public function logout(){
        auth()->logout();
        return redirect('/');
    }

    public function login(Request $request){
        $image = 'algo';
        $incomingFields = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        if(auth()->attempt(['email' => $incomingFields['email'], 'password' => $incomingFields['password']])){
            $request->session()->regenerate();
        }
        return redirect('/dashboard')->with([
            'alert' => '¡Bienvenido de nuevo! '. Auth::user()->name . ' '. Auth::user()->surname,
            'alertColor' => 'alert-warning',
            'alertIcon' => 'info'
        ]);
    }

    public function accountDetails(){
        return view('shared.profile');
    }
}
