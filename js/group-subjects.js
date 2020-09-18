const groups = document.querySelector('.sort-subjects__group');
const all = document.querySelector('.sort-subjects__all');

new Sortable(groups, {
    group: 'subjects', // set both lists to same group
    animation: 150
});

new Sortable(all, {
    group: 'subjects',
    animation: 150
});