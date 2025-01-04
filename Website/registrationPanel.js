function showAuthLink() {
    document.getElementById('auth-link').style.display = 'inline';
    document.getElementById('user-panel').style.display = 'none';
}

function showUserPanel(username) {
    document.getElementById('auth-link').style.display = 'none';
    const userNameElement = document.getElementById('user-name');
    userNameElement.textContent = username;
    document.getElementById('user-panel').style.display = 'inline-block';
}

function redirectToAuth() {
    window.location.href = 'registration.html';
}

document.getElementById('logout-panel').addEventListener('click', function() {
    fetch('logout.php', {
        method: 'GET',
        credentials: 'same-origin'
    })
    .then(response => {
        if (response.ok) {
            localStorage.removeItem('cartItems');
            localStorage.removeItem('currentUser');
            localStorage.removeItem('totalItemCount');
            localStorage.removeItem('totalPrice');

            window.location.href = 'index.php';
        } else {
            console.error('Ошибка при выходе из аккаунта.');
        }
    })
    .catch(error => console.error('Ошибка сети:', error));
});