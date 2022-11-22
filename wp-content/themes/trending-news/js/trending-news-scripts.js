jQuery(document).ready(function () {

var featuredSwiperOne = new Swiper(".boldnews-featured-slider-one", {
      spaceBetween: 20,
      slidesPerView:1,
       autoplay: {
          delay: 5000,
          disableOnInteraction: false,
      },
        pagination: {
            el: ".walkerpress-slider-pagination",
            clickable: true,
        },
        navigation: {
          nextEl: '.walkerpress-slide-next',
          prevEl: '.walkerpress-slide-prev',
          clickable: true,
        },
        breakpoints: {
        480: {
          slidesPerView: 1,
        },
        768: {
          slidesPerView: 1,
        },
        1024: {
          slidesPerView: 1,
        },
        1180: {
          slidesPerView: 1,
        },
      }   
  });


var focusTickerSwiper = new Swiper(".trendingnews-ticker-news", {
    spaceBetween: 20,
    slidesPerView:1,
        pagination: {
          el: ".focusnews-pagination",
          clickable: true,
        },
         autoplay: {
          delay: 2500,
          disableOnInteraction: false,
        },
        navigation: {
          nextEl: '.ticker-news-next',
          prevEl: '.ticker-news-prev',
          clickable: true,
      },
      breakpoints: {
        480: {
          slidesPerView: 1,
        },
        768: {
          slidesPerView: 2,
        },
        1024: {
          slidesPerView: 3,
        },
        1180: {
          slidesPerView: 4,
        },
      }
  });

});
