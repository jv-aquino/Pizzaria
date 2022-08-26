const login = document.querySelector('#login');
const form = document.querySelector('.form-container');
const cancelButton = document.querySelector('#cancel-form');

const email = document.querySelector('#email');
const senha = document.querySelector('#senha');

let inputs = document.querySelectorAll(".form-container input");

if (!logged) {
  login.addEventListener('click', showForm);
}

cancelButton.addEventListener('click', cancelForm);

const logoutForm = document.querySelector('.logout-container');
const cancelLogout = document.querySelector('#cancel-logout');
const confirmLogout = document.querySelector('#logout');

if (logged) {
  const logoutButton = document.querySelector("#logoutShow");
  logoutButton.addEventListener("click", showForm);
}
cancelLogout.addEventListener('click', cancelForm);

function showForm(e) {
  if (e.target.id == 'login') {
    form.classList.add('visible');
  }
  else {
    logoutForm.classList.add('visible');
  }
}
function cancelForm(e) {
  if (e.target.id == 'cancel-form') {
    form.classList.remove('visible');

    clearInputs();

    inputs.forEach(input => {
      unsetValidity(input)
    });
  }
  else {
    logoutForm.classList.remove('visible');
  }
}
function clearInputs() {
  senha.value = email.value = '';
}

inputs.forEach(input => {
  input.addEventListener('click', setValidity);
  input.addEventListener('mouseover', setValidity);
  input.addEventListener('focus', setValidity);
});

function setValidity() {
  this.classList.add('validCheck');
}
function unsetValidity(input) {
  input.classList.remove('validCheck');
}