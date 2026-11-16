var range = document.getElementById("range");
var posX = document.getElementById("posX");
var posY = document.getElementById("posY");
var output = document.getElementById("demo");

const overlayImage = document.querySelector(".image-overlay .image-container img.overlay-image");

range.addEventListener("input", (e) => {
    let sliderValue = e.target.value + "%";

    overlayImage.style.opacity = sliderValue;
});

posX.addEventListener("input", (e) => {
    let sliderValue = e.target.value + "%";
    overlayImage.style.left = sliderValue;
});

posY.addEventListener("input", (e) => {
    let sliderValue = e.target.value + "%";
    overlayImage.style.top = sliderValue;
});

range.oninput = function() {
    output.innerHTML = this.value;
};