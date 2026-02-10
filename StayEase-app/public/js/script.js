const roomNumberRegex = /^[A-Za-z0-9\-]{1,10}$/;
const priceRegex = /^\d+(\.\d{1,2})?$/;
const capacityRegex = /^[1-9]\d*$/; 
const descriptionRegex = /^.{0,255}$/;

document.querySelector("form").addEventListener("submit", function(e) {

    const number = document.querySelector("[name='number']").value.trim();
    const price = document.querySelector("[name='price_per_night']").value.trim();
    const capacity = document.querySelector("[name='capacity']").value.trim();
    const description = document.querySelector("[name='description']").value.trim();

    if (!roomNumberRegex.test(number)) {
        alert("Numéro de chambre invalide (exemple: A101, 203)");
        e.preventDefault();
        return;
    }

    if (!priceRegex.test(price)) {
        alert("Prix invalide");
        e.preventDefault();
        return;
    }

    if (!capacityRegex.test(capacity)) {
        alert("Capacité invalide");
        e.preventDefault();
        return;
    }

    if (!descriptionRegex.test(description)) {
        alert("Description trop longue :/ ");
        e.preventDefault();
        return;
    }
});
