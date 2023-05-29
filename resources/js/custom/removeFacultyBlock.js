export default function removeFacultyBlock() {

    document.querySelector('.faculty-block-parent').onclick = function (e) {
        const btn = e.target.closest('.remove-block');
        if (!btn) {
            return;
        }

        btn.closest('.faculty-block-child').remove();
    }
}
