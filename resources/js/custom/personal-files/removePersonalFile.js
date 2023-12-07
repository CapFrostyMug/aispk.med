import {PERSONAL_FILE_REDIRECT_PATH as redirectPath} from '../../config';
import {PERSONAL_FILE_REMOVE_PATH as removePath} from '../../config';

export default function removePersonalFile() {

    let buttonsRemoveFile = document.querySelectorAll('.custom-fn-personal-file-remove');

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

    buttonsRemoveFile.forEach((item) => {
        item.addEventListener('click', () => {

            let studentId = item.dataset.studentId;

            if (confirm('Удалить личное дело?')) {
                send(removePath + studentId).then(() => {
                    location.href = redirectPath;
                    //location.reload();
                });
            }
        });
    });
}
