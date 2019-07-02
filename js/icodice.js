var serviceSwiper = new Swiper('.services-items',{
    pagination:{
        el: '.swiper-pagination',
        clickable: true
    },
    slidesPerView: 3,
    paginationClickable: true,
    spaceBetween: 30,
    loop:true,
    autoplay: {
        delay: 7000,
        disableOnInteraction: false
    },
    breakpoints:{
        980:{
            slidesPerView: 2,
            spaceBetween: 30
        },
        800:{
            slidesPerView: 1,
            spaceBetween: 30
        },
        600:{
            slidesPerView: 1,
            spaceBetween: 10
        }
    }
});

var reviewSwiper = new Swiper('.review-items',{
    pagination:{
        el: '.swiper-pagination',
        clickable: true
    },
    slidesPerView: 1,
    paginationClickable: true,
    spaceBetween: 30,
    loop:true,
    autoplay: {
        delay: 7000,
        disableOnInteraction: false
    }
});
var awardsSwiper = new Swiper('.awards',{
    slidesPerView: 4,
    spaceBetween: 30,
    loop: true,
    autoplay: {
        delay: 4000,
        disableOnInteraction: false
    },
    speed: 2000,
    breakpoints:{
        1170:{
            slidesPerView: 3,
            spaceBetween: 35
        },
        800:{
            slidesPerView: 2,
            spaceBetween: 20
        },
        600:{
            slidesPerView: 2,
            spaceBetween: 10
        }
    }
});
// Scroll reveal
window.sr = ScrollReveal({duration: 500});
if(window.innerWidth > 600){
    sr.reveal('.services-container');
    sr.reveal('.services__header');
    sr.reveal('.services__header-title');
    sr.reveal('.services__talcum-description');
    sr.reveal('.services__cases');
    sr.reveal('.awards');
    sr.reveal('.review');
    sr.reveal('.services__cases-form');
}
sr.reveal('.footer-menu__col');
sr.reveal('.services__list-item');

