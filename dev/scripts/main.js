import { login } from './loginScript';

document.getElementById('login').addEventListener('click', (event) => {
    event.preventDefault();
    login();
})