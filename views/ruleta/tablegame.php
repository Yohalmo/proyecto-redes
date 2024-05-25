<table>
    <tbody>
        <?php
        for ($i = 0; $i < 3; $i++) { ?>
            <tr class="row-items">
                <?php if (!$i) { ?>
                    <td rowspan="3" class="bg-green border-0 unselected ficha-item cero">
                        <div class="bgtd"></div>
                        <div class="square-number">
                            <strong class="absolute-class" id="contenedor0">0</strong>
                            <div class="divficha"></div>
                        </div>
                    </td>
                <?php } ?>

                <?php for ($j = 0; $j < 12; $j++) {
                    $result = $j % 2;
                    $number = $numeros[($j + $i) + (11 * $i)];
                    $color = $colores[$i][$result];
                    ${$color}[] = $number;
                    $grupo = round(($j / 4) - 0.4);
                ?>
                    <td class="col-xl-1 col-md-12 col-sm-12 ficha-item unselected bg-<?php echo  $color . ($number % 2 ? ' impar ' : ' par ') . ($j < 6 ? ' menor ' : ' mayor ') . $grupos[$grupo] ?> ">
                        <div class="bgtd"></div>
                        <div class="circle-number relativetableItems">
                            <strong class="numero" id="contenedor<?= $number ?>"><?= $number ?></strong>
                            <div class="divficha"></div>
                        </div>
                    </td>
                <?php } ?>

                <td class="row-selected unselected">
                    <div class=""></div>
                    <div class="circle-number relativetableItems">
                        <strong>2:1</strong>
                        <div class="divficha"></div>
                    </div>
                </td>
            </tr>
        <?php } ?>
        <tr>
            <td class="border-0"></td>
            <td colspan="4" class="tdfooter grupos" classItem="primeros">
                <div class="divrotar relativetableItems">
                    <div class="absolute-class">1° doce</div>
                    <div class="divficha"></div>
                </div>
            </td>
            <td colspan="4" class="tdfooter grupos" classItem="segundos">
                <div class="divrotar relativetableItems">
                    <div class="absolute-class">2° doce</div>
                    <div class="divficha"></div>
                </div>
            </td>
            <td colspan="4" class="tdfooter grupos" classItem="terceros">
                <div class="divrotar relativetableItems">
                    <div class="absolute-class">3° doce</div>
                    <div class="divficha"></div>
                </div>
            </td>
        </tr>
        <tr>
            <td class="border-0"></td>
            <td colspan="2" class="tdfooter rango" classItem="menor">
                <div class="divrotar relativetableItems">
                    <div class="absolute-class">1-18</div>
                    <div class="divficha"></div>
                </div>
            </td>
            <td colspan="2" class="tdfooter number-type" classItem='par'>
                <div class="divrotar relativetableItems">
                    <div class="absolute-class">PAR</div>
                    <div class="divficha"></div>
                </div>
            </td>
            <td colspan="2" class="tdfooter bg-red color-selected">
                <div class="relativetableItems">
                    <div class="divrotar divficha"></div>
                </div>
            </td>
            <td colspan="2" class="tdfooter bg-black color-selected">
                <div class="relativetableItems">
                    <div class="divrotar divficha"></div>
                </div>
            </td>
            <td colspan="2" class="tdfooter number-type" classItem='impar'>
                <div class="divrotar relativetableItems">
                    <div class="absolute-class">IMPAR</div>
                    <div class="divficha"></div>
                </div>
            </td>
            <td colspan="2" class="tdfooter rango" classItem="mayor">
                <div class="divrotar relativetableItems">
                    <div class="absolute-class">19-36</div>
                    <div class="divficha"></div>
                </div>
            </td>
        </tr>
    </tbody>
</table>