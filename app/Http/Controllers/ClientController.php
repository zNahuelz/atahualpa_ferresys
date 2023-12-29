<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ClientController extends Controller
{
    public function getCreateClient()
    {
        return view('client.new_client');
    }

    public function createClient(Request $request)
    {
        $messages = [
            'name' => 'El campo nombre es obligatorio.',
            'surname' => 'El campo apellido es obligatorio.',
            'dni' => 'El campo DNI es obligatorio, tiene como máximo 15 caracteres.',
            'phone' => 'El campo teléfono es obligatorio.',
            'address' => 'El campo dirección es obligatorio.',
            'email' => 'El campo email es opcional y debe cumplir con el formato email@dominio.com'
        ];
        $incomingFields = $request->validate([
            'name' => ['required','min:1','max:100'],
            'surname' => ['required','min:1','max:100'],
            'dni' => ['required','min:8','max:15',Rule::unique('clients','dni')],
            'address' => ['required','min:1','max:255'],
            'email' => ['nullable','min:1','max:100'],
            'phone' => ['nullable','min:9','max:9']
        ],$messages);
        if($incomingFields['email'] == null)
        {
            $incomingFields['email'] = 'email@dominio.com';
        }
        if($incomingFields['phone'] == null)
        {
            $incomingFields['phone'] = '999999999';
        }

        $client = Client::create($incomingFields);
        return redirect('/dashboard/c/list')->with([
            'alert' => 'Cliente: '. $client->name .' '.$client->surname.' registrado con exito!',
            'alertColor' => 'alert-primary',
            'alertIcon' => 'info'
        ]);
    }

    public function listClients()
    {
        $clients = Client::all();
        return view('client.client_list',['clients' => $clients]);
    }
}
