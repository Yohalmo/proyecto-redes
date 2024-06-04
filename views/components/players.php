<div class="card" id="lstPlayers">
    <div class="card-body">
        <div class="text-center" style="background-color: white; border-radius: 50px; opacity:0.9">
            <strong class="text-center" style="color: #0e0827;">Mejores jugadores</strong>
        </div>
        <?php for ($i = 0; $i < 10; $i++) { ?>
            <div class="card mt-2 players d-none" id="jugador<?= $i ?>">
                <div class="card-body pt-1 pb-1 text-white">
                    <div class="d-flex">
                        <div style="height: 50px; width:50px; border-radius: 50%;">
                            <img src="images/user-icon.png" alt="" style="width: 100%; height:100%; object-fit: cover; border-radius: 50%">
                        </div>
                        <div class="ms-3">
                            <span class="username"></span>
                            <br>
                            <small class="money"></small>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>