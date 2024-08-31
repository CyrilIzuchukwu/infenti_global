const generalContainer = document.querySelector(".genContainer");
const preLoader = document.querySelector(".preLoader");
window.addEventListener("DOMContentLoaded", () => {
    generalContainer.style.display = "block";
    preLoader.style.display = "none";
});
const hamburger = document.querySelector(".hamburger");
const navSlide = document.querySelector(".nav-slide");
// On click
hamburger.addEventListener("click", function () {
    // Toggle class "is-active"
    hamburger.classList.toggle("is-active");
    // Do something else, like open/close menu
    navSlide.classList.toggle("slide");
});

let scrollToTopBtn = document.querySelector(".scroll-top");
console.log(scrollToTopBtn)

window.onscroll = function () {
    if (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300) {
        scrollToTopBtn.style.display = "block";
    } else {
        scrollToTopBtn.style.display = "none";
    }
};

scrollToTopBtn.addEventListener("click", function () {
    window.scrollTo({
        top: 0,
        behavior: "smooth"
    });
});


