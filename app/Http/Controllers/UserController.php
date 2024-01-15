<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function register(Request $request)
    {
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

    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }

    public function login(Request $request)
    {
        $image = 'algo';
        $incomingFields = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if(auth()->attempt(['email' => $incomingFields['email'], 'password' => $incomingFields['password']]))
        {
            $request->session()->regenerate();
            return redirect('/dashboard')->with([
                'alert' => '¡Bienvenido de nuevo! '. Auth::user()->name . ' '. Auth::user()->surname,
                'alertColor' => 'alert-warning',
                'alertIcon' => 'info'
            ]);
        }
        return back()->withErrors(['error' => 'Las credenciales proporcionadas no coinciden en nuestros registros.']);
    }

    public function updateUser(Request $request, $id)
    {
        $request->validate([
            "email" => ['max:100','regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',Rule::unique('users','email')->ignore($request->id)],
            "phone" => ['min:9','max:9','regex:/^[0-9]{9}$/']
        ]);
        $user = User::find($id);
        if($user)
        {
            $user->update($request->all());
            return redirect('/dashboard/')->with([
                'alert' => 'Datos de cuenta actualizados correctamente! EMAIL: '.$request['email'].' '.'TELÉFONO: '.$request['phone'],
                'alertColor' => 'alert-success',
                'alertIcon' => 'check'
            ]);
        }
    }

    public function accountDetails()
    {
        return view('shared.profile');
    }
}
