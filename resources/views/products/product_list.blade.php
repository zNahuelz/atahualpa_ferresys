@extends('shared.main')
@section('content')
<div class="card text-center mt-3 border-dark">
    <div class="card-body">
        <div class="row">
            <div class="col">
                @if(empty($products))
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
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $p)
                        <tr>
                            <th>{{$p->id}}</th>
                            <td class="fw-normal fs-6">{{$p->name}}</td>
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
