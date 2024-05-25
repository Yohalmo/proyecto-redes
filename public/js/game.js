let orbitarElement = document.getElementById('orbitar');
let angle;
let containerWidth;
let containerHeight;
let speed;
let continuar;
let time;
let seleccionados;
let currentCoin = 0;
let apostado = 0;
let labelsWin = { 'menor' : 'Bajos', 'mayor' : 'Altos', 'par': 'Pares', 'impar' : 'Impares', 'cero' : 'Cero' };
let coinslist = [100, 50, 20, 10, 5, 1];
let useCoin;
let moverFicha = false;
const ficha = document.getElementById('fichaMove');
var audio;
let dinero = 0;

//cambiar color de fondo cuando el mouse pasa sobre una ficha
$('body').on('mouseenter mouseleave', '.row-items td.unselected', function() {
    let metodo = (event.type === 'mouseover') ? 'addClass' : 'removeClass';
    $(this)[metodo]('hover');
});

$('body').on('mouseover mouseleave', '.color-selected', function() {
    let metodo = (event.type === 'mouseover') ? 'addClass' : 'removeClass';
    let clase = '.row-items td.unselected.bg-' + ($(this).hasClass('bg-red') ? 'red' : 'black');
    $(clase)[metodo]('hover');
});

$('body').on('mouseover mouseleave', '.row-selected', function() {
    let metodo = (event.type === 'mouseover') ? 'addClass' : 'removeClass';
    $(this).closest('tr').find('td.bg-black.unselected, td.bg-red.unselected')[metodo]('hover');
});

$('body').on('mouseover mouseleave', '.rango, .grupos, .number-type', function() {
    let metodo = (event.type === 'mouseover') ? 'addClass' : 'removeClass';
    $('td.unselected.' + $(this).attr('classItem'))[metodo]('hover');
});

//colocar fichas al dar click en un numero
$('body').on('click', '.color-selected', function() {
    let clase = '.row-items td.unselected.bg-' + ($(this).hasClass('bg-red') ? 'red' : 'black');
    SumarFichas(this, clase);
});

$('body').on('click', '.row-selected', function() {
    SumarFichas(this, $(this).closest('tr').find('td.bg-black.unselected, td.bg-red.unselected'));
});

$('body').on('click', '.rango, .grupos, .number-type', function() {
    SumarFichas(this, 'td.unselected.' + $(this).attr('classItem'));
});

$('body').on('click', '.row-items td.ficha-item', function() {
    SumarFichas(this, this);
});

$('body').on('click', '.img-ficha', function(){
    let img =  $(this).find('img');
    if($(this).find('img').hasClass('selected-ficha')){
        img.removeClass('selected-ficha');
        UnSelectedCoin();
    }else{
        $('.img-ficha').find('img').removeClass('selected-ficha');
        img.addClass('selected-ficha');
        currentCoin = parseInt(img.attr('coin'));
        moverFicha = true;

        //colocar que la ficha se mueva con el mouse
        let coordenadas = $(this).offset();    
        ficha.style.left = `${coordenadas.left}px`;
        ficha.style.top = `${coordenadas.top + 20}px`;

        $('#fichaMove').attr('src', `images/ficha${currentCoin}.png`)
        $('#fichaMove').removeClass('d-none');
    }
});

function set_money(money){
    dinero = money;
}

function UnSelectedCoin(){
    $('.img-ficha').find('img').removeClass('selected-ficha');
    currentCoin = 0;
    moverFicha = false;
    $('#fichaMove').addClass('d-none');
}

function SumarFichas(item, classAffected) {
    if(currentCoin == 0 || (apostado + currentCoin) > dinero){ return; }

    let quantity = currentCoin;

    if ($(item).find('.coin-item').length > 0) {
        quantity = parseInt($(item).find('.quantity').html()) + currentCoin;
        let selectedCoin = '100';

        for (var i = 0; i < coinslist.length; i++) {
            if (quantity < coinslist[i] && quantity >= coinslist[i + 1]) {
                selectedCoin = coinslist[i + 1];
                break;
            }
        }

        $(item).find('img').attr('src', `images/ficha${selectedCoin}-empty.png`);
    } else {
        $(classAffected).removeClass('unselected');
        $('#icon-item-hidden img').attr('src', `images/ficha${currentCoin}-empty.png`);
        $(item).find('.divficha').html($('#icon-item-hidden').html());
    }

    apostado += parseInt(currentCoin);
    $('#lblApostado').html(apostado);
    $(item).find('.quantity').html(quantity);
}

function StartGame() {
    UnSelectedCoin();
    seleccionados = [];

    $('#contentResult').addClass('d-none');
    $('#contenedor-ruleta').removeClass('d-none');
    $('td.hover .circle-number strong.numero').each(function(){
        seleccionados.push($(this).html());
        $('.numeroItem' + $(this).html()).removeClass('ruletaNumber')
    });

    $('.wheel .ruletaNumber').css('--opacity', 0.5);

    setTimeout(() => {
        audio = new Audio("sounds/sound.mp3");
        audio.play();
    }, 1000);

    setTimeout(() => {

        $('.ruleta').addClass('rotar-ruleta');
        var ruletaNumbersElement = document.querySelector('.ruleta-numbers');
        continuar = true;
        speed = 0.2;

        angle = 0;
        containerWidth = ruletaNumbersElement.offsetWidth - 15;
        containerHeight = ruletaNumbersElement.offsetHeight - 15;
        time = Math.floor(Math.random() * 15) + 1;

        var intervalID = setInterval(SetSpeed, time * 1000);
        
        
        setTimeout(() => {
            speed = 0;
            clearInterval(intervalID);
            continuar = false;
            getGanador();

            audio.pause();
            setTimeout(() => {
                $('.ruleta').removeClass('rotar-ruleta');
            }, 1000);

            setTimeout(GameEnded, 4000);
        }, time * 1000);

        animateOrbitar();
    }, 2000);
}

function GameEnded(){
    $('td.bg-black, td.bg-red').removeClass('hover');
    $('td.bg-black, td.bg-red').addClass('unselected');
    $('.wheel .ruletaNumber').css('--opacity', 1);

    $('td .divficha').html('');
    $('#contenedor-ruleta').addClass('d-none'); 
    $('#message').html('Sin premio');
}

function getGanador() {
    var ballElement = $('.ball');

    var ballRect = ballElement[0].getBoundingClientRect();
    var ballCenterX = ballRect.left + ballRect.width / 2;
    var ballCenterY = ballRect.top + ballRect.height / 2;

    var elementsAtBall = document.elementsFromPoint(ballCenterX, ballCenterY);
    var listElementsAtBall = $(elementsAtBall).filter('.number');

    let idNumber = $(listElementsAtBall.first()).attr('id');
    let winner = parseInt(idNumber.replace('ruletaNumber', '')) + 1;
    winner = winner == 37 ? 0 : winner;

    let numeroGanador = $('#ruletaNumber' + winner).find('strong').html();
    $('#result').html(numeroGanador);
    
    let labels = $(`#contenedor${numeroGanador}`).closest('td').attr('class').split(' ');
    $('#DataSelected').html('');

    labels.forEach(clase => {
        if (clase in labelsWin){
            $('#DataSelected').append(`<span>${ labelsWin[clase] }</span>`);
        }
    });

    if(seleccionados.includes(numeroGanador)){
        $('#message').html('Ha ganado<br>' + (apostado * (37 - seleccionados.length)));
    }
    $('#contentResult').removeClass('d-none');
    apostado = 0;
}

function SetSpeed() {
    speed -= 0.05;
    if (speed < 0.01) {
        speed = 0;
        clearInterval(intervalID);
        continuar = false;
    }
}

function animateOrbitar() {
    var x = ((containerWidth) / 2) + (containerWidth / 2.6) * Math.cos(angle);
    var y = ((containerHeight) / 2) + (containerHeight / 2.6) * Math.sin(angle);

    orbitarElement.style.left = x + 'px';
    orbitarElement.style.top = y + 'px';

    angle += speed;

    if (continuar) {
        requestAnimationFrame(animateOrbitar);
    }
}

function mouseMove(e){
    if(!moverFicha) return;
    ficha.style.left = `${e.clientX}px`;
    ficha.style.top = `${e.clientY + 10}px`;
}

function adjustContainer() {
    var elemento = $('.body');
    var anchoPantalla = parseFloat(document.documentElement.clientWidth);
    
    if(anchoPantalla > 810){
        elemento.css('left', '');
        elemento.css('top', '');
        elemento.css('width', '');
    }else{
        elemento.offset({
            top: 0,
            right: 0
        })
    }   
}

adjustContainer();

window.addEventListener('resize', adjustContainer);
window.addEventListener('orientationchange', adjustContainer);
document.addEventListener('mousemove', mouseMove);