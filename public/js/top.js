const signBtn = document.getElementById("sign-up");
const loginBtn = document.getElementById("login");
const loginBox = document.getElementById("login-box");
const signupBox = document.getElementById("signup-box");

document.addEventListener("DOMContentLoaded", function () {
    signBtn.addEventListener("click", function () {
        loginBox.classList.toggle("hidden");
        signupBox.classList.toggle("hidden");
    });
    loginBtn.addEventListener("click", function () {
        loginBox.classList.toggle("hidden");
        signupBox.classList.toggle("hidden");
    });
});
