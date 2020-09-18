const urlParams = new URLSearchParams(window.location.search);

const groups = document.querySelector('.sort-subjects__group');
const all = document.querySelector('.sort-subjects__all');
const updateButton = document.querySelector('.update-subjects-group');

new Sortable(groups, {
    group: 'subjects', // set both lists to same group
    animation: 150
});

new Sortable(all, {
    group: 'subjects',
    animation: 150
});

updateButton.addEventListener('click', () =>
{
    let subjects = [];
    document.querySelectorAll('.sort-subjects__group > p').forEach(s => subjects.push(s.dataset.subjectid));

    let data = new FormData();
    data.append("id", +urlParams.get('id'));
    data.append("subjects", JSON.stringify(subjects));

    async function sendGroupSubjectData()
    {
        const response = await fetch('./../../../php/update_group_subjects.php', {
            method: 'POST',
            body: data,
        });
        const content = await response.json();
        return content;
    };

    sendGroupSubjectData().then(message => (message == 'done') ? location.reload() : null );
})