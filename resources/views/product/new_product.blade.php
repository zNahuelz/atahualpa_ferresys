@extends('shared.main')
@section('content')
<title>Ferreteria Atahualpa - Registro de Productos</title>
<div class="card text-center mt-3 border-dark">
    <div class="card-body">
        <div class="row">
            @if($errors->any())
                <div class="col-4 alert alert-danger" role="alert">
                    @foreach ($errors->all() as $error)
                        - {{ $error }} <br />
                    @endforeach
                </div>
            @endif
        </div>
        <form action="/dashboard/p/new" method="POST" class="form" name="mainForm">
            @csrf
        <div class="row">
            <h3 class="fw-light">Registro de Producto</h3>
            <div class="col mt-3">
                <div class="mb-3 text-start">
                    <label for="name" class="form-label">Nombre del Producto</label>
                    <input type="text" name="name" placeholder="BARRA DE ACERO 1/2' 9MTS." class="form-control">
                </div>
                <div class="mb-3 text-start">
                    <label for="description" class="form-label">Descripción del Producto</label>
                    <textarea class="form-control" id="description" rows="4" placeholder="Estas son barras de construcción ASTM A615 con Grado 60, rectas de sección circular, con resaltes Hi-bond de alta adherencia con el concreto..." form="mainForm"></textarea>
                </div>
                <div class="mb-3 text-start">
                    <label for="buy_price" class="form-label">Precio de Compra</label>
                    <input type="number" name="buy_price" placeholder="00.00" class="form-control" step=".01">
                </div>
                <div class="mb-3 text-start">
                    <label for="sell_price" class="form-label">Precio de Venta</label>
                    <input type="number" name="sell_price" placeholder="00.00" class="form-control" step=".01">
                </div>
            </div>
            <div class="col mt-3">
                <div class="mb-3 text-start">
                    <label for="stock" class="form-label">Cantidad en Stock</label>
                    <input type="number" name="stock" placeholder="50" class="form-control">
                </div>

                <div class="mb-3 text-start pb-1">
                    <label for="supplier_id" class="form-label">Proveedor</label>
                    <select class="form-select"  name="supplier_id">
                        @foreach ($suppliers as $s)
                            <option value="{{$s->id}}">{{$s->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3 text-start">
                    <label for="unit_type" class="form-label">Tipo de Unidad</label>
                    <select class="form-select"  name="unit_type">
                        @foreach ($unitTypes as $ut)
                            <option value="{{$ut->id}}">{{$ut->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3 text-start">
                    <label for="status" class="form-label">Estado</label>
                    <select class="form-select"  name="status">
                        <option value="1">PRODUCTO ACTIVO</option>
                        <option value="0">PRODUCTO INACTIVO</option>
                    </select>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col text-end">
                <button class="btn btn-primary fw-bold" type="submit">REGISTRAR</button>
                <button class="btn btn-secondary fw-bold" type="reset">LIMPIAR</button>
                <a class="btn btn-danger fw-bold" href="/dashboard/p/list">CANCELAR</a>
            </div>
        </div>
    </form>
    </div>
</div>
@endsection
