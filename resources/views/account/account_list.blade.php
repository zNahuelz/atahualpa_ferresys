@extends('shared.main')
@section('content')
<title>Ferreteria Atahualpa - Listado de Usuarios</title>
<div class="card text-center mt-3 border-dark">
    <div class="card-body">
        <div class="row text-end mb-3">
            <div class="col">
                <a class="btn btn-outline-primary" href="/dashboard/ua/register">Nuevo Usuario</a>
            </div>
        </div>

        <div class="row">
            <div class="col">
                @if(sizeof($users) > 0)
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>DNI</th>
                            <th>E-Mail</th>
                            <th>Teléfono</th>
                            <th>Tipo de Cuenta</th>
                            <th>Fecha de Creación</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $u)
                        <tr>
                            <td>{{$u->id}}</td>
                            <td class="fw-normal fs-6">{{$u->name}}</td>
                            <td class="fw-normal fs-6">{{$u->surname}}</td>
                            <td class="fw-normal fs-6">{{$u->dni}}</td>
                            <td class="fw-normal fs-6">{{$u->email}}</td>
                            <td class="fw-normal fs-6">{{$u->phone}}</td>
                            @if ($u->type == 0)
                                <td class="fw-normal fs-6">ADMINISTRADOR</td>
                            @elseif($u->type == 1)
                                <td class="fw-normal fs-6">VENDEDOR</td>
                            @elseif($u->type == 2)
                                <td class="fw-normal fs-6">OBSERVADOR</td>
                            @else
                                <td class="fw-normal fs-6">N/A</td>
                            @endif
                            <td class="fw-normal fs-6">{{$u->created_at->format('d M Y - h:i A')}}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="/dashboard/p/edit/{{$u->id}}" class="btn btn-sm btn-warning bg-gradient fw-bold">EDITAR</a>
                                    <a href="/dashboard/p/details/{{$u->id}}" class="btn btn-sm btn-primary bg-gradient fw-bold">DETALLES</a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="bi bi-person-fill-exclamation" viewBox="0 0 16 16">
                    <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2zm3.564 1.426L5.596 5 8 5.961 14.154 3.5zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z"/>
                  </svg>
                <h3 class="fw-light mt-2">No se encontraron usuarios!</h3>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
