const SELECTED_CLASS = "selected-button";

document.querySelector('#loginButton').addEventListener('click', (event) => {
    document.querySelector('#loginButton').classList.add(SELECTED_CLASS);
    document.querySelector('#registerButton').classList.remove(SELECTED_CLASS);
    document.querySelector('#loginForm').hidden = false;
    document.querySelector('#registerForm').hidden = true;
});

document.querySelector('#registerButton').addEventListener('click', (event) => {
    document.querySelector('#loginButton').classList.remove(SELECTED_CLASS);
    document.querySelector('#registerButton').classList.add(SELECTED_CLASS);
    document.querySelector('#loginForm').hidden = true;
    document.querySelector('#registerForm').hidden = false;
});

document.querySelector('#wrongInputs').addEventListener('click', (event) => {
    if (event.target.closest('#closeMessage')) {
        event.target.closest('#wrongMessage').classList.add('hidden');
    }
});
