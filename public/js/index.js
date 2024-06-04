
var dinero = 0;
var jugadas = 0;
let currentCoin = 0;
let apostado = 0;

function UnSelectedCoin(){
    $('.img-ficha').find('img').removeClass('selected-ficha');
    currentCoin = 0;
    moverFicha = false;
    $('#fichaMove').addClass('d-none');
}

function set_money(money){
    dinero = money;
}

function set_intentos(games){
    jugadas = games;
}

function actualizar_ranking(){
    $.get("actualizar-ranking", function (data) {
        
        data.forEach((item, index) => {
            let content = $('#jugador' + index);
            content.find('.username').html(item.usuario);
            content.find('.money').html(item.dinero);
            content.removeClass('d-none');
        });

        setTimeout(() => {
            actualizar_ranking();
        }, 15000);

    }).fail(function(response) {

    });
}

actualizar_ranking();