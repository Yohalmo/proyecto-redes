<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cartas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css?v=1">
    <link rel="stylesheet" href="css/cartas.css?v=1">
</head>

<body>
    <div class="body">
        <div class="absolute-container">
            <?php include __DIR__ . '/../components/players.php'; ?>
            <?php include __DIR__ . '/../components/content-money.php'; ?>

            <div class="main-container cartas">
                <div class="col-12 row m-auto">
                    <div class="col-4 text-center">
                        <div class="d-flex justify-content-center mb-3" style="width: 190px">
                            <div class="user-name"><strong>Puntaje: <span id="scoreHome">0</span></strong></div>
                        </div>
                        <div class="cartas-home position-absolute goodScroll" style="height: 400px; width:210px; overflow-y:scroll">
                        </div>
                    </div>

                    <div class="col-4 text-center text-middle mt-auto mb-auto" style="margin-top: 110px !important;">
                        <img src="images/poker.jpg" width="150" alt="" srcset="" id="centerCard">
                    </div>

                    <div class="col-4 ps-5">
                        <div class="d-flex justify-content-start mb-3" style="width: 190px">
                            <div class="user-name"><strong>Puntaje: <span id="scorePlayer">0</span></strong></div>
                        </div>
                        <div class="cartas-tomadas position-absolute goodScroll" style="height: 400px; width:210px; overflow-y:scroll">
                        </div>
                    </div>
                </div>
            </div>

            <?php
            $viewBtns = 'btn-cartas.php';
            include __DIR__ . '/../components/fichas.php';
            ?>
        </div>

    </div>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="js/index.js?v=1"></script>
    <script src="js/cartas.js?v=1"></script>

    <img src="images/poker.jpg" class="d-none position-absolute hiddenCard" alt="" width="190">

    <script>
        set_intentos(<?= $infoUser->usuario_jugadas ?? 0 ?>);
        set_money(<?= $infoUser->usuario_dinero ?? 0 ?>);
    </script>
</body>

</html>