<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Inicio de Sesión</title>
</head>

<body>

    <nav>
        <ul>
            <li><a href="pagina-principal" class="active"><i class="fas fa-home"></i> Pagina Principal</a></li>
            <li><a href="#"><i class="fas fa-dice"></i> Casino</a></li>
            <li><a href="#"><i class="fas fa-futbol"></i> Deportes</a></li>
        </ul>
    </nav>

    <div class="container-form sign-up">
        <div class="welcome-back">
            <div class="message" style="background-color:white; color:black; border-radius: 10px">
                <h2>Inicio de Sesión</h2>
                <p>Si ya tienes una cuenta por favor inicia sesión aquí</p>
                <button class="sign-up-btn">Iniciar Sesión</button>
            </div>
        </div>
        <form class="formulario" id="FormRegistro">
            <h2 class="create-account">Crear una cuenta</h2>
            <p class="cuenta-gratis"> Rellena tus datos</p>
            <input type="text" placeholder="Nombre" required name="nombre">
            <!-- <input type="text" placeholder="Apellido" required> -->
            <input type="email" placeholder="Email" name="email" required>
            <input type="password" placeholder="Contraseña" required name="password">
            <div class="terms">
                <div>
                <input type="checkbox" id="terms" name="terms" required>
            </div>
                <a href="#" class="Terminos">Términos y condiciones</a>
            </div>
            
            <input type="button" value="Registrarse" onclick="registrarse()">
        </form>
    </div>
    <div class="container-form sign-in">
        <form class="formulario">
            <h2 class="create-account">Iniciar Sesión</h2>
            <div class="iconos">
                <div class="border-icon">
                    <i class='bx bxl-instagram'></i>
                </div>
                <div class="border-icon">
                    <i class='bx bxl-google'></i>
                </div>
                <div class="border-icon">
                    <i class='bx bxl-facebook-circle'></i>
                </div>
            </div>
            <p class="cuenta-gratis">¿Aún no tienes una cuenta?</p>
            <input type="email" placeholder="Email" name="email" id="email">
            <input type="password" placeholder="Contraseña" name="password" id="password">
            <input type="button" value="Iniciar Sesión" onclick="login()">
            <div class="options">
                <a href="#" class="forgot-password">¿Olvidaste tu contraseña?</a>
                <a href="#" class="forgot-username">¿Olvidaste tu usuario?</a>
            </div>
        </form>
        <div class="welcome-back">
            <div class="message" style="background-color:white; color:black; border-radius: 10px">
                <h2>Bienvenido de nuevo</h2>
                <p>Si aún no tienes una cuenta por favor regístrate aquí</p>
                <button class="sign-in-btn" type="button">Registrarse</button>
            </div>
        </div>
    </div>
    <footer class="footer">
        <p>Derechos reservados BetPalms 2024 &copy;</p>
        <img src="images/logo_marca_registrada.png" alt="">
    </footer>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
</body>

</html>
