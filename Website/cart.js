const currentUser = JSON.parse(localStorage.getItem('currentUser'));
const isUserLoggedIn = currentUser && currentUser.username;

const cartKey = 'cartItems';
const totalPriceKey = 'totalPrice';
const totalItemCountKey = 'totalItemCount';

let cartItems = JSON.parse(localStorage.getItem(cartKey)) || [];
let totalPrice = parseFloat(localStorage.getItem(totalPriceKey)) || 0;
let totalItemCount = parseInt(localStorage.getItem(totalItemCountKey)) || 0;

function addToCart(name, price, imageUrl) {
    if (!isUserLoggedIn) {
        const notification = document.getElementById("cart-notification");
        notification.innerText = "Войдите в аккаунт, чтобы использовать корзину.";
        notification.classList.add("show");

        setTimeout(() => {
            notification.classList.remove("show");
        }, 3000);
        return;
    }

    const existingItem = cartItems.find(item => item.name === name);
    if (existingItem) {
        existingItem.quantity += 1;
    } else {
        cartItems.push({ name, price, imageUrl, quantity: 1 });
    }

    totalPrice += price;
    totalItemCount += 1;

    saveCart();       
    updateCartPanelUI(); 
}

function saveCart() {
    localStorage.setItem(cartKey, JSON.stringify(cartItems));
    localStorage.setItem(totalPriceKey, totalPrice.toString());
    localStorage.setItem(totalItemCountKey, totalItemCount.toString());
}

function updateCartPanelUI() {
    const cartPanelItemsElement = document.getElementById('cart-panel-items');
    const cartPanelCounterElement = document.querySelector('.cart-panel-counter');

    cartPanelItemsElement.innerHTML = '';

    cartItems.forEach(item => {
        const li = document.createElement('li');
        li.innerHTML = `
            <img src="${item.imageUrl}" alt="${item.name}" style="width: 40px; height: 40px; margin-right: 10px;">
            ${item.name} - ${item.price} руб. (${item.quantity} шт.)
        `;
        cartPanelItemsElement.appendChild(li);
    });

    cartPanelCounterElement.textContent = totalItemCount;
}

function updateCartPageUI() {
    const cartItemsElement = document.getElementById('cart-items-list');
    const cartTotalPriceElement = document.getElementById('cart-total-price');

    cartItemsElement.innerHTML = '';

    cartItems.forEach((item, index) => {
        const li = document.createElement('li');
        li.classList.add('cart-item');

        li.innerHTML = `
            <div class="cart-item-row">
                <div class="cart-item-info">
                    <img src="${item.imageUrl}" alt="${item.name}">
                    <span>${item.name} - ${item.price} руб.</span>
                    <span class="quantity">(${item.quantity} шт.)</span>
                </div>
                <div class="cart-controls">
                    <button onclick="increaseQuantity(${index})">+</button>
                    <button onclick="decreaseQuantity(${index})">-</button>
                    <button onclick="removeItem(${index})">Удалить</button>
                </div>
            </div>
        `;

        cartItemsElement.appendChild(li);
    });

    cartTotalPriceElement.textContent = totalPrice;
}

function increaseQuantity(index) {
    cartItems[index].quantity += 1;
    totalPrice += cartItems[index].price;
    totalItemCount += 1;

    saveCart();
    updateCartPanelUI();
    updateCartPageUI();
}

function decreaseQuantity(index) {
    if (cartItems[index].quantity > 1) {
        cartItems[index].quantity -= 1;
        totalPrice -= cartItems[index].price;
        totalItemCount -= 1;
    } else {
        removeItem(index); 
    }

    saveCart();
    updateCartPanelUI();
    updateCartPageUI();
}

function removeItem(index) {
    totalPrice -= cartItems[index].price * cartItems[index].quantity;
    totalItemCount -= cartItems[index].quantity;
    cartItems.splice(index, 1);  // Удаляем товар из массива

    saveCart();
    updateCartPanelUI();
    updateCartPageUI();
}

function clearCart() {
    cartItems = [];
    totalPrice = 0;
    totalItemCount = 0;
    localStorage.removeItem(cartKey);
    localStorage.removeItem(totalPriceKey);
    localStorage.removeItem(totalItemCountKey);
    updateCartPanelUI();
    updateCartPageUI();
}

window.addEventListener("load", function() {
    if (!isUserLoggedIn) {
        clearCart(); 
    } else {
        cartItems = JSON.parse(localStorage.getItem(cartKey)) || [];
        totalPrice = parseFloat(localStorage.getItem(totalPriceKey)) || 0;
        totalItemCount = parseInt(localStorage.getItem(totalItemCountKey)) || 0;

        updateCartPanelUI(); 
        updateCartPageUI();  
    }
});