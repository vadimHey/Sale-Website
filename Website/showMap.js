function init() {
    let map = new ymaps.Map('map-test', {
        center: [59.915887, 30.314646], zoom: 15
    });

    let placemark = new ymaps.Placemark([59.915887, 30.314646], {
        balloonContent: 'Магазин Техношоп'
    });

    map.geoObjects.add(placemark);

    map.controls.remove('geolocationControl');
    map.controls.remove('searchControl');
    map.controls.remove('trafficControl');
    map.controls.remove('typeSelector');
    map.controls.remove('fullscreenControl');
    map.controls.remove('zoomControl');
    map.controls.remove('rulerControl');
    map.behaviors.able(['scrollZoom']);
}

ymaps.ready(init);