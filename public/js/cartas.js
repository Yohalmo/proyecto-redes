
$('body').on('click', '.img-ficha', function(){
    let img =  $(this).find('img');
    if($(this).find('img').hasClass('selected-ficha')){
        img.removeClass('selected-ficha');
    }else{
        $('.img-ficha').find('img').removeClass('selected-ficha');
        img.addClass('selected-ficha');
    }
});