<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <link rel='stylesheet' href='style.css'>
    <!--Шрифт 1-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <!--Шрифт 2-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>Техношоп</title>
</head>
<body>
    
<div class='header'>
    <div class='container'>
        <div class='header-line'>
            <div class='header-content'>
                <div class='header-logo'>
                    <img src="logo.png" alt="">
                </div>
                <div class='nav'>
                    <a class='nav-item' href="index.php">ГЛАВНАЯ</a>
                    <a class='nav-item' href="index.php#assortment-bottom">АССОРТИМЕНТ</a>
                    <a class='nav-item' href="about.php">О МАГАЗИНЕ</a>
                </div>
                <div class="auth">
                    <?php if (isset($_SESSION['user_login'])): ?>
                        <div id="user-panel" class="user-panel" style="display: inline-block;">
                            <span id="user-name"><?php echo "Привет, " . $_SESSION['user_login']; ?></span>
                            <div id="logout-panel" class="logout-panel">Выйти из аккаунта</div>
                        </div>
                    <?php else: ?>
                        <span id="auth-link" onclick="redirectToAuth()" style="display: inline;">Зарегистрироваться/Войти</span>
                        <div id="user-panel" class="user-panel" style="display: none;">
                            <span id="user-name"></span>
                            <div id="logout-panel" class="logout-panel">Выйти из аккаунта</div>
                        </div>
                    <?php endif; ?>
                </div>
                <div class='cart'>
                    <div class='cart-holder'>
                        <button class="cart-img-button" id="cart-button">
                            <div class="cart-img-container">
                                <img src="cart.png" alt="Cart" class="cart-img">
                                <span class="cart-panel-counter">0</span>
                            </div>
                        </button>
                        <div class="cart-panel" id="cart-panel">
                            <ul id="cart-panel-items"></ul> 
                            <button class="go-to-cart-button">Перейти в корзину</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class='contact-information'>
            <div class='contact-information-content'>
                <div class='adress'>
                    <div class='adress-name' onclick="copyText('adress-name-text')">
                        <strong>Адрес:</strong><br>
                        <span class='copyable' id="adress-name-text">1-я Красноармейская улица, 8-10, Санкт-Петербург<br>
                        Рядом с м. Технологический институт</span>
                    </div>
                    <div id="map-test"></div>
                </div>
                
                <div class='contacts' id='contacts'>
                    <div class='contacts-content'>
                        <div class='contacts-phone-number' onclick="copyText('phone-number-text')">
                            <strong>Телефон:</strong><br> 
                            <span class='copyable' id="phone-number-text">+7 (812) 542-19-63</span>
                        </div>
                        <div class='contacts-mail-name' onclick="copyText('mail-name-text')">
                            <strong>Email:</strong><br>
                            <span class='copyable' id="mail-name-text">info@technoshop.ru</span>
                        </div>
                    </div>
                </div>
                
                <div class='work-schedule'>
                    <div class='work-schedule-content'>
                        <div class='work-schedule-title'>
                            <strong>Режим работы магазина:</strong>
                        </div>
                        <div class='work-schedule-subtitle'>
                            С 8:00 до 22:00<br>
                            Без выходных и перерывов
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div id="notification" class="notification"></div>
        
    </div>
</div>
    
<script src="copyText.js"></script>
<script src="cart.js"></script>
<script src="cartPanel.js"></script>
<script src="registrationPanel.js"></script>
<!-- Подключаем API Яндекс.Карт -->
<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
<script src="showMap.js" defer></script>
    
</body>
</html>