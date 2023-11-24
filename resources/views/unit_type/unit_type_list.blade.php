@extends('shared.main')
@section('content')
<title>Ferreteria Atahualpa - Gestión de Tipos de Unidades</title>
    <div class="card text-center mt-3 border-dark">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    @if (empty($unitTypes))
                    <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="bi bi-bag" viewBox="0 0 16 16">
                        <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2zm3.564 1.426L5.596 5 8 5.961 14.154 3.5zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z"/>
                      </svg>
                    <h3 class="fw-light mt-2">No se encontraron tipos de unidad!</h3>
                    @else
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Nombre</th>
                                <th>Fecha Creación</th>
                                <th>Última actualización</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($unitTypes as $ut)
                            <tr>
                                <th>{{$ut->id}}</th>
                                <td class="fw-normal fs-6">{{$ut->name}}</td>
                                @if ($ut->created_at == null)
                                    <td class="fw-bold text-danger">N/A</td>
                                @else
                                <td class="fw-bold">{{$ut->created_at->format('d M Y - h:i A')}}</td>
                                @endif

                                @if ($ut->updated_at == null)
                                    <td class="fw-bold text-danger">N/A</td>
                                @else
                                <td class="fw-bold">{{$ut->updated_at->format('d M Y  - h:i A')}}</td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                </div>
                <div class="col-4 align-self-center">
                    <div class="container">
                        <div class="card border-dark">
                            <div class="card-body">
                                <div class="mb-3 text-center">
                                    <h3 class="fw-lighter">Nueva Categoría</h3>
                                </div>
                                <form action="/dashboard/ut/new" class="form" method="POST" class="form">
                                    @csrf
                                    <div class="mb-3">
                                        <input type="text" name="name" placeholder="Nombre Categoría..." class="form-control">
                                    </div>
                                    <div class="text-center">
                                        <button class="btn btn-outline-primary">GUARDAR</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
