function animateBg() {
    const bgWithMotions = document.querySelectorAll(".bg-with-motion");

    for (let el of bgWithMotions) {
        let scaleFactor = 8;
        if (el.classList.contains("bg-scale-sm")) {
            scaleFactor = 14;
        }
        const position = window.document.documentElement.scrollTop;
        const scaleValue = 1 + position / (window.innerHeight * scaleFactor);
        el.style.transform = `scale(${scaleValue})`;
    }
}

window.addEventListener("scroll", animateBg);
