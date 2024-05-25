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
            alert(data.message);
        }).fail(function (response) {
            alert(response.responseJSON.message);
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
