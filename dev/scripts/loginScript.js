export function login () {
    let loginElem = document.getElementById('login-email');
    let passElem = document.getElementById('login-pass');
    let login, password;

    if (loginElem.value.trim() !== '' && passElem.value.trim() !== '') {
        login = loginElem.value;
        password = passElem.value;
    } else {
        throw new Error('Логин или пароль пустые');
    }
    
    let formData = new FormData();
    formData.append('login', login);
    formData.append('password', password);

    fetch('./../dev/scripts/php/login.php', {
        method: "POST",
        body: formData
    })
    .then(res => res.json())
    .then(jsoned => {
        console.log(jsoned)
        document.cookie = `user = ${JSON.stringify(jsoned)}; path=/; expires = ${new Date().getHours() + 240}`;
        window.location.href = './dist/lk/lk.php';
    })
}