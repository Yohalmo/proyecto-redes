<div class="row col-12 p-0 m-0 container-ruleta">
    <div class="col-xl-7 col-md-8 col-sm-12">
        <div class="d-flex justify-content-center">
            <div class="ruleta">
                <div class="ruleta-numbers">
                    <div class="secondLine"></div>
                    <div class="ball" id="orbitar"></div>
                    <div class="spinCenter justify-content-center">
                        <div style="position: relative;width: 70%;height: 100%;" 
                        class="d-flex align-items-center justify-content-center">
                            <div class="middle-bar"></div>
                            <d class="" style="width: 100%;height: 100%; position:absolute">
                                <div class="d-flex align-items-center justify-content-between" style="width: 100%;height: 100%; ">
                                    <div class="center-circle side-ball"></div>
                                    <div class="center-circle middle-ball"></div>
                                    <div class="center-circle side-ball"></div>
                                </div>
                            </d>
                        </div>
                    </div>
                    <div class="wheel">
                        <?php for ($k = 0; $k < 18; $k++) { ?>
                            <div id="ruletaNumber<?= ($k * 2) + 1 ?>" 
                                class="number ruletaNumber numeroItem<?= $red[$k] ?>" 
                                style="--i:<?= ($k * 2) + 1 ?>;--clr:red;">
                                <span><strong><?= $red[$k] ?></strong></span>
                            </div>
                            <div id="ruletaNumber<?= ($k * 2) + 2 ?>" 
                                class="number ruletaNumber numeroItem<?= $black[$k] ?>" 
                                style="--i:<?= ($k * 2) + 2  ?>;--clr:#000">
                                <span><strong><?= $black[$k] ?></strong></span>
                            </div>
                        <?php } ?>
                        <div class="number ruletaNumber numeroItem0" id="ruletaNumber37" style="--i:37;--clr:green">
                            <span><strong>0</strong></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-5 col-md-4 col-sm-12 d-flex justify-content-center align-items-center d-none"
    id="contentResult">
        <div class="result">
            <div class="text-center mt-1">
                <strong>
                    <div class="d-flex justify-content-between p-1 pt-0" style="font-size: 25px;"
                        id="DataSelected">
                    </div>
                </strong>
            </div>
            <div class="text-center mt-3 mb-3">
                <strong id="result">0</strong>
            </div>
            <div class="text-center">
                <strong id="message">Sin premio</strong>
            </div>
        </div>
    </div>
</div>