    // Carousel
    const slides = document.querySelectorAll('.carousel-slide');
    let currentIndex = 0;

    document.getElementById('nextBtn').addEventListener('click', () => {
        slides[currentIndex].classList.replace('opacity-100', 'opacity-0');
        currentIndex = (currentIndex + 1) % slides.length;
        slides[currentIndex].classList.replace('opacity-0', 'opacity-100');
    });

    document.getElementById('prevBtn').addEventListener('click', () => {
        slides[currentIndex].classList.replace('opacity-100', 'opacity-0');
        currentIndex = (currentIndex - 1 + slides.length) % slides.length;
        slides[currentIndex].classList.replace('opacity-0', 'opacity-100');
    });

    setInterval(() => {
        slides[currentIndex].classList.replace('opacity-100', 'opacity-0');
        currentIndex = (currentIndex + 1) % slides.length;
        slides[currentIndex].classList.replace('opacity-0', 'opacity-100');
    }, 5000);