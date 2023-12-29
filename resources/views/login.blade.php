<!DOCTYPE html>
<html lang="en">
<head>
    <title>Ferreteria Atahualpa - Inicio de Sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card my-5">
                    <form class="card-body cardbody-color p-lg-5" action="/login" method="POST">
                        @csrf
                        <div class="text-center">
                            <img src="https://cdn-icons-png.flaticon.com/512/5018/5018089.png"
                                class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3" width="200px"
                                alt="profile">
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control" name="email" placeholder="E-Mail">
                            @error('email')
                            <div class="text-danger mt-1">Ups! Debe llenar el campo e-mail.</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" name="password" placeholder="Contraseña">
                            @error('password')
                            <div class="text-danger mt-1">Ups! Debe llenar el campo contraseña.</div>
                            @enderror
                        </div>
                        @error('error')
                            <div class="mb-3 text-center text-danger">
                                <h6>{{$message}}</h6>
                            </div>
                        @enderror
                        <div class="text-center"><button type="submit"
                                class="btn btn-success bg-gradient px-5 mb-3 fw-bold">INICIAR SESIÓN</button></div>
                        <div id="emailHelp" class="form-text text-center mb-5 text-dark">¿Ha perdido sus credenciales?
                            <a href="#" class="text-danger fw-bold">Click aquí</a>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</body>
</html>
