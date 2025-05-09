document.addEventListener("DOMContentLoaded", function () {
    const animatables = document.querySelectorAll(".animate");

    const observerOptions = {
        root: null,
        rootMargin: "0px 0px 10% 0px",
        threshold: 0.05
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry, index) => {
            if (entry.isIntersecting) {
                if (entry.target.classList.contains("animate")) {
                    entry.target.classList.add("scroll-animation");
                }
            }
        });
    }, observerOptions);

    animatables.forEach((animatable) => observer.observe(animatable));
});


document.addEventListener("DOMContentLoaded", function () {
    const modalCheckbox = document.getElementById("modal");

    modalCheckbox.addEventListener("change", function () {
        if (this.checked) {
            const scrollY = window.scrollY;
            document.body.style.top = `-${scrollY}px`;
            document.body.dataset.scrollY = scrollY;
            document.body.classList.add("modal-open");
        } else {
            const scrollY = parseInt(document.body.dataset.scrollY);
            document.body.style.position = '';
            document.body.style.top = '';
            document.body.style.width = '';
            document.body.classList.remove("modal-open");
            window.scrollTo(0, scrollY);
        }
    });
});


