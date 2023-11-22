<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container d-flex align-items-center justify-content-center min-vh-100 flex-column">
    <div class="col-3 card card-body mb-5 mt-5" style="max-height: 300px">
        <form action="/login" class="form" method="POST">
            @csrf
            <div class="mb-3">
                <img src="{{asset('/resources/img/logo_transparent.png')}}" alt="" srcset="" class="img img-fluid">
            </div>
            <div class="mb-3">
                <input type="email" name="email" placeholder="email@dominio.com" class="form-control">
            </div>
            <div class="mb-3">
                <input type="password" name="password" placeholder="Contraseña" class="form-control">
            </div>
            <div class="text-center">
                <button class="btn btn-outline-primary">INICIAR SESIÓN</button>
            </div>
        </form>
    </div>
    </div>

</body>
</html>
