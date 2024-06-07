<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación de Registro</title>
</head>
<body style="font-family: Arial, sans-serif; background: radial-gradient(circle at 100px 100px, #091018, #0e192d); padding: 20px;">

    <div style="max-width: 600px; margin: 0 auto; background-color: #f4f4f4; padding: 20px; border-radius: 5px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
        <h2 style="color: #333;">¡Bienvenido!</h2>
        <p>Estimado Usuario <?= $request->nombre ?? '' ?>,</p>
        <p>Te damos la bienvenida a nuestra plataforma. Tu registro ha sido exitoso.</p>
        <p>Si no has solicitado este registro, puedes ignorar este mensaje.</p>
        <p>¡Gracias!</p>
    </div>

</body>
</html>
