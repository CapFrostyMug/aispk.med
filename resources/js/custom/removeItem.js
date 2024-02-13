export default function removeItem() {

    let buttons = document.querySelectorAll('.custom-fn-remove');
    let redirectUrl = `${location.origin}/personal-files/manage/personal-file/search`;

    async function send(url) {
        let response = await fetch(url, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            },
        });

        /*let result = await response.json();
        return result.ok;*/
    }

    buttons.forEach((item) => {
        item.addEventListener('click', () => {

            if (confirm('Вы подтверждаете удаление?')) {
                send(item.dataset.deleteUrl).then(() => {

                    if (item.dataset.reloadPage) {
                        location.reload();
                    } else {
                        location.replace(redirectUrl);
                    }
                })
            }
        });
    });
}
