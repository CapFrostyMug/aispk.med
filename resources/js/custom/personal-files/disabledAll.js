export default function disabledAll() {

    let searchedTags = ['input', 'select', 'text', 'textarea'];

    for (let item of searchedTags) {
        let foundTags = document.getElementsByTagName(item);
        for (let item of foundTags) {
            item.setAttribute("disabled", "disabled");
        }
    }
}
