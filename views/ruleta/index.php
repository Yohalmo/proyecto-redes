<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ruleta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/game.css?version=1.0">
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <div class="body">
        <img src="images/fichas.png" alt="" srcset="" height="200" class="position-absolute" style="margin-left: 100px">
        <img src="images/fichas.png" alt="" srcset="" height="200" class="position-absolute" style="margin-top: 200px;">
        <img src="images/fichas.png" alt="" srcset="" height="200" class="position-absolute" style="margin-top: 200px;margin-left: 300px;">
        <img src="images/fichas.png" alt="" srcset="" height="200" class="position-absolute" style="margin-top: 400px;margin-left: 100px;">

        <img src="images/fichas.png" alt="" srcset="" height="100" class="position-absolute" style="margin-top: 60vh;margin-left: 70vw;">
        <img src="images/fichas.png" alt="" srcset="" height="100" class="position-absolute" style="margin-top: 70vh;margin-left: 80vw;">

        <?php include __DIR__. '/../components/players.php'; ?>
        
        <div class="absolute-container">
            <?php include __DIR__. '/../components/content-money.php'; ?>

            <div class="main-container">
                <?php include 'tablegame.php' ?>
            </div>

            <?php 
                $viewBtns = 'btn-ruleta.php';
                include __DIR__. '/../components/fichas.php'; 
            ?>
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
    <script src="js/index.js"></script>
    <script src="js/game.js?v=1.2"></script>

    <script>
        set_intentos(<?= $infoUser->usuario_jugadas ?? 0 ?>);
        set_money(<?= $infoUser->usuario_dinero ?? 0 ?>);
    </script>
</body>

</html>