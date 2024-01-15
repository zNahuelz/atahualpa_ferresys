@extends('shared.main')
@section('content')
<title>Ferreteria Atahualpa - Mi Perfil</title>
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
        <div class="row">
            <div class="col-6">
                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664z"/>
                </svg>
                <h5 class="fw-light">Datos de Cuenta</h5>
                <hr>
                <div class="mb-3 text-start">
                    <label for="txtName" class="form-label">Nombres</label>
                    <input type="text" name="txtName" class="form-control" disabled value="{{Auth::user()->name}}">
                </div>
                <div class="mb-3 text-start">
                    <label for="txtSurname" class="form-label">Apellidos</label>
                    <input type="text" name="txtSurname" class="form-control" disabled value="{{Auth::user()->surname}}">
                </div>
                <div class="mb-3 text-start">
                    <label for="txtDni" class="form-label">DNI</label>
                    <input type="text" name="txtDni" class="form-control" disabled value="{{Auth::user()->dni}}">
                </div>
                <div class="mb-3 text-start">
                    <label for="txtEmail" class="form-label">Email</label>
                    <input type="text" name="txtEmail" class="form-control" disabled value="{{Auth::user()->email}}">
                </div>
                <div class="mb-3 text-start">
                    <label for="txtPhone" class="form-label">Teléfono</label>
                    <input type="text" name="txtPhone" class="form-control" disabled value="{{Auth::user()->phone}}">
                </div>
                <div class="mb-3 text-start">
                    <label for="txtStatus" class="form-label">Estado de Cuenta</label>
                    @if (Auth::user()->status == true)
                    <input type="text" name="txtStatus" class="form-control fw-bold text-success" disabled value="ACTIVA">
                    @else
                    <input type="text" name="txtStatus" class="form-control fw-bold text-danger" disabled value="INACTIVA">
                    @endif
                </div>
            </div>
            <div class="col-6">
                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="bi bi-person-up" viewBox="0 0 16 16">
                    <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.354-5.854 1.5 1.5a.5.5 0 0 1-.708.708L13 11.707V14.5a.5.5 0 0 1-1 0v-2.793l-.646.647a.5.5 0 0 1-.708-.708l1.5-1.5a.5.5 0 0 1 .708 0M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0M8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4"/>
                    <path d="M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1z"/>
                  </svg>
                <h5 class="fw-light">Editar Datos de Cuenta</h5>
                <hr>
                <form action="/dashboard/mp/edit/{{Auth::user()->id}}" method="POST">
                    @csrf
                    @method("PUT")
                    <div class="mb-3 text-start">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" name="email" class="form-control" value="{{Auth::user()->email}}">
                    </div>
                    <div class="mb-3 text-start">
                        <label for="phone" class="form-label">Teléfono</label>
                        <input type="text" name="phone" class="form-control" value="{{Auth::user()->phone}}">
                    </div>
                    <div class="mb-3 text-center">
                        <div class="btn-group" role="group">
                            <button  class="btn btn-primary fw-bold" type="submit">ACTUALIZAR</button>
                            <button  class="btn btn-secondary fw-bold" type="reset">RESETEAR</button>
                            <a  class="btn btn-danger fw-bold" href="/dashboard">CANCELAR</a>
                          </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
