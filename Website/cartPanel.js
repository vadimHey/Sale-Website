document.addEventListener('DOMContentLoaded', function() {
    const cartButton = document.getElementById('cart-button');
    const cartPanel = document.getElementById('cart-panel');

    function showCartPanel() {
        cartPanel.classList.add('visible');
    }

    function hideCartPanel() {
        if (!cartPanel.matches(':hover') && !cartButton.matches(':hover')) {
            cartPanel.classList.remove('visible');
        }
    }

    cartButton.addEventListener('mouseenter', showCartPanel);
    cartPanel.addEventListener('mouseenter', showCartPanel);

    cartButton.addEventListener('mouseleave', () => {
        setTimeout(hideCartPanel, 100);
    });
    cartPanel.addEventListener('mouseleave', () => {
        setTimeout(hideCartPanel, 100);
    });
});

document.querySelector('.go-to-cart-button').addEventListener('click', function() {
    window.location.href = 'cart.php';
});