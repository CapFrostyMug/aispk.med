import attributeDisabledHandler from './attributeDisabledHandler';

export default function checkboxHandler() {

    let checkboxClassName = 'form-check-input custom-input-original-docs';

    document.querySelector('.custom-faculty-block-parent').onclick = function (e) {

        if (e.target.className === checkboxClassName && !e.target.hasAttribute('checked')) {

            e.target.setAttribute('checked', 'checked');
            attributeDisabledHandler(1);

        } else if (e.target.className === checkboxClassName && e.target.hasAttribute('checked')) {

            e.target.removeAttribute('checked');
            attributeDisabledHandler(0);
        }
    }
};
