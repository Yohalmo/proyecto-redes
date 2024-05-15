<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="game.css?version=1.0">
</head>

<body>
    <div class="body">

        <?php
        $numeros = [3, 2, 1];
        $colores = [['red', 'black'], ['black', 'red'], ['red', 'black']];
        $grupos = ['primeros', 'segundos', 'terceros'];
        $numeros = range(1, 36);
        shuffle($numeros);
        $red = $black = [];
        ?>

        <img src="images/fichas.png" alt="" srcset="" height="200" class="position-absolute" style="margin-left: 100px">
        <img src="images/fichas.png" alt="" srcset="" height="200" class="position-absolute" style="margin-top: 200px;">
        <img src="images/fichas.png" alt="" srcset="" height="200" class="position-absolute" style="margin-top: 200px;margin-left: 300px;">
        <img src="images/fichas.png" alt="" srcset="" height="200" class="position-absolute" style="margin-top: 400px;margin-left: 100px;">

        <img src="images/fichas.png" alt="" srcset="" height="100" class="position-absolute" style="margin-top: 60vh;margin-left: 70vw;">
        <img src="images/fichas.png" alt="" srcset="" height="100" class="position-absolute" style="margin-top: 70vh;margin-left: 80vw;">

        <div class="card" id="lstPlayers">
            <div class="card-body">
                <div class="text-center" style="background-color: white; border-radius: 50px; opacity:0.9">
                    <strong class="text-center" style="color: #0e0827;">Mejores jugadores</strong>
                </div>
                <?php for ($h = 0; $h < 7; $h++) { ?>
                    <div class="card mt-2 players">
                        <div class="card-body pt-1 pb-1">
                            <div class="d-flex">
                                <div style="height: 50px; width:50px; border-radius: 50%;">
                                    <img src="images/avatar-1.jpg" alt="" style="width: 100%; height:100%; object-fit: cover; border-radius: 50%">
                                </div>
                                <div class="ms-3">
                                    Lorem ipsum dolor
                                    <br>
                                    <small>$ 1500</small>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="absolute-container">
            <div class="main-container">
                <?php include 'tablegame.php' ?>
            </div>
            <div id="divfichas" class="d-flex justify-content-between p-0 m-0">
                <div id="container-fichas" class="d-flex p-2 ps-5 bg-white">
                    <div class="col-auto">
                        <div class="img-ficha">
                            <img class="nodrag-image" coin="1" id="coin1" src="images/ficha1.png" width="90" alt="" srcset="">
                        </div>
                    </div>
                    <div class="ms-2">
                        <div class="img-ficha">
                            <img class="nodrag-image" coin="5" id="coin5" src="images/ficha5.png" width="90" alt="" srcset="">
                        </div>
                    </div>
                    <div class="ms-2">
                        <div class="img-ficha">
                            <img class="nodrag-image" coin="10" id="coin10" src="images/ficha10.png" width="90" alt="" srcset="">
                        </div>
                    </div>
                    <div class="ms-2">
                        <div class="img-ficha">
                            <img class="nodrag-image" coin="20" id="coin20" src="images/ficha20.png" width="90" alt="" srcset="">
                        </div>
                    </div>
                    <div class="ms-2">
                        <div class="img-ficha">
                            <img class="nodrag-image" coin="50" id="coin50" src="images/ficha50.png" width="90" alt="" srcset="">
                        </div>
                    </div>
                    <div class="ms-2">
                        <div class="img-ficha">
                            <img class="nodrag-image" coin="100" id="coin100" src="images/ficha100.png" width="90" alt="" srcset="">
                        </div>
                    </div>
                </div>

                <div class=" me-5 mt-3">
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="btn button-play bg-black text-white" onclick="StartGame()">
                            <div>Apostar</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="icon-item-hidden" hidden>
            <div class="coin-item">
                <img class="absolute-container" class="nodrag-image" src="images/ficha1-empty.png" alt="" srcset="">
                <strong class="absolute-container me-1 quantity">1</strong>
            </div>
        </div>

        <div id="contenedor-ruleta" class="absolute-container d-none">
            <?php include 'ruleta.php' ?>
        </div>

        <img src="images/ficha1.png" alt="" id="fichaMove" class="position-absolute d-none">
    </div>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="game.js"></script>
    <script>
        function adjustContainer() {
            var elemento = $('.body');
            var anchoPantalla = parseFloat(document.documentElement.clientWidth);
            var altoPantalla = $(window).height();
            
            if(anchoPantalla > 810){
                elemento.css('left', '');
                elemento.css('top', '');
                elemento.css('width', '');
            }else{
                //elemento.css('width', altoPantalla);
                elemento.offset({
                    top: 0,
                    right: 0
                })
            }   
        }

        window.addEventListener('resize', adjustContainer);
        window.addEventListener('orientationchange', adjustContainer);

        // Ajuste inicial
        adjustContainer();
    </script>
</body>

</html>