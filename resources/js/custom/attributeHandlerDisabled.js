export default function attributeHandlerDisabled(flag) {

    let checkboxes = document.querySelectorAll('.custom-input-original-docs');

    for (let item of checkboxes) {
        if (flag === 1 && !item.hasAttribute('checked')) {
            item.setAttribute('disabled', 'disabled');
        } else if (flag === 0) {
            item.removeAttribute('disabled');
        }
    }
}
