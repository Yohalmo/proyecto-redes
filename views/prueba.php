<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="controladores/usuarios.php?accion=login" method="POST">
        <input type="text" name="usuario">
        <input type="text" name="email">
        <input type="text" name="password">
        <button>Enviar</button>
    </form>
</body>
</html>