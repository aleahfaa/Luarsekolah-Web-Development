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
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener("click", function (e) {
            e.preventDefault();
            const targetId = this.getAttribute("href").substring(1);
            const targetElement = document.getElementById(targetId);
            if (targetElement) {
                window.scrollTo({
                    top: targetElement.offsetTop - 80,
                    behavior: "smooth"
                });
            }
        });
    });
    const scrollToTopBtn = document.createElement("button");
    scrollToTopBtn.id = "scrollToTop";
    scrollToTopBtn.innerHTML = "&#8679;";
    document.body.appendChild(scrollToTopBtn);
    window.addEventListener("scroll", function () {
        if (window.scrollY > 300) {
            scrollToTopBtn.classList.add("show");
        } else {
            scrollToTopBtn.classList.remove("show");
        }
    });
    scrollToTopBtn.addEventListener("click", function () {
        window.scrollTo({
            top: 0,
            behavior: "smooth"
        });
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const darkModeToggle = document.getElementById("darkModeToggle");
    const darkModeIcon = document.getElementById("darkModeIcon");
    const body = document.body;
    const elementsToToggle = [
        document.querySelector("header"),
        ...document.querySelectorAll(".service, .testimonial, .contact-form, footer")
    ];
    function applyDarkMode(isDark) {
        if (isDark) {
            body.classList.add("dark-mode");
            elementsToToggle.forEach(el => el.classList.add("dark-mode"));
            darkModeIcon.classList.replace("bi-moon-fill", "bi-sun-fill");
        } else {
            body.classList.remove("dark-mode");
            elementsToToggle.forEach(el => el.classList.remove("dark-mode"));
            darkModeIcon.classList.replace("bi-sun-fill", "bi-moon-fill");
        }
    }
    const isDarkMode = localStorage.getItem("darkMode") === "enabled";
    applyDarkMode(isDarkMode);
    darkModeToggle.addEventListener("click", () => {
        const isDark = body.classList.toggle("dark-mode");
        elementsToToggle.forEach(el => el.classList.toggle("dark-mode"));
        localStorage.setItem("darkMode", isDark ? "enabled" : "disabled");
        applyDarkMode(isDark);
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("#contact-form form");
    const nameInput = form.querySelector('input[name="name"]');
    const emailInput = form.querySelector('input[name="email"]');
    const messageInput = form.querySelector('textarea[name="message"]');
    form.addEventListener("submit", function (event) {
        event.preventDefault();
        document.querySelectorAll(".error-message").forEach(e => e.remove());
        let isValid = true;
        if (nameInput.value.trim() === "") {
            showError(nameInput, "Name is required.");
            isValid = false;
        }
        if (!validateEmail(emailInput.value.trim())) {
            showError(emailInput, "Enter a valid email address.");
            isValid = false;
        }
        if (messageInput.value.trim() === "") {
            showError(messageInput, "Message cannot be empty.");
            isValid = false;
        }
        if (isValid) {
            submitForm();
        }
    });
    function validateEmail(email) {
        const re = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        return re.test(email);
    }
    function showError(input, message) {
        const error = document.createElement("p");
        error.className = "error-message text-red-500 mt-1 text-sm";
        error.textContent = message;
        input.parentNode.appendChild(error);
    }
    function submitForm() {
        const formData = new FormData(form);
        fetch("https://jsonplaceholder.typicode.com/posts", {
            method: "POST",
            body: formData,
        })
        .then(response => response.json())
        .then(data => {
            showPopup("Success! Your message has been sent.", "success");
            form.reset(); // Reset form fields
        })
        .catch(error => {
            showPopup("Error! Something went wrong.", "error");
        });
    }
    function showPopup(message, type) {
        const popup = document.createElement("div");
        popup.className = `popup-message ${type === "success" ? "bg-green-500" : "bg-red-500"} text-white p-3 fixed top-10 right-10 rounded shadow-lg`;
        popup.textContent = message;

        document.body.appendChild(popup);
        setTimeout(() => {
            popup.remove();
        }, 3000);
    }
});

document.addEventListener("DOMContentLoaded", function () {
    const hamburgerBtn = document.getElementById("hamburgerBtn");
    const navMenu = document.getElementById("navMenu");
    hamburgerBtn.addEventListener("click", function () {
        navMenu.classList.toggle("show");
    });
});
