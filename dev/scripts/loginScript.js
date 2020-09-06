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
    console.log(formData);

    fetch('./')
}