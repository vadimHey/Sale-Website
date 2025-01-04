function copyText(elementId) {
    var textToCopy = document.getElementById(elementId).innerText;

    var tempElement = document.createElement("textarea");
    tempElement.value = textToCopy;

    document.body.appendChild(tempElement);

    tempElement.select();
    tempElement.setSelectionRange(0, 99999); 

    document.execCommand("copy");
    document.body.removeChild(tempElement);

    showNotification(textToCopy);
}

function showNotification(copiedText) {
    var notification = document.getElementById("notification");

    notification.innerText = "Скопировано: " + copiedText;
    notification.classList.add("show");

    setTimeout(function() {
        notification.classList.remove("show");
    }, 3000);
}