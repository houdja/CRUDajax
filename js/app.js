const showForm = document.querySelector('.show__add__form');
const addUserForm = document.querySelector('.div__form');
const table = document.querySelector('.table');
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
    <div class="cell edit">Edit</div>
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