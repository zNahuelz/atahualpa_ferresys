@extends('shared.main')
@section('content')
<title>Ferreteria Atahualpa - Registro de Cliente</title>
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
        <form action="/dashboard/c/new" method="POST" class="form">
            @csrf
        <div class="row">
            <h3 class="fw-light">Registro de Cliente</h3>
            <div class="col mt-3">
                <div class="mb-3 text-start">
                    <label for="name" class="form-label">Nombres</label>
                    <input type="text" name="name" placeholder="Pedrito" class="form-control">
                </div>
                <div class="mb-3 text-start">
                    <label for="surname" class="form-label">Apellidos</label>
                    <input type="text" name="surname" placeholder="Fernandez" class="form-control">
                </div>
                <div class="mb-3 text-start">
                    <label for="dni" class="form-label">DNI</label>
                    <input type="text" name="dni" placeholder="07866543" class="form-control">
                </div>
            </div>
            <div class="col mt-3">
                <div class="mb-3 text-start">
                    <label for="email" class="form-label">E-Mail</label>
                    <input type="email" name="email" placeholder="email@dominio.com" class="form-control">
                </div>
                <div class="mb-3 text-start">
                    <label for="address" class="form-label">Dirección</label>
                    <input type="text" name="address" placeholder="Av. Globo Terraqueo 404" class="form-control">
                </div>
                <div class="mb-3 text-start">
                    <label for="phone" class="form-label">Teléfono</label>
                    <input type="text" name="phone" placeholder="995615443" class="form-control">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col text-end">
                <button class="btn btn-primary fw-bold" type="submit">REGISTRAR</button>
                <button class="btn btn-secondary fw-bold" type="reset">LIMPIAR</button>
                <a class="btn btn-danger fw-bold" href="/dashboard/c/list">CANCELAR</a>
            </div>
        </div>
    </form>
    </div>
</div>
@endsection
