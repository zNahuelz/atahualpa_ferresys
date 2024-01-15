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
            'email' => ['nullable','max:100'],
            'phone' => ['nullable','max:9']
        ],$messages);

        $client = Client::create($incomingFields);
        return redirect('/dashboard/c/list')->with([
            'alert' => 'Cliente: '. $client->name .' '.$client->surname.' registrado con exito!',
            'alertColor' => 'alert-primary',
            'alertIcon' => 'info'
        ]);
    }

    public function editClient($id)
    {
        $client = Client::find($id);
        if($client == null){
            return redirect('/dashboard/c/list');
        }
        return view('client.edit_client',compact('client'));
    }

    public function updateClient(Request $request, $id)
    {
        $request->validate([
            'name' => ['required','min:1','max:100'],
            'surname' => ['required','min:1','max:100'],
            'dni' => ['required','min:8','max:15',Rule::unique('clients','dni')->ignore($request->id)],
            'address' => ['required','min:1','max:255'],
            'email' => ['nullable','max:100'],
            'phone' => ['nullable','max:9']
        ]);

        $client = Client::find($request->id);

        if($client != null)
        {
            $client->update($request->all());
            return redirect('/dashboard/c/list')->with([
                'alert' => 'Cliente: '. $client->name .' '.$client->surname.' actualizado con exito!',
                'alertColor' => 'alert-success',
                'alertIcon' => 'check'
            ]);
        }
        else
        {
            return redirect('/dashboard/c/list')->with([
                'alert' => 'Ups! Imposible actualizar el client: '.$client->name .' '.$client->surname,
                'alertColor' => 'alert-danger',
                'alertIcon' => 'error'
            ]);
        }
    }

    public function listClients()
    {
        $clients = Client::all();
        return view('client.client_list',['clients' => $clients]);
    }

    public function clientDetails($id)
    {
        $client = Client::find($id);
        if($client)
        {
            return view('client.client_detail', ['c' => $client]);
        }
        else {
            return redirect('/dashboard/c/list')->with([
                'alert' => 'Error! El detalle del cliente de código: ' . $id . ' no esta disponible actualmente o el cliente no existe.',
                'alertColor' => 'alert-danger',
                'alertIcon' => 'error'
            ]);
        }
    }
}
