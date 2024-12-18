function copyToClipboard(id) {
    var copyText = document.getElementById("copyLinkInput-" + id);
    copyText.select();
    copyText.setSelectionRange(0, 99999); // Untuk mobile devices

    document.execCommand("copy");

    alert("Link halaman telah disalin: " + copyText.value);
}

document.addEventListener("DOMContentLoaded", function () {
    var content = document.querySelector(".container");
    var load = document.querySelector(".loader");
    content.style.display = "none";

    var grid = document.querySelector(".grid");
    var images = grid.querySelectorAll("img");
    var imagesLoaded = 0;
    var totalImages = images.length;

    if (totalImages === 0) {
        LoadImage();
    }

    function onImageLoad() {
        imagesLoaded++;
        if (imagesLoaded === totalImages) {
            content.style.display = "block";
            load.style.display = "none";

            var msnry = new Masonry(grid, {
                itemSelector: ".grid-item",
                columnWidth: ".grid-item",
                percentPosition: true,
            });
        }
    }

    function LoadImage() {
        content.style.display = "block";
        load.style.display = "none";

        var msnry = new Masonry(grid, {
            itemSelector: ".grid-item",
            columnWidth: ".grid-item",
            percentPosition: true,
        });
    }

    images.forEach(function (image) {
        image.addEventListener("load", onImageLoad);

        if (image.complete) {
            onImageLoad();
        }
    });
});
