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
                
                <div class="d-flex jusfify-content-end align-items-center dropdown ms-3">
                        <strong class="text-white"><?= $infoUser->usuario_nombre ?></strong>
                        <button class="ms-3 rounded-circle bg-white d-flex justify-content-center align-items-center text-black" 
                            style="height: 50px; width:50px"
                            type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user" style="color: #000 !important; font-size:20px"></i>
                        </button>
                        
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"
                        style="margin-left: -70px">
                        <a class="dropdown-item" href="cerrar-session">Cerrar sesión</a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>