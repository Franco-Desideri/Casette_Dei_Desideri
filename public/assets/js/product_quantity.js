document.addEventListener("DOMContentLoaded", () => {
    // Seleziona tutti i bottoni con classe "quantity-btn"
    const buttons = document.querySelectorAll(".quantity-btn");

    buttons.forEach(button => {
        button.addEventListener("click", () => {
            const action = button.getAttribute("data-action");
            const quantityInput = button.parentElement.querySelector(".product-quantity");

            let currentValue = parseInt(quantityInput.value);

            if (action === "increment") {
                quantityInput.value = currentValue + 1;
            } else if (action === "decrement" && currentValue > 0) {
                quantityInput.value = currentValue - 1;
            }
        });
    });
});
