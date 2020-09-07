function logout () {
    document.cookie = `user = ''; path=/; expires = ${new Date().getHours() - 24}`;
    console.log('Logout');
}

// document.getElementById('logout-button').addEventListener('click', logout);