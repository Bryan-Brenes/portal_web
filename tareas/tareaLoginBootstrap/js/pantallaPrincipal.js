const menuUsuario = document.getElementById('menuUsuario');
const menuBtn = document.getElementById('nombreUsuario');

const ventanaModalCambioContrasenia = document.getElementById('cambioContrasenia');
const inputsCambioContrasenia = document.querySelectorAll("#cambioContrasenia input");

inputsCambioContrasenia[0].addEventListener('keyup', () => {
  $('#contraseniaActualError').collapse('hide');
})

inputsCambioContrasenia[1].addEventListener('keyup', () => {
  $('#contraseniaNuevaError').collapse('hide');
})

menuBtn.addEventListener('click', () => menuUsuario.classList.toggle('active'));

function cambiarContrasenia() {
  var correcto = true;
  var re = (/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/);

  if (inputsCambioContrasenia[0].value === '') {
    $('#contraseniaActualError').collapse('show');
    correcto = false;
  }

  if (!re.test(inputsCambioContrasenia[1].value)) {
    $('#contraseniaNuevaError').collapse('show');
    correcto = false;
  }

  if (correcto) {
    console.log('contraseña cambiada');
  }
}