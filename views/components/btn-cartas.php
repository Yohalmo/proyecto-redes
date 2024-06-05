
<div class="col-12">
    <div class="d-flex justify-content-center mt-4">
        <div class="btn-play winner me-3 d-none"><strong>Has ganado <span id="moneyMade"></span></strong></div>
        <?php if (isset($infoUser->usuario_id)) { ?>

            <button class="btn btn-success btn-play ms-2 me-2 btn-playing"
                    onclick="apostar()" id="btnApostar"><strong>Apostar</strong></button>

            <button class="btn btn-success btn-play" id="btnPlay"
                    onclick="start_game()"><strong>Jugar</strong></button>

            <button class="btn btn-success btn-play ms-2 d-none btn-playing"
                    onclick="finalizar()"><strong>Finalizar juego</strong></button>
                    
            <button class="btn btn-success btn-play ms-2 d-none btn-playing"
                        onclick="move()"><strong>Pedir carta</strong></button>
        <?php } ?>
    </div>
</div>