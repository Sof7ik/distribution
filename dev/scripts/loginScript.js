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

    console.log('login =', login);
    console.log('pass =', password);

    // fetch('./php/login.php', {
    //     method: "POST",
    //     data: formData
    // })
    //     .then(res => res.json())
    //     .then(jsoned => console.log(jsoned))

    if (login == 'pogudina.l@mail.ru' && password == 'test123') {
        window.location.href = '/dist/lk/lk.php'
    }
}