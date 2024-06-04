<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ruleta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/cartas.css">
</head>

<body>
    <div class="body">

        <?php include __DIR__. '/../components/players.php'; ?>

        <div class="absolute-container">
            <?php include __DIR__. '/../components/content-money.php'; ?>

            <div class="main-container cartas">
                <div class="col-12 row m-auto">
                    <div class="col-4 text-center">
                        <div class="d-flex justify-content-center mb-3">
                            <div class="user-name">Casa</div>
                        </div>
                        <img src="images/trebol/2.png" width="190" alt="" srcset="">
                    </div>
                    <div class="col-4 text-center text-middle mt-auto mb-auto">
                        <img src="images/poker.jpg" width="150" alt="" srcset="" id="centerCard">
                    </div>
                    <div class="col-4 text-center">
                        <div class="d-flex justify-content-center mb-3">
                            <div class="user-name">Yohalmo</div>
                        </div>
                        <div class="cartas-tomadas">
                            <img src="images/trebol/3.png" width="190" alt="" class="hidden" id="cartas-tomadas">
                        </div>
                    </div>
                </div>
            </div>

            <?php 
                $viewBtns = 'btn-cartas.php';
                include __DIR__. '/../components/fichas.php'; 
            ?>
        </div>

    </div>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="js/index.js"></script>
    <script src="js/cartas.js"></script>

    <img src="images/poker.jpg" style="position: absolute;" class="d-none" alt="" width="190" id="hiddenCard">

    <script>
        let coordenadas = $('#centerCard').offset();
        let cartasTomadas = 1;

        function move() {
            $('#hiddenCard').css({
                position: 'absolute',
                left: coordenadas.left + 'px',
                top: coordenadas.top + 'px'
            })

            $('#hiddenCard').removeClass('d-none');
            let lstCards = $('#cartas-tomadas').offset();

            $('#hiddenCard').animate({
                left: lstCards.left + 'px',
                top: lstCards.top + (cartasTomadas * 35) + 'px'
            }, 1000);

            setTimeout(() => {
                $('#hiddenCard').attr('src', 'images/trebol/4.png');
            }, 1050);

            cartasTomadas++;
        }
    </script>

    <script>
        set_intentos(<?= $infoUser->usuario_jugadas ?? 0 ?>);
        set_money(<?= $infoUser->usuario_dinero ?? 0 ?>);
    </script>
</body>

</html>