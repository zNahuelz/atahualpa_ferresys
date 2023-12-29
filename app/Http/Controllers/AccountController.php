<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AccountController extends Controller
{
    public function listAccounts()
    {
        $users = User::all();
        return view('account.account_list',['users' => $users]);
    }

    public function getRegister()
    {
        return view('account.new_account');
    }

    public function register(Request $request)
    {
        $accountType = 'N/A';
        $incomingFields = $request->validate([
            'name' => ['required','min:3','max:80','regex:/^[a-zA-Z]{3,80}$/'],
            'surname' => ['required','min:3','max:80','regex:/^[a-zA-Z]{3,80}$/'],
            'password' => ['required','min:5','max:30','regex:/^.{5,30}$/'],
            'dni' => ['required','min:8','max:15','regex:/^[0-9]{8}$/',Rule::unique('users','dni')],
            'email' => ['required','max:100','regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/'],
            'phone' => ['min:9','max:9','regex:/^[0-9]{9}$/'],
            'type' => ['required','regex:/^[0-9]$/'],
        ]);
        $incomingFields['password'] = bcrypt($incomingFields['password']);
        $user = User::create($incomingFields);
        if($incomingFields['type'] == 0){
            $accountType = 'ADMINISTRADOR';
        }
        if($incomingFields['type'] == 1){
            $accountType = 'VENDEDOR';
        }
        if($incomingFields['type'] == 2){
            $accountType = 'OBSERVADOR';
        }
        return redirect('/dashboard/ua/list')->with([
            'alert' => 'Usuario: '. $user->name .' '.$user->surname.' con permisos de: '.$accountType.' registrado con exito!',
            'alertColor' => 'alert-primary',
            'alertIcon' => 'info'
        ]);
    }
}
