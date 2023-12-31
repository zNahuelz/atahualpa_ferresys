@extends('shared.main')
@section('content')
<title>Ferreteria Atahualpa - Proveedor: {{$s->name}}</title>
<div class="card text-center mt-3 border-dark">
    <div class="card-body">
        <div class="row text-start">
            <div class="col mb-3">
                <label for="name" class="form-label fw-bold">Nombre</label>
                <input type="text" class="form-control" id="name" disabled value="{{$s->name}}">
            </div>
            <div class="col mb-3">
                <label for="ruc" class="form-label fw-bold">RUC</label>
                <input type="text" class="form-control" id="ruc" disabled value="{{$s->ruc}}">
            </div>
        </div>

        <div class="row text-start">
            <div class="col mb-3">
                <label for="phone" class="form-label fw-bold">Teléfono</label>
                <input type="text" class="form-control" id="phone" disabled value="{{$s->phone}}">
            </div>
            <div class="col mb-3">
                @if(Str::length($s->description) >= 1)
                <label for="description" class="form-label fw-bold">Descripción</label>
                <textarea type="text" class="form-control" id="description" disabled rows="3">{{$s->description}}</textarea>
                @else
                <label for="description" class="form-label fw-bold">Descripción</label>
                <input type="text" class="form-control" id="description" disabled value="PROVEEDOR GENERAL">
                @endif
            </div>
        </div>

        <div class="row text-start">
            <div class="col mb-3">
                <label for="address" class="form-label fw-bold">Dirección</label>
                <input type="text" class="form-control" id="address" disabled value="{{$s->address}}">
            </div>
            <div class="col mb-3">
                <label for="email" class="form-label fw-bold">E-Mail</label>
                <input type="text" class="form-control" id="email" disabled value="{{$s->email}}">
            </div>
        </div>

        <div class="row text-start">
            <div class="col mb-3">
                <label for="createdAt" class="form-label fw-bold">Fecha Registro</label>
                <input type="text" class="form-control" id="createdAt" disabled value="{{$s->created_at->format('d M Y - h:i A')}}">
            </div>

            <div class="col mb-3">
                <label for="updatedAt" class="form-label fw-bold">Fecha Modificación</label>
                <input type="text" class="form-control" id="updatedAt" disabled value="{{$s->updated_at->format('d M Y - h:i A')}}">
            </div>
        </div>

        <div class="row text-start">
            <div class="col-2 mb-3">
                @if($s->status == 1)
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
                <a href="/dashboard/s/edit/{{$s->id}}" class="btn btn-warning bg-gradient fw-bold">EDITAR</a>
                <a href="/dashboard/s/list" class="btn btn-danger bg-gradient fw-bold">ÁTRAS</a>
            </div>
        </div>
    </div>
</div>
@endsection
