<?php
header('Content-Type: text/html; charset=utf-8');
session_start();
require_once('db.php');

$login = mysqli_real_escape_string($conn, $_POST['login']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$pass = mysqli_real_escape_string($conn, $_POST['pass']);

if (empty($login) || empty($email) || empty($pass)) {
    echo "<script>
        alert('Заполните все поля');
        window.location.href = 'registration.html';
    </script>";
}
else {
    $sql = "INSERT INTO `users` (login, email, pass) VALUES ('$login', '$email', '$pass')";
    if ($conn -> query($sql) === True) {
        echo "<script>
            alert('Успешная регистрация');
            window.location.href = 'index.php';
        </script>";
    } 
    else {
        echo "<script>
            alert('Ошибка: ' . $conn->error);
            window.location.href = 'registration.html';
        </script>";
    }
}

$conn->close();
?>

