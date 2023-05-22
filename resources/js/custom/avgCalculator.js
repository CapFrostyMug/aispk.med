export default function avgCalculator() {

    let button = document.querySelector('.avg-calc');

    function handler() {

        let result;

        let grade3 = Number(document.getElementById('grade-3').value);
        let grade4 = Number(document.getElementById('grade-4').value);
        let grade5 = Number(document.getElementById('grade-5').value);

        result = ((grade5 * 5) + (grade4 * 4) + (grade3 * 3)) / ((grade5 + grade4 + grade3));
        result = Math.floor(result * 100) / 100;

        document.getElementById('avg-rating-1').value = result;
    }

    button.addEventListener("click", handler);
}
