
//To Show And Hide Password
//Declare The Show Buttons
let settingOldPassShow = document.querySelector(".page .setting-page .secutity-info .con .show-pass.old"),
  settingNewPassShow = document.querySelector(".page .setting-page .secutity-info .con .show-pass.new"),
  settingRepeatPassShow = document.querySelector(".page .setting-page .secutity-info .con .show-pass.repeat"),
  loginPassShow = document.querySelector(".login-form .con .show-pass"),
  signupPassShow = document.querySelector(".sign-up-form .con .show-pass.password"),
  signupRepeatPassShow = document.querySelector(".sign-up-form .con .show-pass.repeat");
//Declare The Input Fields
let settingOldPass = document.querySelector(".page .setting-page .secutity-info .con input.old-pass"),
  settingNewPass = document.querySelector(".page .setting-page .secutity-info .con input.new-pass"),
  settingRepeatPass = document.querySelector(".page .setting-page .secutity-info .con .repeat-pass"),
  loginPassword = document.querySelector(".login-form .con .password"),
  signupPasword = document.querySelector(".sign-up-form .con .password"),
  signupRepeatPassword = document.querySelector(".sign-up-form .con .repeat");
// Methods
function showPassword(button, textBox) {
  if (button.classList.contains("hide")) {
    button.classList.remove("hide", "bg-blue");
    button.classList.add("bg-green");
    textBox.setAttribute("type", "text");
  } else {
    button.classList.add("hide", "bg-blue");
    button.classList.remove("bg-green");
    textBox.setAttribute("type", "password");
  }
}
//To Hide THe Pre-Loader
window.addEventListener("load", () => {
  const preLoader = document.querySelector(".pre-loader");
  preLoader.classList.add("hiddin");
});

