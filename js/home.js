//navbar configuration
document.getElementById("user").addEventListener("click", () => {
  document.getElementById("userbar").classList.add("active");
});

document.getElementById("asd").addEventListener("click", () => {
  document.getElementById("userbar").classList.remove("active");
});

// form controll
document.getElementById("btt1").addEventListener("click", () => {
  document.querySelector(".popup").classList.remove("hide");
});

document.querySelector(".xmark").addEventListener("click", () => {
  document.querySelector(".popup").classList.add("hide");
});

// show uploaded phpot
let input = document.getElementById("image_input");
let inputDisplay = document.querySelector(".display");
let imageInput = "";

input.addEventListener("change", function () {
  const render = new FileReader();
  render.addEventListener("load", () => {
    imageInput = render.result;
    inputDisplay.src = imageInput;
  });
  render.readAsDataURL(this.files[0]);
});
