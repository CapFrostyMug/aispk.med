import attributeHandlerDisabled from './attributeHandlerDisabled';

export default function checkboxHandler() {

    let checkboxClassName = 'form-check-input custom-fn-input-original-docs';

    document.querySelector('.custom-fn-faculty-block-parent').onclick = function (e) {

        if (e.target.className === checkboxClassName && !e.target.hasAttribute('checked')) {

            e.target.setAttribute('checked', 'checked');
            attributeHandlerDisabled(1);

        } else if (e.target.className === checkboxClassName && e.target.hasAttribute('checked')) {

            e.target.removeAttribute('checked');
            attributeHandlerDisabled(0);
        }
    }
};
