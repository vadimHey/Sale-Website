let currentSlide = 0;
const cards = document.querySelectorAll('.card');

function showNextCard() {
    // Убираем активный класс у текущей карточки
    cards[currentSlide].classList.remove('active');
    
    // Определяем следующую карточку
    currentSlide = (currentSlide + 1) % cards.length;
    
    // Добавляем активный класс следующей карточке
    cards[currentSlide].classList.add('active');
}

// Изначально показываем первую карточку
cards[currentSlide].classList.add('active');

// Меняем карточки каждые 3 секунды
setInterval(showNextCard, 3000);