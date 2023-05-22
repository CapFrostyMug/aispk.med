export default function addFacultyBlock() {

    let button = document.querySelector('.add-faculty');

    let facultyBlockParent = document.querySelector('.faculty-block-parent');
    let facultyBlockChild = document.querySelector('.faculty-block-child');

    //let count = 1;

    function handler() {

        let count = 456;

        // Клонируем элемент и сразу добавляем его в вёрстку
        facultyBlockParent.append(facultyBlockChild.cloneNode(true));

        // Находим последний дочерний элемент родителя (тот, что только что добавили)
        let LastElemChild = facultyBlockParent.lastElementChild;

        // У последнего дочернего элемента родителя находим нужные теги и преобразуем полученную
        // HTML-коллекцию в обычный массив
        let LastElemChildLabel = Array.from(LastElemChild.getElementsByTagName('label'));

        // Проходимся циклом по массиву и присваиваем нужному тегу необходимое значение
        for (let item of LastElemChildLabel) {
            let attrValue = item.getAttribute('for');
            item.setAttribute('for', attrValue.replace(attrValue.slice(attrValue.lastIndexOf('-')), `-${count}`));
        }

        count++;
    }

    button.addEventListener("click", handler);
}
