const showForm = document.querySelector('.show__add__form');
const addUserForm = document.querySelector('.div__form');
const table = document.querySelector('.table .user_info');
const form = document.querySelector('.add__user__form');

showForm.addEventListener('click', function(){
    addUserForm.classList.toggle('active')
})

function createRow(j){
    let row = document.createElement('div')
    row.classList.add('row')
    row.innerHTML = `
    <div class="cell id">#${j.id}</div>
    <div class="cell">${j.first_name}</div>
    <div class="cell">${j.last_name}</div>
    <div class="cell">${j.email}</div>
    <div class="cell edit"><a href='edit__user.php?userId=${j.id}'>Edit</a></div>
    <div class="cell delete">Delete</div>
    `;

    table.appendChild(row)
}

function getUser(){
    fetch('php/getUser.php')
        .then(response => {
            try{
                if(response.ok){
                    return response.json();
                }
            }catch(e){
                console.log(e);
            }
        })
        .then(data => {
            if(data.length != 0){
                data.forEach(d => {
                    createRow(d)
                });
            }else{
                let p = document.createElement('p')
                p.style.padding = '10px 0';
                p.innerHTML = 'Aucun résultat';
                table.appendChild(p)
            }
        })
}

window.addEventListener('DOMContentLoaded', function(){
    getUser();
})

//SOUMISSION DU FORMULAIRE

function addUser(e){
    e.preventDefault();
    let data = new FormData(this)
    fetch('php/addUser.php', {
        method: 'POST',
        body: data
    })
    .then(response => {
        if(response.ok){
            return response.json();
        }
    })
    .then(data => {
        if(data.success != null){
            alert(data.success)
            form.querySelectorAll('input').forEach(input => {
                input.value = '';
            })
            addUserForm.classList.remove('active')
            table.innerHTML = '';
            getUser();
        }else{
            alert(data.error)
        }

    })
}

form.addEventListener('submit', addUser);

