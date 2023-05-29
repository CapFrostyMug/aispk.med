export default function addFacultyBlock() {

    let button = document.querySelector('.add-faculty');

    let facultyBlockParent = document.querySelector('.faculty-block-parent');
    let facultyBlockChild = document.querySelector('.faculty-block-child');

    let counter = 1;

    function handler() {

        // Объявляем массив искомых тегов
        let searchedTags = ['label', 'select', 'input'];

        // Объявляем массив искомых атрибутов
        let searchedAttributes = ['for', 'id', 'name'];

        // Объявляем массив для найденных тегов
        let foundTags = [];

        // Увеличиваем счётчик на единицу
        ++counter;

        // Клонируем элемент и удаляем унаследованный от родителя класс
        let facultyBlockChildClone = facultyBlockChild.cloneNode(true);
        facultyBlockChildClone.classList.remove('display-none');

        // У клонированного элемента находим нужные теги, преобразовываем каждую HTML-коллекцию
        // в обычный массив, а затем добавляем в общий массив foundTags
        for (let searchedTagsItem of searchedTags) {
            for (let item of [...facultyBlockChildClone.getElementsByTagName(searchedTagsItem)]) {
                foundTags.push(item);
            }
        }

        // У каждого тега из массива searchedTags проверяем наличие нужного атрибута
        // из массива searchedAttributes. Если атрибут есть, то изменяем его значение
        foundTags.forEach((foundTagsItem) => {
            for (let searchedAttributesItem of searchedAttributes) {

                if (foundTagsItem.hasAttribute(searchedAttributesItem)) {

                    let attributeFoundTagsItem = foundTagsItem.getAttribute(searchedAttributesItem);

                    if (searchedAttributesItem === 'name') {
                        foundTagsItem.setAttribute
                        (
                            searchedAttributesItem, `data[${attributeFoundTagsItem + counter}]`
                        );
                    } else {
                        foundTagsItem.setAttribute
                        (
                            searchedAttributesItem, attributeFoundTagsItem + counter
                        );
                    }
                }
            }
        });

        // Добавляем клона в вёрстку, в конец родителя
        facultyBlockParent.appendChild(facultyBlockChildClone);
    }

    button.addEventListener("click", handler);
}
