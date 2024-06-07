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
            <?php
            if (isset($infoUser->usuario_id)) { ?>
            
            <div class="d-flex jusfify-content-end align-items-center dropdown">
                    <strong><?= $infoUser->usuario_nombre ?></strong>
                    <button class="ms-4 rounded-circle bg-white d-flex justify-content-center align-items-center text-black" 
                        style="height: 50px; width:50px"
                        type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user" style="color: #000 !important; font-size:20px"></i>
                    </button>
                    
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"
                    style="margin-top: 110px; margin-left: -20px">
                    <a class="dropdown-item" href="cerrar-session">Cerrar sesión</a>
                </div>
            </div>

            <?php } else { ?>
                <button href="home" onclick="location.href='home'">Iniciar Sesión</button>
                <button href="home" onclick="location.href='home'">Registrarse</button>
            <?php }  ?>
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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="js/scriptP.js"></script>
</body>

</html>