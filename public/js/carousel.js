 // Carousel functionality
 document.addEventListener('DOMContentLoaded', function() {
    // Carousel functionality
    let currentIndex = 0;
    const track = document.querySelector('.carousel-track');
    const slides = document.querySelectorAll('.carousel-item');
    const totalSlides = slides.length;
    let visibleSlides = 1; // Default for mobile

    // Determine visible slides based on screen width
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

    // Update carousel position
    function updateCarousel() {
        const maxIndex = totalSlides - visibleSlides;
        if (currentIndex > maxIndex) {
            currentIndex = maxIndex;
        }
        if (currentIndex < 0) {
            currentIndex = 0;
        }

        const slidePercentage = 100 / visibleSlides;
        track.style.transform = `translateX(-${currentIndex * slidePercentage}%)`;
    }

    // Auto slide functionality
    function autoSlide() {
        currentIndex = (currentIndex + 1) % (totalSlides - visibleSlides + 1);
        updateCarousel();
    }

    // Touch support for mobile swiping
    let touchStartX = 0;
    let touchEndX = 0;

    track.addEventListener('touchstart', e => {
        touchStartX = e.changedTouches[0].screenX;
    });

    track.addEventListener('touchend', e => {
        touchEndX = e.changedTouches[0].screenX;
        handleSwipe();
    });

    function handleSwipe() {
        if (touchEndX < touchStartX - 50) { // Swiped left
            currentIndex = Math.min(totalSlides - visibleSlides, currentIndex + 1);
            updateCarousel();
        }
        if (touchEndX > touchStartX + 50) { // Swiped right
            currentIndex = Math.max(0, currentIndex - 1);
            updateCarousel();
        }
    }

    // Handle window resize
    window.addEventListener('resize', updateVisibleSlides);

    // Initialize
    updateVisibleSlides();

    // Set auto slide interval - adjust timing as needed
    const slideInterval = setInterval(autoSlide, 5000);

    // Pause auto-sliding when user interacts with swipe
    track.addEventListener('touchstart', () => clearInterval(slideInterval));
});