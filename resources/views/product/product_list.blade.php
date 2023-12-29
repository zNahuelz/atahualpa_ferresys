@extends('shared.main')
@section('content')
<title>Ferreteria Atahualpa - Listado de Productos</title>
<div class="card text-center mt-3 border-dark">
    <div class="card-body">
        <div class="row text-end mb-3">
            <div class="col">
                <a class="btn btn-outline-primary" href="/dashboard/p/new">Nuevo Producto</a>
            </div>
        </div>
        <div class="row">
            <div class="col">
                @if(sizeof($products) > 0)
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Stock</th>
                            <th>Unidad</th>
                            <th>Precio Venta</th>
                            <th>Fecha Ingreso</th>
                            <th>Herramientas</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $p)
                        <tr>
                            <td>{{$p->id}}</td>
                            <td class="fw-normal fs-6">{{$p->name}}</td>
                            @if ($p->description == '')
                                <td>N/A</td>
                            @else
                                <td class="fw-normal fs-6">{{$p->description}}</td>
                            @endif
                            <td class="fw-normal fs-6">{{$p->stock}}</td>
                            <td class="fw-normal fs-6">{{$p->unitType->name}}</td>
                            <td class="fw-normal fs-6">S./{{$p->sell_price}}</td>
                            <td class="fw-normal fs-6">{{$p->created_at->format('d M Y - h:i A')}}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="/dashboard/p/edit/{{$p->id}}" class="btn btn-sm btn-warning bg-gradient fw-bold">EDITAR</a>
                                    <a href="/dashboard/p/details/{{$p->id}}" class="btn btn-sm btn-primary bg-gradient fw-bold">DETALLES</a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="bi bi-box-seam" viewBox="0 0 16 16">
                    <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2zm3.564 1.426L5.596 5 8 5.961 14.154 3.5zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z"/>
                  </svg>
                <h3 class="fw-light mt-2">No se encontraron productos!</h3>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
