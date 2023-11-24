@extends('shared.main')
@section('content')
<title>Ferreteria Atahualpa - Registro de Proveedores</title>
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
        <form action="/dashboard/s/new" method="POST" class="form" name="mainForm">
            @csrf
        <div class="row">
            <h3 class="fw-light">Registro de Proveedor</h3>
            <div class="col mt-3">
                <div class="mb-3 text-start">
                    <label for="name" class="form-label">Nombre del Proveedor</label>
                    <input type="text" name="name" placeholder="ACEROS AREQUIPA S.A" class="form-control">
                </div>
                <div class="mb-3 text-start">
                    <label for="ruc" class="form-label">RUC</label>
                    <input type="text" name="ruc" placeholder="20-000000000" class="form-control">
                </div>
                <div class="mb-3 text-start">
                    <label for="address" class="form-label">Dirección</label>
                    <input type="text" name="address" placeholder="Calle Globo Terraqueo 203" class="form-control">
                </div>
                <div class="mb-3 text-start">
                    <label for="email" class="form-label">E-Mail</label>
                    <input type="email" name="email" placeholder="email@dominio.com" class="form-control">
                </div>
            </div>
            <div class="col mt-3">
                <div class="mb-3 text-start">
                    <label for="phone" class="form-label">Teléfono de Contacto</label>
                    <input type="text" name="phone" placeholder="994630514" class="form-control">
                </div>
                <div class="mb-3 text-start">
                    <label for="description" class="form-label">Descripción del Proveedor</label>
                    <textarea class="form-control" id="description" rows="4" placeholder="Comercialización de productos de acero, como barras de refuerzo, alambrón, perfiles y estructuras metálicas..." form="mainForm"></textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col text-end">
                <button class="btn btn-primary fw-bold" type="submit">REGISTRAR</button>
                <button class="btn btn-secondary fw-bold" type="reset">LIMPIAR</button>
                <a class="btn btn-danger fw-bold" href="/dashboard/s/list">CANCELAR</a>
            </div>
        </div>
    </form>
    </div>
</div>
@endsection
