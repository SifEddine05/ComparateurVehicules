function animateDiaporama()
{
    document.addEventListener("DOMContentLoaded", function () {
        var images = document.querySelectorAll('.diaporama img');
        var types = document.querySelectorAll('.diaporama h3');

        var index = 0;

        function showImage() {
            images[index].classList.remove('active');
            types[index].classList.remove('active');

            index = (index + 1) % images.length;
            images[index].classList.add('active');
            types[index].classList.add('active');

        }
        setInterval(showImage, 5000);
    });
}

animateDiaporama()