
window.addEventListener('DOMContentLoaded', function () {
    const controls = document.querySelectorAll('.quantity-control');

    controls.forEach(control => {
        const input = control.querySelector('.product-quantity-input');
        const minusBtn = control.querySelector('[data-action="minus"]');
        const plusBtn = control.querySelector('[data-action="plus"]');

        const step = parseInt(input.step) || 1;
        const min = parseInt(input.min) || 0;

        minusBtn.addEventListener('click', function () {
            let value = parseInt(input.value) || 0;
            value = Math.max(min, value - step);
            input.value = value;
        });

        plusBtn.addEventListener('click', function () {
            let value = parseInt(input.value) || 0;
            input.value = value + step;
        });
    });
});





