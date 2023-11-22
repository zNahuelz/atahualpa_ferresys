<header class="p-3 mb-3 border-bottom">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/dashboard" class="d-flex align-items-center mb-2 mb-lg-0 link-body-emphasis text-decoration-none">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-shop"
                    viewBox="0 0 16 16">
                    <path
                        d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.371 2.371 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976l2.61-3.045zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0M1.5 8.5A.5.5 0 0 1 2 9v6h1v-5a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v5h6V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5M4 15h3v-5H4zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1zm3 0h-2v3h2z" />
                </svg>
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li class="nav-item dropdown ps-2">
                    <a class="nav-link dropdown-toggle text-dark px-2 link-body-emphasis" href="#"
                        data-bs-toggle="dropdown" aria-expanded="false">Clientes</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Listado</a></li>
                        <li><a class="dropdown-item" href="#">Nuevo Cliente</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown ps-2">
                    <a class="nav-link dropdown-toggle text-dark px-2 link-body-emphasis" href="#"
                        data-bs-toggle="dropdown" aria-expanded="false">Productos</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/dashboard/p/list">Listado</a></li>
                        <li><a class="dropdown-item" href="#">Nuevo Producto</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown ps-2">
                    <a class="nav-link dropdown-toggle text-dark px-2 link-body-emphasis" href="#"
                        data-bs-toggle="dropdown" aria-expanded="false">Proveedores</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Listado</a></li>
                        <li><a class="dropdown-item" href="#">Nuevo Proveedor</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-dark  link-body-emphasis" href="#"
                        data-bs-toggle="dropdown" aria-expanded="false">Gestión</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/dashboard/ut/list">Tipo Unidades</a></li>
                    </ul>
                </li>
            </ul>

            <div class="dropdown text-end">
                <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                      </svg>
                </a>
                <ul class="dropdown-menu text-small" style="">
                    <li><a class="dropdown-item" href="#">Mi Perfil</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item" href="/logout" onclick="event.preventDefault(); document.getElementById('cerrarSesion').submit();">Cerrar Sesión</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>
<form action="/logout" class="invisible" method="POST" id="cerrarSesion">
    @csrf
</form>
