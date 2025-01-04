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
                    <a class='nav-item' href='#assortment-bottom'>АССОРТИМЕНТ</a>
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
                <div class="cart">
                    <div class="cart-holder">
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
        
        <div class='header-down'>
            <div class='header-greeting'>
                <div class='header-title'>
                    Добро пожаловать в
                </div>
                <div class='header-subtitle'>
                    Наш магазин
                </div>
                <div class='header-suptitle'>
                    ЛУЧШАЯ ТЕХНИКА У НАС
                </div>
            </div>
            
            <div class='header-bg'>
                <img src="appliances.jpg" alt="">
            </div>
        </div>
    </div>
</div>
    
<div class='cards'>
    <div class='container'>
        <div class='cards-holder'>
            <div class='card'>
                <div class='card-content'>
                    <div class='card-image'>
                        <img class='card-img' src="quality.png">
                    </div>
                    <div class='card-title'>
                        Высокое <span>качество</span>
                    </div>
                    <div class='card-desc'>
                        Все наши товары проверяются на качество, чтобы покупатели 
                        получали только лучшее
                    </div>
                </div>
            </div>

            <div class='card'>
                <div class='card-content'>
                    <div class='card-image'>
                        <img class='card-img' src="assortment.png">
                    </div>
                    <div class='card-title'>
                        Широкий <span>ассортимент</span>
                    </div>
                    <div class='card-desc'>
                        Каждый покупатель найдет для себя нужный товар, подходящий его предпочтениям   
                    </div>
                </div>
            </div>

            <div class='card'>
                <div class='card-content'>
                    <div class='card-image'>
                        <img class='card-img' src="delivery.png">
                    </div>
                    <div class='card-title'>
                        Быстрая <span>доставка</span>
                    </div>
                    <div class='card-desc'>
                        Для максимального удобства покупателя у нас есть быстрая доставка в любую часть города 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
<div class='assortment' id='assortment'>
    <div class='container'>
        <div class='assortment-title'>
            Ассортимент кухонной техники
        </div>
        <div class='assortment-holder'>
            <div class='kitchen-appliance'>
                <a class='kitchen-appliance-button' href="multicookers.php">
                    <div class='kitchen-appliance-image'>
                        <img class='kitchen-appliance-img' src="multicooker.jpg">
                    </div>
                    <div class='kitchen-appliance-title'>
                        Мультиварки
                    </div>
                </a>
            </div>
            
            <div class='kitchen-appliance'>
                <a class='kitchen-appliance-button' href="kettles.php">
                    <div class='kitchen-appliance-image'>
                        <img class='kitchen-appliance-img' src="kettle.jpg">
                    </div>
                    <div class='kitchen-appliance-title'>
                        Чайники
                    </div>
                </a>
            </div>
            
            <div class='kitchen-appliance'>
                <a class='kitchen-appliance-button' href="blenders.php">
                    <div class='kitchen-appliance-image'>
                        <img class='kitchen-appliance-img' src="blender.jpg">
                    </div>
                    <div class='kitchen-appliance-title'>
                        Блендеры
                    </div>
                </a>
            </div>
            
            <div class='assortment-bottom' id='assortment-bottom'></div>
        </div>
        
        <div id="notification" class="notification"></div>
        
    </div>
</div>
    
<script src="showNextCard.js"></script>
<script src="cart.js"></script>
<script src="cartPanel.js"></script>
<script src="registrationPanel.js"></script>

</body>
</html>