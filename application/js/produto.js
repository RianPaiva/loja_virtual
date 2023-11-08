function change_image(img) {
    var allImages = document.querySelectorAll('.line-check.radio');
    allImages.forEach(function (image) {
        image.classList.remove('thumbnail-active');
    });

    img.classList.add('thumbnail-active');

    var container = document.getElementById("main-image");
    container.src = img.src;
}
