export default function removeSessionAlert() {

    let button = '';

    if (document.querySelector('.btn-close')) {
        button = document.querySelector('.btn-close');
    }

    function handler() {
        button.parentNode.remove();
    }

    if (button) {
        button.addEventListener("click", handler);
    }
}
