export default function viewFileFieldsHandler() {

    function tagsHandler() {

        let searchedTags = ['input', 'select', 'textarea'];
        let foundElemTags = [];

        for (let item of searchedTags) {
            foundElemTags.push(document.getElementsByTagName(item));
        }

        for (let item of foundElemTags) {
            for (let i = 0; i < item.length; i++) {
                item[i].setAttribute("disabled", "disabled");
            }
        }
    }

    function classesHandler() {

        let searchedClasses = ['custom-st-trashbasket-icon', 'custom-fn-add-faculty', 'custom-fn-avg-calc-btn'];
        let foundElemClasses = [];

        for (let item of searchedClasses) {
            foundElemClasses.push(document.querySelectorAll(`.${item}`));
        }

        console.log(foundElemClasses);

        for (let item of foundElemClasses) {
            for (let i = 0; i < item.length; i++) {
                item[i].parentNode.remove();
            }
        }
    }

    tagsHandler();
    classesHandler();
}
