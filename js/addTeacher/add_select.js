const htmlSubjectProfile = `
<div class="subjectProfile">

    <label for="">Выберите профиль преподавателя</label>

    <select name="teacherProfile[]" class="add_input">
        <option></option>         
    </select>

</div>`;

let profiles = [];
async function getProfiles () {
    await fetch('./../../php/fetchProfiles.php')
    .then(res => res.json())
    .then((jsoned) => {
        profiles = [...jsoned]
    })
}
getProfiles();

function addTeacherProfileHTML(fetchedProfiles) {
    document.getElementById('addProfile').insertAdjacentHTML('beforebegin', htmlSubjectProfile);

    let selects = document.querySelectorAll('select[name="teacherProfile[]"]');

    fetchedProfiles.forEach( (profile, index, array)=> {
        selects[selects.length - 1].insertAdjacentHTML('beforeend', `
            <option value="${profile[0]}"> ${profile[1]} </option>
        `)
    })
}

function addOneMore (event) {
    event.preventDefault();
    let whatToAdd = event.target.parentElement.id;
    switch (whatToAdd) {
        case 'addProfile':
            addTeacherProfileHTML(profiles);
            break;
    
        default:
            break;
    }
}

document.getElementById('addProfile').addEventListener('click', addOneMore);