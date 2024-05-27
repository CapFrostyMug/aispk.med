export default function spinnerForButton() {

    const buttons = document.querySelectorAll('.custom-fn-spinner');

    buttons.forEach((item) => {
        item.addEventListener("click", () => {
            (
                async () => {

                    handler();

                    const response = await fetch('export-list', {
                        method: 'GET',
                        headers: {
                            'Content-Type': 'application/json;charset=utf-8',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        }
                    });

                    let result = await response;

                    if (result) {
                        handler();
                    }
                    if (result.status !== 200) {
                        alert('Системная ошибка. Попробуйте еще раз');
                    }
                }
            )();
        });
    });

    function handler() {
        buttons.forEach((item) => {
            item.toggleAttribute('hidden');
        });
    }
}
