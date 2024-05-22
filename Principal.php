<!DOCTYPE html>
<html>

<head>
    <title>Casino Palms</title>
    <meta charset="UTF-8">
    <!-- Enlaza los archivos CSS y Font Awesome -->
    <link rel="stylesheet" href="principalstyle.css?v=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <!-- Barra de navegación -->
    <nav class="navbar">
        <div class="logo">
            <a href="#">Casino Palms</a>
        </div>
        <div class="nav-links">
            <a href="#"><i class="fas fa-home"></i> Inicio</a>
            <a href="#"><i class="fas fa-gamepad"></i> Juegos</a>
            <a href="#"><i class="fas fa-info-circle"></i> Sobre nosotros</a>
            <a href="#"><i class="fas fa-envelope"></i> Contacto</a>
        </div>
        <div class="auth-links">
            <button data-bs-toggle="modal" data-bs-target="#modal-inicioSesion">Iniciar Sesión</button>
            <button data-bs-toggle="modal" data-bs-target="#modal-registrarse">Registrarse</button>
        </div>
    </nav>

    <!-- Contenido principal -->
    <div class="content">
        <div class="hero-section">
            <h1>Bienvenido a Casino Palms</h1>
            <p>¡El mejor lugar para disfrutar de tus juegos favoritos!</p>
            <button>Explora juegos</button>
        </div>

        <!-- Sección de juegos -->
        <div class="games-section">
            <h2>Juegos Populares</h2>
            <div class="games-grid">
                <div class="game-card">
                    <img src="img/rule.jpg" alt="Juego 1">
                    <h3>Roulette</h3>
                    <p>Descripción breve del juego.</p>
                    <a href="index-ruleta.php" class="button"> Jugar</a>
                </div>
                <div class="game-card">
                    <img src="img/trgaperras.jpg" alt="Juego 2">
                    <h3>Juego 2</h3>
                    <p>Descripción breve del juego.</p>
                    <button class="button">Jugar</button>
                </div>
                <div class="game-card">
                    <img src="img/balck jack.jpg" alt="Juego 3">
                    <h3>Juego 3</h3>
                    <p>Descripción breve del juego.</p>
                    <button class="button">Jugar</button>
                </div>
            </div>
        </div>

    </div> <!-- Fin del contenido principal -->

    <!-- Modales de inicio de sesión y registro -->
    <div id="modal-inicioSesion" class="modal fade">

        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Iniciar sesión</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="iniciarSesionForm" class="modal-body">
                    <div class="form-group mb-3">
                        <div class="form-label text-black small">Correo electrónico</div>
                    <input type="email" id="email" placeholder="Correo electrónico" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <div class="form-label text-black small">Contraseña</div>
                    <input type="password" id="password" placeholder="Contraseña" class="form-control" required>
                    </div>
                </form>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Iniciar sesión</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-registrarse">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Registrarse</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="registrarseForm" method="post">
                        <div class="form-group mb-3">
                            <div class="form-label small text-black">Nombre</div>
                            <input type="text" id="nombre" class="form-control" placeholder="Nombre" required>
                        </div>
                        <div class="form-group mb-3">
                            <div class="form-label small text-black">Correo electrónico</div>
                            <input type="email" id="email-reg" class="form-control" placeholder="Correo electrónico" required>
                        </div>
                        <div class="form-group mb-3">
                            <div class="form-label small text-black">Nombre</div>
                            <input type="password" id="password-reg" placeholder="Contraseña" required class="form-control">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" formaction="#registrarseForm">Registrarse</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Pie de página -->
    <footer>
        &copy; CasinoPalms 2024
    </footer>

    <!-- Enlaza el archivo JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="scriptP.js"></script>
</body>

</html>