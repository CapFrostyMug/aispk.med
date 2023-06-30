import attributeDisabledHandler from './attributeDisabledHandler';

export default function checkboxFlagHandler() {

    let checkboxes = document.querySelectorAll('.custom-input-original-docs');
    let flag = 0;

    for (let item of checkboxes) {
        if (item.hasAttribute('checked')) {
            flag = 1;
            break;
        }
    }

    attributeDisabledHandler(flag);
};
