let profiles = [];
async function getProfiles () {
    await fetch('./../../php/fetchProfiles.php')
    .then(res => res.json())
    .then((jsoned) => {
        profiles = [...jsoned]
    })
    console.log(profiles);
}

getProfiles();

let htmlSubjectProfile = `<div class="subjectProfile">

<label for="">Выберите профиль преподавателя</label>

<select name="teacherProfile[]" class="add_input">
    <option></option>         
</select>

</div>`;

document.getElementById('addProfile').addEventListener('click', addOneMore);

function renderHTML (position = '', where = 'beforebegin', html = ``) {
    document.getElementById(position).insertAdjacentHTML(where, html);
}

function addOneMore (event) {
    event.preventDefault();
    let whatToAdd = event.target.parentElement.id;
    switch (whatToAdd) {
        case 'addProfile':
            renderHTML('addProfile', 'beforebegin', htmlSubjectProfile);

            let selects = document.querySelectorAll('select[name="teacherProfile[]"]');
            profiles.forEach( (profile, index, array)=> {
                selects[selects.length - 1].insertAdjacentHTML('beforeend', `
                    <option value="${profile[0]}"> ${profile[1]} </option>
                `)
            })
            
            break;
    
        default:
            break;
    }
}