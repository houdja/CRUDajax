const showForm = document.querySelector('.show__add__form');
const addUserForm = document.querySelector('.div__form');

showForm.addEventListener('click', function(){
    addUserForm.classList.toggle('active')
})