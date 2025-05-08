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
