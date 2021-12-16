import Lottie from "lottie-web";

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

    let error = document.getElementById('lottie-404');

    Lottie.loadAnimation({
        container: error,
        renderer: 'svg',
        path: 'assets/lottie/404.json'
    });
