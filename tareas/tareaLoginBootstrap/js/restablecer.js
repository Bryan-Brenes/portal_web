const correoRestablecer = document.getElementById('correoRestablecer');
const restablecerBtn = document.getElementById('restablecerBtn');
const correoErrorMsj = document.getElementById('correoError');

correoRestablecer.removeAttribute('required');

function validarCorreo() {
  var correo = correoRestablecer.value;
  if (correo === "") {
    correoErrorMsj.style.transform = "scaleY(1)";
    console.log('campo vacío');
    return;
  }
  var re = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  if (!re.test(correo)) {
    correoErrorMsj.style.transform = "scaleY(1)";
    console.log('correo incorrecto');
    return;
  }

  console.log('correo correcto!');

}

correoRestablecer.addEventListener('keyup', () => {
  correoErrorMsj.style.transform = "scaleY(0)";
})

