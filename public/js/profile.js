const SELECTED_CLASS = 'selected';
let currentActiveId = 'applicationsList';

function changeSelect(target, changeId) {
    document.querySelector(`.${SELECTED_CLASS}`).classList.remove(SELECTED_CLASS);
    target.classList.add(SELECTED_CLASS);
    document.querySelector(`#${currentActiveId}`).hidden = true;
    document.querySelector(`#${changeId}`).hidden = false;
    currentActiveId = changeId;
}

document.querySelector('#applicationsListButton').addEventListener('click', (event) => changeSelect(event.currentTarget, 'applicationsList'));
document.querySelector('#createApplicationButton').addEventListener('click', (event) => changeSelect(event.currentTarget, 'createApplication'));

document.querySelector('#applicationsList').addEventListener('click', (event) => {
    if (event.target.closest('#deleteButton')) {
        document.querySelector('#deleteModal').classList.remove('hidden');
        document.querySelector('#deleteId').value = event.target.closest('#application').dataset.id;
    }
});
document.querySelector('#cancelButton').addEventListener('click', (event) => document.querySelector('#deleteModal').classList.add('hidden'));
document.querySelector('#closeModal').addEventListener('click', (event) => document.querySelector('#deleteModal').classList.add('hidden'));

document.querySelector('#wrongInputs').addEventListener('click', (event) => {
    if (event.target.closest('#closeMessage')) {
        event.target.closest('#wrongMessage').classList.add('hidden');
    }
});
