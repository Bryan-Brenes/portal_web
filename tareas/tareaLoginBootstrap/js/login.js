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
