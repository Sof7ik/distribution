const urlParams = new URLSearchParams(window.location.search);

const groups = document.querySelector('.sort-subjects__group');
const all = document.querySelector('.sort-subjects__all');
const updateButton = document.querySelector('.update-subjects-group');
const clearButton = document.querySelector('.clear-subjects-group');

new Sortable(groups, {
    filter: '.not-draggable',
    group: 'subjects',
    animation: 150,
    
    onEnd: checkCollums
});

new Sortable(all, {
    filter: '.not-draggable',
    group: 'subjects',
    animation: 150,

    onEnd: checkCollums
});

function checkCollums()
{
    if (document.querySelectorAll('.sort-subjects__group > .subject-name').length > 0)
    {
        document.querySelector('.update-subjects-group').classList.remove('disabled');
        document.querySelector('.clear-subjects-group').classList.remove('disabled');
    }
    else
    {
        document.querySelector('.update-subjects-group').classList.add('disabled');
        document.querySelector('.clear-subjects-group').classList.add('disabled');
    }
}
checkCollums();

clearButton.addEventListener('click', (e) =>
{
    if (e.target.classList.contains('disabled'))
        e.preventDefault();
});

updateButton.addEventListener('click', () =>
{
    if (!updateButton.classList.contains('disabled'))
    {
        let subjects = [];
        document.querySelectorAll('.sort-subjects__group > p').forEach(s => subjects.push(s.dataset.subjectid));
    
        let data = new FormData();
        data.append("id", urlParams.get('id'));
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
    }
})