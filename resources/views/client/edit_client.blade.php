@extends('shared.main')
@section('content')
<title>Ferreteria Atahualpa - Edición de Cliente</title>
<div class="card text-center mt-3 border-dark">
    <div class="card-body">
        <div class="row">
            @if($errors->any())
                <div class="col alert alert-danger" role="alert">
                    @foreach ($errors->all() as $error)
                        - {{ $error }} <br />
                    @endforeach
                </div>
            @endif
        </div>
        <form action="/dashboard/c/edit/{{$client->id}}" method="POST" class="form">
            @csrf
            @method("PUT")
        <div class="row">
            <h3 class="fw-light">Editar Cliente</h3>
            <div class="col mt-3">
                <div class="mb-3 text-start">
                    <label for="name" class="form-label">Nombres</label>
                    <input type="text" name="name" value="{{$client->name}}" class="form-control" minlength="1" maxlength="100">
                </div>
                <div class="mb-3 text-start">
                    <label for="surname" class="form-label">Apellidos</label>
                    <input type="text" name="surname" value="{{$client->surname}}" class="form-control" minlength="1" maxlength="100">
                </div>
                <div class="mb-3 text-start">
                    <label for="dni" class="form-label">DNI</label>
                    <input type="text" name="dni" value="{{$client->dni}}" class="form-control" minlength="8" maxlength="15">
                </div>
            </div>
            <div class="col mt-3">
                <div class="mb-3 text-start">
                    <label for="email" class="form-label">E-Mail</label>
                    <input type="email" name="email" value="{{$client->email}}" class="form-control" maxlength="100">
                </div>
                <div class="mb-3 text-start">
                    <label for="address" class="form-label">Dirección</label>
                    <input type="text" name="address" value="{{$client->address}}" class="form-control" maxlength="255">
                </div>
                <div class="mb-3 text-start">
                    <label for="phone" class="form-label">Teléfono</label>
                    <input type="text" name="phone" value="{{$client->phone}}" class="form-control" maxlength="9">
                </div>
            </div>
        </div>
        <div class="row text-start">
            <div class="col-6 mt-1">
                <label for="status" class="form-label">Estado</label>
                <select class="form-select" name="status">
                    <option value="1" {{$client->status == 1 ? 'selected' : ''}}>ACTIVO</option>
                    <option value="0" {{$client->status == 0 ? 'selected' : ''}}>INACTIVO</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col text-end">
                <button class="btn btn-primary fw-bold" type="submit">ACTUALIZAR</button>
                <button class="btn btn-secondary fw-bold" type="reset">LIMPIAR</button>
                <a class="btn btn-danger fw-bold" href="/dashboard/c/list">CANCELAR</a>
            </div>
        </div>
    </form>
    </div>
</div>
@endsection
