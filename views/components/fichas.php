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
        <?php
            if(isset($viewBtns)){
                include $viewBtns;
            }
        ?>
    </div>
</div>