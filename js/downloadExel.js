const downloadButton = document.querySelector('.create-teacher-file');

downloadButton.addEventListener('click', (e) => {
    e.preventDefault();

    async function getURLdownload()
    {
        const response = await fetch('./../../../php/createExelFile.php');
        const content = await response.json(e);
        location.href = `./../${content}`;
    };
    getURLdownload();
});