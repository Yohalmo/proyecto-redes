const $btnSignIn = document.querySelector('.sign-in-btn'),
    $btnSignUp = document.querySelector('.sign-up-btn'),
    $signUp = document.querySelector('.sign-up'),
    $signIn = document.querySelector('.sign-in');

document.addEventListener('click', e => {
    if (e.target === $btnSignIn || e.target === $btnSignUp) {
        $signIn.classList.toggle('active');
        $signUp.classList.toggle('active')
    }
});


function login() {

    $('#loadSesion').removeClass('d-none');
    $('#btnSession').addClass('d-none');

    $.post("login-usuario",
        {
            email: $('#email').val(),
            password: $('#password').val()
        },
        function (data) {
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: data.message,
                showConfirmButton: false,
                timer: 1500,
                toast: true,
                timerProgressBar: true,
            });

            setTimeout(() => {
                location.replace('pagina-principal');
            }, 2000);
        }).fail(function (response) {
            Swal.fire({
                position: "top-end",
                icon: "error",
                title: response.responseJSON.message,
                showConfirmButton: false,
                timer: 1500,
                toast: true,
                timerProgressBar: true,
            });
            $('#loadSesion').addClass('d-none');
            $('#btnSession').removeClass('d-none');     
        });
}

function registrarse(){
    var Form = new FormData($('#FormRegistro')[0]);
    
    $('#btnRegistro').addClass('d-none');
    $('#loadRegistro').removeClass('d-none');

    $.ajax({
        url: 'registro-de-usuario',
        data: Form,
        processData: false,
        contentType: false,
        type: 'POST',
        success: function(data){
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: data.message,
                showConfirmButton: false,
                timer: 1500,
                toast: true,
                timerProgressBar: true,
            });
            
            $('#loadRegistro').addClass('d-none');
            $('#btnRegistro').removeClass('d-none');
        }, error: function(error){
            Swal.fire({
                position: "top-end",
                icon: "error",
                title: error.responseJSON.message,
                showConfirmButton: false,
                timer: 1500,
                toast: true,
                timerProgressBar: true,
            });
            
            $('#loadRegistro').addClass('d-none');
            $('#btnRegistro').removeClass('d-none');
        }
    });
}
