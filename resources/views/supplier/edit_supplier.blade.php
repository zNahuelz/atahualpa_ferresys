@extends('shared.main')
@section('content')
<title>Ferreteria Atahualpa - Edición de Proveedor</title>
<div class="card text-center mt-3 border-dark">
    <div class="card-body">
        <div class="row">
        @if($errors->any())
            <div class="alert alert-danger" role="alert">
                @foreach ($errors->all() as $error)
                    - {{ $error }} <br />
                @endforeach
            </div>
        @endif
        </div>
        <form action="{{route('supplier.update',$supplier->id)}}" class="form" method="PUT"> <!--Formulario que no funciona....--->
            @csrf
            @method('PUT')
        <div class="row">
            <h3 class="fw-light">Editar Proveedor</h3>
            <div class="col mt-3">
                <div class="mb-3 text-start">
                    <label for="name" class="form-label">Nombre del Proveedor</label>
                    <input type="text" name="name" placeholder="ACEROS AREQUIPA S.A" class="form-control" value="{{$supplier->name}}">
                </div>
                <div class="mb-3 text-start">
                    <label for="ruc" class="form-label">RUC</label>
                    <input type="text" name="ruc" placeholder="20-000000000" class="form-control" value="{{$supplier->ruc}}">
                </div>
                <div class="mb-3 text-start">
                    <label for="address" class="form-label">Dirección</label>
                    <input type="text" name="address" placeholder="Calle Globo Terraqueo 203" class="form-control" value="{{$supplier->address}}">
                </div>
                <div class="mb-3 text-start">
                    <label for="status" class="form-label">Estado</label>
                    <select class="form-select" name="status">
                        <option value="1" {{$supplier->status == 1 ? 'selected' : ''}}>ACTIVO</option>
                        <option value="0" {{$supplier->status == 0 ? 'selected' : ''}}>INACTIVO</option>
                    </select>
                </div>
            </div>
            <div class="col mt-3">
                <div class="mb-3 text-start">
                    <label for="phone" class="form-label">Teléfono de Contacto</label>
                    <input type="text" name="phone" placeholder="994630514" class="form-control" value="{{$supplier->phone}}">
                </div>
                <div class="mb-3 text-start">
                    <label for="email" class="form-label">Correo Electrónico</label>
                    <input type="text" name="email" placeholder="email@dominio.com" class="form-control" value="{{$supplier->email}}">
                </div>
                <div class="mb-3 text-start">
                    <label for="name" class="form-label">Descripción del Proveedor</label>
                    <textarea class="form-control" id="description" rows="4" placeholder="Comercialización de productos de acero, como barras de refuerzo, alambrón, perfiles y estructuras metálicas...">{{$supplier->description}}</textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col text-end">
                <button class="btn btn-primary fw-bold" type="submit">ACTUALIZAR</button>
                <button class="btn btn-secondary fw-bold" type="reset">RESETEAR</button>
                <a class="btn btn-danger fw-bold" href="/dashboard/s/list">CANCELAR</a>
            </div>
        </div>
    </form>
    </div>
</div>
@endsection
