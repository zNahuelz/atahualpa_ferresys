@extends('shared.main')
@section('content')
<title>Ferreteria Atahualpa - Registro de Usuario</title>
<div class="card text-center mt-3 border-dark">
    <div class="card-body">
        <div class="row text-center mb-3">
            <div class="col">
                <h3 class="fw-light">Registro de Usuario</h3>
            </div>
        </div>

        <form action="/dashboard/ua/register" class="form" method="POST">
            @csrf
            <div class="row">
                <div class="col text-start">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombres</label>
                        <input type="text" class="form-control" name="name" placeholder="Juan Alberto">
                        @error('name')
                        <div class="text-danger mt-1">Ups! Debe llenar el campo nombres.</div>
                        @enderror
                    </div>
                </div>

                <div class="col text-start">
                    <div class="mb-3">
                        <label for="surname" class="form-label">Apellidos</label>
                        <input type="text" class="form-control" name="surname" placeholder="Ochoa Venegas">
                        @error('surname')
                        <div class="text-danger mt-1">Ups! Debe llenar el campo apellidos.</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col text-start">
                    <div class="mb-3">
                        <label for="dni" class="form-label">DNI</label>
                        <input type="text" name="dni" class="form-control">
                        @error('dni')
                        <div class="text-danger mt-1">Ups! Debe llenar el campo DNI.</div>
                        @enderror
                    </div>
                </div>
                <div class="col text-start">
                    <div class="mb-3">
                        <label for="email" class="form-label">E-Mail</label>
                        <input type="email" name="email" placeholder="email@dominio.com" class="form-control">
                        @error('email')
                        <div class="text-danger mt-1">Ups! Debe llenar el campo e-mail.</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col text-start">
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" name="password" class="form-control">
                        @error('password')
                        <div class="text-danger mt-1">Ups! Debe llenar el campo contraseña.</div>
                        @enderror
                    </div>
                </div>
                <div class="col text-start">
                    <div class="mb-3">
                        <label for="phone" class="form-label">Teléfono</label>
                        <input type="text" name="phone" placeholder="999333444" class="form-control">
                        @error('phone')
                        <div class="text-danger mt-1">Ups! Debe llenar el campo teléfono.</div>
                        @enderror
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-6 text-start">
                    <div class="mb-3">
                        <label for="type" class="form-label">Tipo de Cuenta</label>
                        <select class="form-select" name="type">
                            <option value="1" selected>VENDEDOR</option>
                            <option value="2">OBSERVADOR</option>
                            <option value="0">ADMINISTRADOR</option>
                        </select>
                        @error('type')
                        <div class="text-danger mt-1">Ups! Debe seleccionar un tipo de cuenta.</div>
                        @enderror
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col text-end">
                    <button class="btn btn-primary bg-gradient fw-bold" type="submit">REGISTRAR</button>
                    <button class="btn btn-secondary bg-gradient fw-bold" type="reset">LIMPIAR</button>
                    <a class="btn btn-danger bg-gradient fw-bold" href="/dashboard/ua/list">CANCELAR</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
