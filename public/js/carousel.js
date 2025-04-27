function initCarousel() {
    const track = document.querySelector('.carousel-track');
    const slides = document.querySelectorAll('.carousel-item');

    if (!track || slides.length === 0) {
        console.log('Pas de carousel trouvé.');
        return;
    }

    let currentIndex = 0;
    const totalSlides = slides.length;
    let visibleSlides = 1;

    function updateVisibleSlides() {
        if (window.innerWidth >= 1024) {
            visibleSlides = 3;
        } else if (window.innerWidth >= 768) {
            visibleSlides = 2;
        } else {
            visibleSlides = 1;
        }
        updateCarousel();
    }

    function updateCarousel() {
        const maxIndex = totalSlides - visibleSlides;
        currentIndex = Math.min(Math.max(currentIndex, 0), maxIndex);
        const slidePercentage = 100 / visibleSlides;
        track.style.transform = `translateX(-${currentIndex * slidePercentage}%)`;
    }

    function autoSlide() {
        currentIndex = (currentIndex + 1) % (totalSlides - visibleSlides + 1);
        updateCarousel();
    }

    let touchStartX = 0;
    let touchEndX = 0;

    track.addEventListener('touchstart', e => {
        touchStartX = e.changedTouches[0].screenX;
    });

    track.addEventListener('touchend', e => {
        touchEndX = e.changedTouches[0].screenX;
        if (touchEndX < touchStartX - 50) {
            currentIndex = Math.min(totalSlides - visibleSlides, currentIndex + 1);
            updateCarousel();
        }
        if (touchEndX > touchStartX + 50) {
            currentIndex = Math.max(0, currentIndex - 1);
            updateCarousel();
        }
    });

    window.addEventListener('resize', updateVisibleSlides);

    updateVisibleSlides();
    const slideInterval = setInterval(autoSlide, 5000);

    track.addEventListener('touchstart', () => clearInterval(slideInterval));
}
