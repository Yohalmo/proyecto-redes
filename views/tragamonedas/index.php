<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tragamonedas</title>
    <style>
        .contenedor {
    text-align: center;
    font-family: sans-serif;
}

.maquinas {
    display: flex;
    justify-content: space-around;
    margin-bottom: 20px;
}

.maquina {
    display: flex;
    flex-direction: column;
    border: 1px solid #ccc;
    padding: 10px;
    width: 100px;
}

.rodillo {
    border: 1px solid #ccc;
    padding: 10px;
    text-align: center;
    font-size: 30px;
    margin-bottom: 10px;
}

#btn-tirar {
    padding: 10px 20px;
    background-color: #007bff;
    color: white;
    cursor: pointer;
}

#mensaje {
    font-size: 20px;
    margin-top: 20px;
}

    </style>
</head>
<body>
    <h1>Modificacion</h1>  
    <div class="contenedor">
        <h1>Tragamonedas</h1>
        <div class="maquinas">
            <div class="maquina" id="maquina1">
                <div class="rodillo" data-simbolo=""></div>
                <div class="rodillo" data-simbolo=""></div>
                <div class="rodillo" data-simbolo=""></div>
            </div>
            <div class="maquina" id="maquina2">
                <div class="rodillo" data-simbolo=""></div>
                <div class="rodillo" data-simbolo=""></div>
                <div class="rodillo" data-simbolo=""></div>
            </div>
            <div class="maquina" id="maquina3">
                <div class="rodillo" data-simbolo=""></div>
                <div class="rodillo" data-simbolo="7️⃣"></div>
                <div class="rodillo" data-simbolo=""></div>
            </div>
        </div>
        <button id="btn-tirar">Tirar</button>
        <div id="mensaje"></div>
    </div>

    <script>
        const rodillos = document.querySelectorAll('.rodillo');
const btnTirar = document.getElementById('btn-tirar');
const mensaje = document.getElementById('mensaje');

let simbolos = ['', '', '', '', '', '', '', '7️⃣', ''];

function tirar() {
    const resultados = [];
    for (const rodillo of rodillos) {
        const indexAleatorio = Math.floor(Math.random() * simbolos.length);
        const simbolo = simbolos[indexAleatorio];
        rodillo.textContent = simbolo;
        resultados.push(simbolo);
    }

    const combinacion = resultados.join('');
    comprobarCombinacion(combinacion);
}

function comprobarCombinacion(combinacion) {
    // Aquí se define la lógica para verificar la combinación ganadora
    // (por ejemplo, tres símbolos iguales, etc.)

    if (combinacion === 'XXX') {
        mensaje.textContent = "¡Felicidades! Has ganado";
    } else {
        mensaje.textContent = "Sigue intentando";
    }
}

btnTirar.addEventListener('click', tirar);

    </script>
</body>
</html>
