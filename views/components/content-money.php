<div class="d-flex justify-content-between mt-2" id="content-money">
    <div></div>
    <div></div>
    <div>
        <div class="d-flex justify-content-center align-items-center">
            <?php if (!isset($infoUser->usuario_id)) { ?>
                <a class="btn-iniciosesion" href="home"><strong>Iniciar sesión</strong></a>
            <?php } else { ?>
                <div class="btn-iniciosesion"><strong>Apostado: $ <span id="lblApostado">0.00</span></strong></div>
                <div class="btn-dinero ms-3"><strong>Dinero: $ <span id="money"><?= number_format($infoUser->usuario_dinero ?? 0) ?></span></strong></div>
            <?php } ?>
        </div>
    </div>
</div>