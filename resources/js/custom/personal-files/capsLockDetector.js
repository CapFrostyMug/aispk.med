export default function capsLockDetector() {

    const inputs = document.querySelectorAll('.custom-capslock-none');
    const message = 'Пожалуйста, отключите CapsLock';

    inputs.forEach((item) => {
        item.addEventListener('keyup', (e) => {
            if (e.getModifierState('CapsLock')) {
                alert(message);
            }
        })
    });
}
