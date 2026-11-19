var range = document.getElementById("range");
var posX = document.getElementById("posX");
var posY = document.getElementById("posY");
var output = document.getElementById("demo");
var value = document.getElementById("value");

const overlayImage = document.querySelector(".image-overlay .image-container img.overlay-image");

range.addEventListener("input", (e) => {
    let sliderValue = e.target.value + "%";
    value.textContent = sliderValue;
    overlayImage.style.opacity = sliderValue;
});

range.oninput = function() {
    output.innerHTML = this.value;
};

//======For adjusting the position of the overlay image=========
/*
posX.addEventListener("input", (e) => {
    let sliderValue = e.target.value + "%";
    overlayImage.style.left = sliderValue;
});

posY.addEventListener("input", (e) => {
    let sliderValue = e.target.value + "%";
    overlayImage.style.top = sliderValue;
});
*/