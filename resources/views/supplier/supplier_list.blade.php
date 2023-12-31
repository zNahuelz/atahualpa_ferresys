@extends('shared.main')
@section('content')
<title>Ferreteria Atahualpa - Listado de Proveedores</title>
<div class="card text-center mt-3 border-dark">
    <div class="card-body">
        <div class="row text-end mb-3">
            <div class="col">
                <a class="btn btn-outline-primary" href="/dashboard/s/new">Nuevo Proveedor</a>
            </div>
        </div>
        <div class="row">
            <div class="col">
                @if(sizeof($suppliers) > 0)
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Teléfono</th>
                            <th>Descripción</th>
                            <th>Estado</th>
                            <th>Fecha Registro</th>
                            <th>Herramientas</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($suppliers as $s)
                        <tr>
                            <td>{{$s->id}}</td>
                            <td class="fw-normal fs-6">{{$s->name}}</td>
                            <td class="fw-normal fs-6">{{$s->phone}}</td>
                            <td class="fw-normal fs-6">{{$s->description}}</td>
                            @if ($s->status == true)
                            <td class="fw-bold fs-6 text-success">ACTIVO</td>
                            @else
                            <td class="fw-bold fs-6 text-danger">INACTIVO</td>
                            @endif
                            <td class="fw-normal fs-6">{{$s->created_at->format('d M Y - h:i A')}}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="/dashboard/s/edit/{{$s->id}}" class="btn btn-sm btn-warning bg-gradient fw-bold">EDITAR</a>
                                    <a href="/dashboard/s/details/{{$s->id}}" class="btn btn-sm btn-primary bg-gradient fw-bold">DETALLES</a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="bi bi-person-x-fill" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m6.146-2.854a.5.5 0 0 1 .708 0L14 6.293l1.146-1.147a.5.5 0 0 1 .708.708L14.707 7l1.147 1.146a.5.5 0 0 1-.708.708L14 7.707l-1.146 1.147a.5.5 0 0 1-.708-.708L13.293 7l-1.147-1.146a.5.5 0 0 1 0-.708z"/>
                  </svg>
                <h3 class="fw-light mt-2">No se encontraron proveedores!</h3>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
