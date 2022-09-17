//MODIFICATION D'UN UTILISATEUR

const editForm = document.querySelector('.edit__form');

function updateUserInfo(e){
    e.preventDefault();
    let data = new FormData(this);
    fetch('php/update_userInfo.php', {
        method: 'POST',
        body: data
    })
    .then(response => {
        if(response.ok){
            return response.json();
        }
    })
    .then(data => {
        if(data != ''){
            alert(data.success)
        }else{
            alert(data.error)
        }
    })
}

editForm.addEventListener('submit', updateUserInfo);