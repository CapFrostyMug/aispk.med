import checkboxFlagHandler from './checkboxFlagHandler';
export {clickHandler, removeFacultyBlock};

function clickHandler() {
    document.querySelector('.custom-add-faculty').addEventListener("click", removeFacultyBlock);
}

function removeFacultyBlock() {

    let trashBaskets = document.querySelectorAll('.custom-delete-cart');

    trashBaskets.forEach((item) => {
        item.addEventListener('click', () => {
            item.closest('.custom-faculty-block-child').remove();
            checkboxFlagHandler();
        })
    });
}
