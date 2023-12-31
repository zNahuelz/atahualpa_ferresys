@extends('shared.main')
@section('content')
<title>Ferreteria Atahualpa - Cliente: {{$c->name.' '.$c->surname}}</title>
<div class="card text-center mt-3 border-dark">
    <div class="card-body">
        <div class="row text-start">
            <div class="col mb-3">
                <label for="name" class="form-label fw-bold">Nombres</label>
                <input type="text" class="form-control" id="name" disabled value="{{$c->name}}">
            </div>
            <div class="col mb-3">
                <label for="surname" class="form-label fw-bold">Apellidos</label>
                <input type="text" class="form-control" id="surname" disabled value="{{$c->surname}}">
            </div>
        </div>

        <div class="row text-start">
            <div class="col mb-3">
                <label for="dni" class="form-label fw-bold">DNI</label>
                <input type="text" class="form-control" id="dni" disabled value="{{$c->dni}}">
            </div>
            <div class="col mb-3">
                <label for="address" class="form-label fw-bold">Dirección</label>
                <input type="text" class="form-control" id="address" disabled value="{{$c->address}}">
            </div>
        </div>

        <div class="row text-start">
            <div class="col-6 mb-3">
                <label for="phone" class="form-label fw-bold">Teléfono</label>
                <input type="text" class="form-control" id="phone" disabled value="{{$c->phone}}">
            </div>
            <div class="col-4 mb-3">
                <label for="email" class="form-label fw-bold">E-Mail</label>
                <input type="text" class="form-control" id="email" disabled value="{{$c->email}}">
            </div>
        </div>

        <div class="row text-start">
            <div class="col mb-3">
                <label for="createdAt" class="form-label fw-bold">Fecha Registro</label>
                <input type="text" class="form-control" id="createdAt" disabled value="{{$c->created_at->format('d M Y - h:i A')}}">
            </div>

            <div class="col mb-3">
                <label for="updatedAt" class="form-label fw-bold">Fecha Modificación</label>
                <input type="text" class="form-control" id="updatedAt" disabled value="{{$c->updated_at->format('d M Y - h:i A')}}">
            </div>
        </div>

        <div class="row text-start">
            <div class="col-2 mb-3">
                @if($c->status == 1)
                <label for="status" class="form-label fw-bold">Estado</label>
                <input type="text" class="form-control text-success fw-bold" id="status" disabled value="ACTIVO">
                @else
                <label for="status" class="form-label fw-bold">Estado</label>
                <input type="text" class="form-control text-danger fw-bold" id="status" disabled value="INACTIVO">
                @endif
            </div>
        </div>

        <div class="row text-end">

            <div class="col">
                <a href="/dashboard/c/edit/{{$c->id}}" class="btn btn-warning bg-gradient fw-bold">EDITAR</a>
                <a href="/dashboard/c/list" class="btn btn-danger bg-gradient fw-bold">ÁTRAS</a>
            </div>
        </div>
    </div>
</div>
@endsection
