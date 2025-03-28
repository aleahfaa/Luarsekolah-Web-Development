const heroSection = document.querySelector('#home');
const images = [
    './hero-section.jpg',
    './hero-section-2.jpg',
    './hero-section-3.jpg',
    './hero-section-4.jpg',
    './hero-section-5.jpg',
    './hero-section-6.jpg'

];
let currentIndex = 0;
function changeBackgroundImage() {
    currentIndex = (currentIndex + 1) % images.length;
    heroSection.style.backgroundImage = `url(${images[currentIndex]})`;
}
setInterval(changeBackgroundImage, 3000);