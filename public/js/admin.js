document.querySelector('#wrongInputs').addEventListener('click', (event) => {
    if (event.target.closest('#closeMessage')) {
        event.target.closest('#wrongMessage').classList.add('hidden');
    }
});
