<!DOCTYPE html>
<html>

<head>
    <title>Casino Palms</title>
    <meta charset="UTF-8">
    <!-- Enlaza los archivos CSS y Font Awesome -->
    <link rel="stylesheet" href="css/principalstyle.css?v=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
  <!-- Barra de navegación -->
<nav class="navbar">
    <div class="logo">
        <a href="#"><img src="images/logotran.png" alt="Logo"></a>
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

  <!-- Sección de juegos -->
  <div class="games-section">
            <h2>Juegos Populares</h2>
            <div class="games-grid">
                <div class="game-card">
                    <img src="images/rule.jpg" alt="Juego 1">
                    <h3>Roulette</h3>
                    <p>Descripción breve del juego.</p>
                    <a href="ruleta" class="button"> Jugar</a>
                </div>
                <div class="game-card">
                    <img src="images/trgaperras.jpg" alt="Juego 2">
                    <h3>Juego 2</h3>
                    <p>Descripción breve del juego.</p>
                    <button class="button">Jugar</button>
                </div>
                <div class="game-card">
                    <img src="images/balck jack.jpg" alt="Juego 3">
                    <h3>Juego 3</h3>
                    <p>Descripción breve del juego.</p>
                    <button class="button">Jugar</button>
                </div>
            </div>
        </div>



         <!-- Pie de página -->
    <footer>
        &copy; CasinoPalms 2024
    </footer>

    <!-- Enlaza el archivo JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="js/scriptP.js"></script>
</body>

</html>