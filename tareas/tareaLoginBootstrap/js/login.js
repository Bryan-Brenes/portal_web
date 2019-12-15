const fomularios = document.getElementsByClassName('formularios')[0];
const btnLogin = document.getElementById('btn-login');
const btnRegistro = document.getElementById('btn-registro');
const panelIzq = document.getElementById('panel-izq');
const panelDer = document.getElementById('panel-der');

btnLogin.addEventListener('click', () => {
  fomularios.classList.remove('active');
  panelIzq.style.width = '50%';
  panelDer.style.width = '50%';
  panelDer.style.borderBottomLeftRadius = '0px';
  panelDer.style.borderTopLeftRadius = '0px';
});
btnRegistro.addEventListener('click', () => {
  fomularios.classList.add('active')
  panelIzq.style.width = '0%';
  panelDer.style.width = '100%';
  panelDer.style.borderBottomLeftRadius = '35px';
  panelDer.style.borderTopLeftRadius = '35px';
});

// validación de la parte de login------------------------
const emailInput = document.getElementById('email-login');
const passwordInput = document.getElementById('password-login');
const ingresarBtn = document.getElementById('ingresarBtn-login');

const correoErrorMsj = document.getElementById('correoError');

emailInput.addEventListener('keyup', () => {
  correoErrorMsj.style.transform = "scaleY(0)";
})


function validarLogin(ev) {
  if (!validarCorreo(emailInput.value, correoErrorMsj) || (!validarContrasenia(passwordInput.value, correoErrorMsj))) {
    ev.preventDefault();
  }
}
// fin validación de la parte de login--------------------

// validación de campos de registro ----------------------

const camposRegistro = document.getElementsByClassName('inputRegistro');
const telefono = document.getElementById('telefono');

for (let i = 0; i < camposRegistro.length; i++) {
  const campo = camposRegistro[i];
  campo.addEventListener('change', () => campo.style.borderColor = 'white');
  campo.addEventListener('keyup', () => campo.style.borderColor = 'white');
}

function validarCamposRegistro(ev) {

  var correcto = true;
  for (let i = 0; i < camposRegistro.length; i++) {
    const campo = camposRegistro[i];
    console.log(campo.value);
    if (campo.value === '') {
      campo.style.borderColor = "red";
      correcto = false;
    }
  }

  var re = (/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/);
  if (!re.test(contraseniaRegistro.value)) {
    contraseniaRegistro.style.borderColor = "red";
    passwordErrorMsj.style.transform = "scaleY(1)"
    correcto = false;
  }

  if (!correcto) {
    ev.preventDefault();
  }

}

// fin de validación de campos de registro ---------------

function validarCorreo(correo, elemento) {
  //var correo = correoRestablecer.value;
  if (correo === "") {
    elemento.style.transform = "scaleY(1)";
    console.log('campo vacío');
    return false;
  }
  var re = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  if (!re.test(correo)) {
    elemento.style.transform = "scaleY(1)";
    console.log('correo incorrecto');
    return false;
  }

  console.log('correo correcto!');
  return true;
}

const passwordErrorMsj = document.getElementById('passwordError');
const contraseniaRegistro = document.getElementById('contraseniaRegistro');

contraseniaRegistro.addEventListener('keyup', () => {
  passwordErrorMsj.style.transform = "scaleY(0)";
})

function validarContrasenia(pass, elemento) {
  //var correo = correoRestablecer.value;
  if (pass === "") {
    elemento.style.transform = "scaleY(1)";
    console.log('password vacío');
    return false;
  }

  console.log('pass lleno!');
  return true;
}