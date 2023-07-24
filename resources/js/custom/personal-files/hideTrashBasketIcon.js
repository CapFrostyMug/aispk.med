// Скрывает иконку корзины у первого потомка блока 'custom-faculty-block-parent'

export default function hideTrashBasketIcon() {

    let facultyBlockParent = document.querySelector('.custom-faculty-block-parent');
    let firstElem = facultyBlockParent.firstElementChild.querySelector('.custom-remove-block');
    firstElem.classList.add('d-none');
};
