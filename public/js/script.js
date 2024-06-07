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
            }, 2800);
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
        });
}

function registrarse(){
    var Form = new FormData($('#FormRegistro')[0]);

    $.ajax({
        url: 'registro-de-usuario',
        data: Form,
        processData: false,
        contentType: false,
        type: 'POST',
        success: function(data){
          alert(data.message);
        }, error: function(error){
            alert(error.responseJSON.message);
        }
    });
}
