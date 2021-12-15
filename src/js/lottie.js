import Lottie from "lottie-web";

document.addEventListener('DOMContentLoaded', function () {

    let heart = document.getElementById('like');

    if (heart) {
        heart.addEventListener('click', function () {
            Lottie.loadAnimation({
                container: heart,
                renderer: 'svg',
                path: 'assets/lottie/heart.json'
            });
        });
    }
});





