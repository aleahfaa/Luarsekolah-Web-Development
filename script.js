const heroSection = document.querySelector('#home');
const images = [
    './img/hero-section.jpg',
    './img/hero-section-2.jpg',
    './img/hero-section-3.jpg',
    './img/hero-section-4.jpg',
    './img/hero-section-5.jpg',
    './img/hero-section-6.jpg'

];
let currentIndex = 0;
function changeBackgroundImage() {
    currentIndex = (currentIndex + 1) % images.length;
    heroSection.style.backgroundImage = `url(${images[currentIndex]})`;
}
setInterval(changeBackgroundImage, 3000);

document.addEventListener("DOMContentLoaded", function () {
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 1,
        spaceBetween: 20,
        loop: true,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        breakpoints: {
            640: {
                slidesPerView: 1,
            },
            768: {
                slidesPerView: 2,
            },
            1024: {
                slidesPerView: 3,
            },
        },
    });
});
