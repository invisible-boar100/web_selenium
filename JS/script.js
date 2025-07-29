const burger = document.querySelector('.burger');
const navLink = document.querySelector('nav ul');

burger.classList.remove('active');

burger.addEventListener('click', ()=>{
    navLink.classList.toggle('navback');
    burger.classList.toggle('active');
});



// swiper JS API for best sellers
const swiper = new Swiper('.swiper', {
  // Optional parameters
  direction: 'horizontal',
  loop: false,
  centerInsufficientSlides: true,
  spaceBetween: 30,
  autoplay:{
      delay: 5000
  },
  breakpoints:{
    320:{
        slidesPerView: 1,
    },

    480:{
        slidesPerView: 1,
    },

    640:{
        centeredSlides: false,
        slidesPerView: 2,
    },

    1000:{
        centeredSlides: false,
        spaceBetween: 20,
        loop: true,
        slidesPerView: 4,
    }

  },

  // If we need pagination
  pagination: {
    el: '.swiper-pagination',
  },

  // Navigation arrows
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },

  // And if we need scrollbar
  scrollbar: {
    el: '.swiper-scrollbar',
  },
});


  
//swiper js for brands
const swiper2 = new Swiper('.brandSwiper', {
  // Optional parameters
  direction: 'horizontal',
  loop: true,
  centeredSlides: true,
  spaceBetween: 30,
  autoplay:{
      delay: 5000
  },
  breakpoints:{
      320:{
          slidesPerView: 1,
      },

      480:{
          slidesPerView: 1,
      },

      640:{
          centeredSlides: false,
          slidesPerView: 2,
      },

      1000:{
          centeredSlides: false,
          spaceBetween: 20,
          loop: true,
          slidesPerView: 4,
      }

  },

  // If we need pagination
  pagination: {
    el: '.swiper-pagination',
  },

  // Navigation arrows
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },

  // And if we need scrollbar
  scrollbar: {
    el: '.swiper-scrollbar',
  },
});

