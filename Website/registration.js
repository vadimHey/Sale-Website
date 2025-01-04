function showNotification(message, type = "success") {
    const notification = document.getElementById("notification");
    notification.innerText = message;
    
    // Добавляем нужные классы для отображения стиля уведомления
    notification.classList.add("show");
    if (type === "error") {
        notification.classList.add("error");
    } else {
        notification.classList.remove("error");
    }

    // Скрытие уведомления через 3 секунды
    setTimeout(() => {
        notification.classList.remove("show");
    }, 3000);
}

// Обработчик URL-параметров для показа уведомлений
document.addEventListener("DOMContentLoaded", () => {
    const urlParams = new URLSearchParams(window.location.search);
    const message = urlParams.get("message");
    const user = urlParams.get("user");

    if (message === "success") {
        showNotification("Регистрация прошла успешно. Войдите в аккаунт.");
    } else if (message === "error") {
        showNotification("Ошибка регистрации. Попробуйте снова.", "error");
    } else if (message === "login_success" && user) {
        showNotification(`Добро пожаловать, ${user}!`);
    } else if (message === "login_error") {
        showNotification("Неверные логин или пароль.", "error");
    }
});
