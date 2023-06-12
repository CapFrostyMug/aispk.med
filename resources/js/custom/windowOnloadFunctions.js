export default function WindowOnloadFunctions() {

    // Скрывает иконку корзины у первого потомка блока 'custom-faculty-block-parent'
    window.onload = function () {
        let facultyBlockParent = document.querySelector('.custom-faculty-block-parent');
        let test = facultyBlockParent.firstElementChild.querySelector('.custom-remove-block');
        test.classList.add('d-none');
    }
}
