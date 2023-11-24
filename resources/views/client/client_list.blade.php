@extends('shared.main')
@section('content')
<title>Ferreteria Atahualpa - Listado de Clientes</title>
<div class="card text-center mt-3 border-dark">
    <div class="card-body">
        <div class="row text-end mb-3">
            <div class="col">
                <a class="btn btn-outline-primary" href="/dashboard/c/new">Nuevo Cliente</a>
            </div>
        </div>
        <div class="row">
            <div class="col">
                @if(sizeof($clients) > 0)
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>DNI</th>
                            <th>Teléfono</th>
                            <th>Fecha Registro</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clients as $c)
                        <tr>
                            <td>{{$c->id}}</td>
                            <td class="fw-normal fs-6">{{$c->name}}</td>
                            <td class="fw-normal fs-6">{{$c->surname}}</td>
                            <td class="fw-normal fs-6">{{$c->dni}}</td>
                            <td class="fw-normal fs-6">{{$c->phone}}</td>
                            <td class="fw-normal fs-6">{{$c->created_at->format('d M Y - h:i A')}}</td>
                            @if ($c->status == true)
                            <td class="fw-bold fs-6 text-success">ACTIVO</td>
                            @else
                            <td class="fw-bold fs-6 text-danger">INACTIVO</td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                    <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"/>
                </svg>
                <h3 class="fw-light mt-2">No se encontraron clientes!</h3>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
