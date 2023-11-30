export default function resetFilter() {

    let form = document.querySelector('.custom-fn-form');
    let button = document.querySelector('.custom-fn-reset-form');

    let filterOptions = document.getElementsByClassName('custom-fn-reset-filter');

    function handler() {

        if (confirm('Очистить фильтр?')) {

            form.reset();

            for (let item of filterOptions) {
                item.removeAttribute('checked');
                item.removeAttribute('selected');
            }
        }
    }

    button.addEventListener("click", handler);
}
