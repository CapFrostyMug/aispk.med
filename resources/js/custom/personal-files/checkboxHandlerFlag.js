import attributeHandlerDisabled from './attributeHandlerDisabled';

export default function checkboxHandlerFlag() {

    let checkboxes = document.querySelectorAll('.custom-fn-input-original-docs');
    let flag = 0;

    for (let item of checkboxes) {
        if (item.hasAttribute('checked')) {
            flag = 1;
            break;
        }
    }

    attributeHandlerDisabled(flag);
};
