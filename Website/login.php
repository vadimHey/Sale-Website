<?php
header('Content-Type: text/html; charset=utf-8');
session_start();
require_once('db.php');

$login = $_POST['login'];
$pass = $_POST['pass'];

if (empty($login) || empty($pass)) {
    echo "<script>
        alert('Fill in all the fields');
        window.location.href = 'registration.html';
    </script>";
}
else {
    $sql = "SELECT * FROM users WHERE login = '$login' AND pass = '$pass'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $_SESSION['user_login'] = $row['login'];
            echo "<script>
                localStorage.setItem('currentUser', JSON.stringify({ username: '" . $row['login'] . "' }));
                alert('Успешный вход, " . $row['login'] . "!');
                window.location.href = 'index.php';
            </script>";
        }
    }
    else {
        echo "<script>
            alert('Нет такого пользователя');
            window.location.href = 'registration.html';
        </script>";
    }
}

$conn->close();
?>
