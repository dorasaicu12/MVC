$(document).ready(function(){
    $('.image-slider').slick({
        
        infinite: true,
        arrows: true,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1000,
        
        draggable: false,
        prevArrow:"<button type='button' class='slick-arrow slick-prev pull-left'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
        nextArrow:"<button type='button' class='slick-arrow slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>",
        dots: true,
    });

  });
  $(document).ready(function(){
    $('.product-list').slick({
        
        infinite: true,
        arrows: true,
        slidesToShow: 3,
        slidesToScroll: 2,
        autoplay: true,
        autoplaySpeed: 1000,
        lazyLoad: 'ondemand',
      
        prevArrow:"<button type='button' class='slick-arrow slick-prev pull-left'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
        nextArrow:"<button type='button' class='slick-arrow slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>",
        dots: false,
    });

  });