const wrapperList = document.querySelector('.sort-subjects__all');
const fullElements = document.querySelectorAll('.sort-subjects__all > .subject-name');
const searchInput = document.querySelector('.search-subjects-group');

searchInput.addEventListener('input', (e) =>
{
    sortedElements = [];

    if (searchInput.value != '') 
    {
        fullElements.forEach((elem) => 
        {
            string = elem.textContent.toLowerCase();
            re = searchInput.value.toLowerCase();

            if (string.indexOf(re) != -1) 
            {
                sortedElements.push(elem);
            }
        });
        renderList(sortedElements);
    }
    else
    {
        renderList(fullElements);
    }
});

function renderList(list)
{
    wrapperList.innerHTML = "";
    list.forEach(function(data) 
    {
        insertable = `<p class="subject-name" data-subjectId="${data.dataset.subjectid}"> ${data.innerHTML} </p>`;

        wrapperList.innerHTML += insertable;
    });
}