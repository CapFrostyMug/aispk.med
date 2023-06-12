export default function removeFacultyBlock() {

    document.querySelector('.custom-faculty-block-parent').onclick = function (e) {
        const button = e.target.closest('.custom-remove-block');
        if (!button) {
            return;
        }

        button.closest('.custom-faculty-block-child').remove();
    }
}
