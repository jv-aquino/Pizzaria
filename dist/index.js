const login = document.querySelector('#login');
const form = document.querySelector('.form-container');
const cancelButton = document.querySelector('#cancel');

const email = document.querySelector('#email');
const senha = document.querySelector('#senha');

let inputs = document.querySelectorAll(".form-container input");
console.log(inputs);

login.addEventListener('click', showForm);
cancelButton.addEventListener('click', cancelForm);

function showForm() {
  form.classList.add('visible');
}
function cancelForm() {
  form.classList.remove('visible');

  clearInputs();

  inputs.forEach(input => {
    unsetValidity(input)
  });
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