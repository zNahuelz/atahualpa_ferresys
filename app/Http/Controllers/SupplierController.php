<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SupplierController extends Controller
{
    public function createSupplier(Request $request){
        $messages = [
            'name' => 'El campo nombre es obligatorio.',
            'ruc' => 'El campo RUC debe tener un máximo de 11 carácteres y comenzar por 10 o 20.',
            'address' => 'El campo dirección es obligatorio.',
            'phone' => 'El campo teléfono es obligatorio.',
            'description' => 'El campo descripción es opcional, pero recomendable.'
        ];

        $incomingFields = $request->validate([
            'name' => ['required','min:5','max:150'],
            'ruc' => ['required','min:11','max:11',Rule::unique('suppliers','ruc')],
            'address' => ['required','min:5','max:150'],
            'phone' => ['required','min:6','max:11'],
            'description' => ['nullable','min:1','max:150'],
            'email' => ['nullable','min:1','max:100']
        ],$messages);

        if($request['email'] == null){
            $incomingFields['email'] = 'email@dominio.com';
        }

        if($request['description'] == null){
            $incomingFields['description'] = 'PROVEEDOR GENERAL';
        }

        $supplier = Supplier::create($incomingFields);
        return redirect('/dashboard/s/list')->with([
            'alert' => 'Proveedor: '. $supplier->name .' registrado con exito!',
            'alertColor' => 'alert-primary',
            'alertIcon' => 'info'
        ]);
    }

    public function listSuppliers(){
        $suppliers = Supplier::all();
        return view('supplier.supplier_list',['suppliers' => $suppliers]);
    }

    public function editSupplier($id){
        $supplier = Supplier::find($id);
        if($supplier == null){
            return redirect('/dashboard/s/list');
        }
        return view('supplier.edit_supplier',compact('supplier'));
    }

    public function updateSupplier(Request $request, $id){
        $request->validate([
            'name' => ['required','min:5','max:150'],
            'ruc' => ['required','min:11','max:11',Rule::unique('suppliers','ruc')->ignore($request->id)],
            'address' => ['required','min:5','max:150'],
            'phone' => ['required','min:6','max:11'],
            'description' => ['max:150'],
            'email' => ['required','min:5','max:100']
        ]);

        $supplier = Supplier::find($request->id);
        if($supplier != null){
            $supplier->update($request->all());
            return redirect('/dashboard/s/list')->with([
                'alert' => 'Proveedor: '. $supplier->name .' actualizado con exito!',
                'alertColor' => 'alert-success',
                'alertIcon' => 'check'
            ]);
        }
        else{
            return redirect('/dashboard/s/list')->with([
                'alert' => 'Ups! Imposible actualizar el proveedor: '. $supplier->name,
                'alertColor' => 'alert-danger',
                'alertIcon' => 'error'
            ]);
        }
    }
}
