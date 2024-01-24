(function ($) {
  class SlickCarousel {
    constructor() {
      this.initiateCarousel();
    }

    initiateCarousel() {
      $('.posts-carousel').slick({
        autoplay: true,
        autoplaySpeed: 2000,
        slidesToShow: 3,
        slidesToScroll: 1,
        responsive: [
          {
            breakpoint: 768,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 1
            },
          },
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          },
        ]
      });
    }
  }

  new SlickCarousel();
})(jQuery);
