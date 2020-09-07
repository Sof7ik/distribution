import { login } from './loginScript';

export function logout () {
    document.cookie = `user = ''; path=/; expires = ${new Date().getHours() - 24}`;
    console.log('Logout');
}

document.getElementById('login').addEventListener('click', (event) => {
    event.preventDefault();
    login();
})

// document.getElementById('logout-button').addEventListener('click', logout);