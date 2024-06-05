let coordenadas = $('#centerCard').offset();
let lstCards;
let lstCardsHome = $('.cartas-home').offset();
let lstCardsPlayer = $('.cartas-tomadas').offset();
let cartasTomadas = 0;
let player = SumarPuntajePlayer;
let currentlst;
let scoreHome = 0;
let cartasHome = [];

let cartas = ["images/corazon/10.png", "images/corazon/2.png", "images/corazon/3.png", "images/corazon/4.png", "images/corazon/5.png",
    "images/corazon/6.png", "images/corazon/7.png", "images/corazon/8.png", "images/corazon/9.png", "images/corazon/A.png",
    "images/corazon/J.png", "images/corazon/K.png", "images/corazon/Q.png", "images/diamante/10.png", "images/diamante/2.png",
    "images/diamante/3.png", "images/diamante/4.png", "images/diamante/5.png", "images/diamante/6.png", "images/diamante/7.png",
    "images/diamante/8.png", "images/diamante/9.png", "images/diamante/A.png", "images/diamante/J.png", "images/diamante/K.png",
    "images/diamante/Q.png", "images/pica/10.png", "images/pica/2.png", "images/pica/3.png", "images/pica/4.png", "images/pica/5.png",
    "images/pica/6.png", "images/pica/7.png", "images/pica/8.png", "images/pica/9.png", "images/pica/A.png", "images/pica/J.png",
    "images/pica/K.png", "images/pica/Q.png", "images/trebol/10.png", "images/trebol/2.png", "images/trebol/3.png", "images/trebol/4.png",
    "images/trebol/5.png", "images/trebol/6.png", "images/trebol/7.png", "images/trebol/8.png", "images/trebol/9.png", "images/trebol/A.png",
    "images/trebol/J.png", "images/trebol/K.png", "images/trebol/Q.png"
];

$('body').on('click', '.img-ficha', function () {
    let img = $(this).find('img');
    if ($(this).find('img').hasClass('selected-ficha')) {
        img.removeClass('selected-ficha');
        UnSelectedCoin();
    } else {
        $('.img-ficha').find('img').removeClass('selected-ficha');
        img.addClass('selected-ficha');
        currentCoin = parseInt(img.attr('coin'));
    }
});

function apostar(){
    let currentMoney = parseFloat($('#money').html().replace(',', ''));

    if(apostado + currentCoin > currentMoney){
        Swal.fire({
            position: "top-end",
            icon: "error",
            title: "Dinero insuficiente",
            showConfirmButton: false,
            timer: 1500,
            toast: true,
            timerProgressBar: true,
        })
        return;
    }

    apostado += currentCoin;
    $('#lblApostado').html(apostado);
}

async function start_game() {

    if(jugadas > 4){
        Swal.fire({
            position: "top-end",
            icon: "error",
            title: "Se ha realizado la cantidad máxima de juegos permitidos",
            showConfirmButton: false,
            timer: 1500,
            toast: true,
            timerProgressBar: true,
        })
        return;
    }

    if(apostado == 0){
        Swal.fire({
            position: "top-end",
            icon: "error",
            title: "Debes colocar una apuesta inicial",
            showConfirmButton: false,
            timer: 1500,
            toast: true,
            timerProgressBar: true,
        })
        return;
    }

    barajar(cartas);
    cartasHome = [];
    scoreHome = 0;
    lstCards = lstCardsPlayer;
    currentlst = '.cartas-tomadas';
    player = SumarPuntajePlayer;

    $('#btnPlay').addClass('d-none');
    $('.winner').addClass('d-none');
    $('.cartas-home img').replaceWith('');
    $('.cartas-tomadas img').replaceWith('');
    $('#scorePlayer, #scoreHome').html('0');

    await move();
    await move();

    player = SumarPuntajeHome;
    lstCards = lstCardsHome;
    currentlst = '.cartas-home';

    await move();
    await move();

    player = SumarPuntajePlayer;
    lstCards = lstCardsPlayer;
    currentlst = '.cartas-tomadas';

    $('.btn-playing').removeClass('d-none');
    if(parseInt($('#scorePlayer').html()) == 21){
        puntaje_home();
    }

}

async function finalizar() {
    
    let continuar = true;
    let nuevoValor = 0;
    let lstItems = parseInt($(currentlst + ' img').length);

    lstCards = lstCardsHome;
    currentlst = '.cartas-home';
    player = SumarPuntajeHome;

    $('.btn-playing').addClass('d-none');

    while (continuar) {
        nuevoValor = getCardNumber(lstItems, false, false);
        nuevoValor = puntajeHome(nuevoValor);
        continuar = scoreHome + nuevoValor < 22;

        if (continuar) {
            await move();
        }
    }

    puntaje_home();
}

async function puntaje_home() {
    $('.btn-playing').addClass('d-none');

    for (let i = 0; i < cartasHome.length; i++) {
        await new Promise((resolve) => {
            setTimeout(async () => {
                $(currentlst + ' img:eq(' + i + ')').attr('src', cartasHome[i]);
                return resolve();
            }, 400);
        });
    }
    set_score(scoreHome, false);
    let scorePlayer = parseInt($('#scorePlayer').html());
    let ganancia = scorePlayer > 21 || scorePlayer <= scoreHome ? 0 : apostado * 2;

    let currentMoney = parseFloat($('#money').html().replace(',', ''));

    if(ganancia == 0){
        currentMoney -= apostado;
    }else{
        currentMoney += ganancia;
    }

    $('#money').html(currentMoney);
    $('#moneyMade').html(ganancia);

    $('#btnPlay, #btnApostar, .winner').removeClass('d-none');

    guardar_jugada(ganancia);
    $('#lblApostado').html('0.00');
    
    apostado = 0;
}

function move() {
    $('.hiddenCard').css({
        position: 'absolute',
        left: coordenadas.left + 'px',
        top: coordenadas.top + 'px'
    })

    $('.hiddenCard').removeClass('d-none');
    let lstItems = parseInt($(currentlst + ' img').length);
    let altura = (lstItems * 35);
    altura = (altura > 300 ? 360 : altura);

    $('.hiddenCard').animate({
        left: lstCards.left + 'px',
        top: lstCards.top + altura + 'px'
    }, 1000);

    return new Promise((resolve) => {
        setTimeout(async () => {
            resolve(await player(lstItems));
        }, 1050);
    });
}

function getCardNumber(lstItems, playerGame = true, take = true) {

    let cartaAsignada = cartas[cartasTomadas];

    if (playerGame) {
        $('.hiddenCard').attr('src', cartaAsignada);
    } else if (take) {
        cartasHome.push(cartaAsignada);
    }

    if (take) {
        $(currentlst).append($('.hiddenCard').clone());
        $('.hiddenCard').addClass('d-none');

        let subitem = $(currentlst + ' img:eq(' + lstItems + ')');

        subitem.removeClass('hiddenCard');

        subitem.css({
            left: 0 + 'px',
            top: (lstItems * 35) + 'px'
        })

        $(currentlst + ' img').removeClass('d-none');
        $('.hiddenCard').attr('src', 'images/poker.jpg');
    }

    cartaAsignada = cartaAsignada.replace('.png', '').split('/');
    return cartaAsignada[cartaAsignada.length - 1];
}

function SumarPuntajeHome(lstItems) {
    let cartaAsignada = getCardNumber(lstItems, false);
    scoreHome += puntajeHome(cartaAsignada);
    cartasTomadas++;
}

function puntajeHome(cartaAsignada) {

    if (['1', '2', '3', '4', '5', '6', '7', '8', '9', '10'].includes(cartaAsignada)) {
        return parseInt(cartaAsignada);
    }

    if (cartaAsignada == 'A') {
        if (scoreHome + 11 < 22) {
            return 11;
        }
        return 1;
    }

    return 10;
}

async function SumarPuntajePlayer(lstItems) {
    let score = 0;
    let cartaAsignada = getCardNumber(lstItems, true);

    if (['1', '2', '3', '4', '5', '6', '7', '8', '9', '10'].includes(cartaAsignada)) {
        score = parseInt(cartaAsignada);
    } else {
        if (cartaAsignada == 'A') {

            score = await Swal.fire({
                title: "¿Tomarás la carta 'A' como 1 o como 11?",
                showCancelButton: true,
                confirmButtonText: "Como 1",
                allowOutsideClick: false,
                allowEscapeKey: false,
                confirmButtonColor: '#064cce',
                cancelButtonColor: '#06ce06',
                cancelButtonText: `Como 11`
            }).then((result) => {
                return new Promise((resolve) => {
                    resolve(result.isConfirmed ? 1 : 11)
                });
            });
        } else {
            score = 10;
        }
    }

    score = set_score(score);
    cartasTomadas++;
    
    if (score >= 21) {
        currentlst = '.cartas-home';
        puntaje_home();
    }
}

function set_score(score, playerScore = true) {

    let selector = $('#' + (playerScore ? 'scorePlayer' : 'scoreHome'));
    score += parseInt(selector.html());
    selector.html(score);
    return score;
}

function barajar(array) {
    array.sort(() => Math.random() - 0.5);
}