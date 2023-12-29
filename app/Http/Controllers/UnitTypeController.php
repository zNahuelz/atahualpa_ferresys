<?php

namespace App\Http\Controllers;

use App\Models\UnitType;
use Illuminate\Http\Request;

class UnitTypeController extends Controller
{
    public function listUnitTypes()
    {
        $unitTypes = UnitType::all();
        return view('unit_type.unit_type_list',['unitTypes' => $unitTypes]);
    }

    public function createUnitType(Request $request)
    {
        $incomingFields = $request->validate([
            'name' => ['required','min:1','max:50']
        ]);
        $unitType = UnitType::create($incomingFields);
        return redirect('/dashboard/ut/list')->with([
            'alert' => 'Tipo de unidad: '. $unitType->name .' registrada con exito!',
            'alertColor' => 'alert-primary',
            'alertIcon' => 'info'
        ]);
    }
}
