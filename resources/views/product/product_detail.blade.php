@extends('shared.main')
@section('content')
<title>Ferreteria Atahualpa - Producto: {{$p->name}}</title>
<div class="card text-center mt-3 border-dark">
    <div class="card-body">
        <div class="row text-start">
            <div class="col mb-3">
                <label for="name" class="form-label fw-bold">Nombre</label>
                <input type="text" class="form-control" id="name" disabled value="{{$p->name}}">
            </div>
            <div class="col mb-3">
                @if(Str::length($p->description) >= 1)
                <label for="description" class="form-label fw-bold">Descripción</label>
                <textarea type="text" class="form-control" id="description" disabled rows="3">{{$p->description}}</textarea>
                @else
                <label for="description" class="form-label fw-bold">Descripción</label>
                <input type="text" class="form-control" id="description" disabled value="N/A">
                @endif
            </div>
        </div>

        <div class="row text-start">
            <div class="col mb-3">
                <label for="buy_price" class="form-label fw-bold">Precio de Compra</label>
                <input type="text" class="form-control" id="buy_price" disabled value="S./ {{$p->buy_price}}">
            </div>
            <div class="col mb-3">
                <label for="sell_price" class="form-label fw-bold">Precio de Venta</label>
                <input type="text" class="form-control" id="sell_price" disabled value="S./ {{$p->sell_price}}">
            </div>
        </div>

        <div class="row text-start">
            <div class="col-6 mb-3">
                <label for="stock_unit" class="form-label fw-bold">Stock</label>
                <input type="text" class="form-control" id="stock_unit" disabled value="{{$p->stock.' '.$p->unitType->name}}">
            </div>
            <div class="col-4 mb-3">
                <label for="supplier" class="form-label fw-bold">Proveedor</label>
                <input type="text" class="form-control" id="supplier" disabled value="{{$p->supplier->name}}">
            </div>
            <div class="col-1 mb-3">
                <label for="aux" class="form-label fw-bold invisible">Proveedor</label>
                <a class="btn btn-primary fw-bold bg-gradient" href="/dashboard/s/details/{{$p->supplier->id}}">DETALLE</a>
            </div>
        </div>

        <div class="row text-start">
            <div class="col mb-3">
                <label for="createdAt" class="form-label fw-bold">Fecha Registro</label>
                <input type="text" class="form-control" id="createdAt" disabled value="{{$p->created_at->format('d M Y - h:i A')}}">
            </div>

            <div class="col mb-3">
                <label for="updatedAt" class="form-label fw-bold">Fecha Modificación</label>
                <input type="text" class="form-control" id="updatedAt" disabled value="{{$p->updated_at->format('d M Y - h:i A')}}">
            </div>
        </div>

        <div class="row text-start">
            <div class="col-2 mb-3">
                @if($p->status == 1)
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
                <a href="/dashboard/p/edit/{{$p->id}}" class="btn btn-warning bg-gradient fw-bold">EDITAR</a>
                <a href="/dashboard/p/list" class="btn btn-danger bg-gradient fw-bold">ÁTRAS</a>
            </div>
        </div>
    </div>
</div>
@endsection
