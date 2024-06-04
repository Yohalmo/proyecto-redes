
var dinero = 0;
var jugadas = 0;

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