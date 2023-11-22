<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<div class="container d-block align-items-center justify-content-center min-vh-100 flex-column mt-5 pt-5">
<div class="col-3 card card-body">
    <div class="mb-3 text-center">
        <h3 class="fw-lighter">Registro de Usuario</h3>
    </div>
    <form action="/register" class="form" method="POST">
        @csrf
        <div class="mb-3">
            <input type="text" name="name" placeholder="Nombres..." class="form-control">
        </div>
        <div class="mb-3">
            <input type="text" name="surname" placeholder="Apellidos..." class="form-control">
        </div>
        <div class="mb-3">
            <input type="password" name="password" placeholder="Contraseña" class="form-control">
        </div>
        <div class="mb-3">
            <input type="text" name="dni" placeholder="DNI..." class="form-control">
        </div>
        <div class="mb-3">
            <input type="email" name="email" placeholder="email@dominio.com" class="form-control">
        </div>
        <div class="mb-3">
            <input type="text" name="phone" placeholder="999333444" class="form-control">
        </div>

        <div class=" text-center">
            <button class="btn btn-outline-primary">REGISTRARME</button>
        </div>
    </form>
</div>
</div>
