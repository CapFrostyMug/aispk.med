export default function backTopButton() {

    let myButton = document.getElementById("btn-back-to-top");

    window.onscroll = function () {
        scrollFunction();
    };

    function scrollFunction() {
        if (
            document.body.scrollTop > 150 ||
            document.documentElement.scrollTop > 150
        ) {
            myButton.style.display = "block";
        } else {
            myButton.style.display = "none";
        }
    }

    myButton.addEventListener("click", backToTop);

    function backToTop() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
}
