var range = document.getElementById("range");

const overlayImage = document.querySelector(".image-overlay .image-container img.overlay-image");

range.addEventListener("input", (e) => {
    let sliderValue = e.target.value + "%";

    overlayImage.style.opacity = sliderValue;
});
