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
        
        <div class="product-section">
            <div class="container">
                <h2 class="section-title">Ассортимент мультиварок</h2>
                <div class="product-grid">
                    <div class="product-card">
                        <img src="multicooker1.png" alt="Мультиварка 1" class="product-image">
                        <h3 class="product-title">Moulinex</h3>
                        <p class="product-description">Мультиварка Moulinex Fuzzy Logic MK707832</p>
                        <p class="product-price">Цена: 6490 руб</p>
                        <button class='add-to-cart' onclick="addToCart('Moulinex Fuzzy Logic', 6490, 'multicooker1.png')">Добавить в корзину</button>
                    </div>

                    <div class="product-card">
                        <img src="multicooker2.png" alt="Мультиварка 2" class="product-image">
                        <h3 class="product-title">Midea</h3>
                        <p class="product-description">Мультиварка Midea MPC-6030</p>
                        <p class="product-price">Цена: 3990 руб</p>
                        <button class='add-to-cart' onclick="addToCart('Midea MPC-6030', 3990, 'multicooker2.png')">Добавить в корзину</button>
                    </div>

                    <div class="product-card">
                        <img src="multicooker3.png" alt="Мультиварка 3" class="product-image">
                        <h3 class="product-title">Moulinex</h3>
                        <p class="product-description">Мультиварка Moulinex CE222D32</p>
                        <p class="product-price">Цена: 14990 руб</p>
                        <button class='add-to-cart' onclick="addToCart('Moulinex CE222D32', 14990, 'multicooker3.png')">Добавить в корзину</button>
                    </div>
                </div>
            </div>
        </div>
        
        <div id="cart-notification" class="notification"></div>
        
    </div>
</div>
    
<script src="cart.js"></script>
<script src="cartPanel.js"></script>
<script src="registrationPanel.js"></script>
        
</body>
</html>