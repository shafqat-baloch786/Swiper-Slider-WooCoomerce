document.addEventListener('DOMContentLoaded', function() {
	
    // Initializing Swiper
    const mainSwiper = new Swiper('.swiper-container', {
        loop: true, // set loop to false if you do not want infinitie slider
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        thumbs: {
            swiper: {
                el: '.swiper-thumbs',
                slidesPerView: 4,
                spaceBetween: 5,
                freeMode: true,
                watchSlidesVisibility: true,
                watchSlidesProgress: true,
            },
        },
    });
	
});