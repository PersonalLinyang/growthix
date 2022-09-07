'use strict';
$(function(){


  var device = 'pc';
  if ($(window).width() < 620) {
    device = 'sp';
  }

  $(document).on('click', '.menu-trigger , .js-nav-close', function(){
    $('.spnav').toggleClass('active');
    $('.menu-trigger').toggleClass('active');
    $('.js-nav-close').toggleClass('active');
    $('.spheader').toggleClass('active');
  });
  $(document).on('click', '.js-toggle-btn', function(){
    $(this).toggleClass('active');
    var target = $(this).data('target');
    $(target).slideToggle();
  });


  /*
   スムーズスクロール
  ----------------------------*/
  $('a[href*="#"]').click(function() {
      var speed = 400; // ミリ秒
      var href= $(this).attr("href");
      var target = $(href == "#" || href == "" ? 'html' : href);
      var position = target.offset().top;
      var winW = $(window).width();
      var devW = 640;
      if (winW > devW) {
          position = position - 60;
      }
      $('body,html').animate({scrollTop:position}, speed, 'swing');
      return false;
  });

  $(document).on('click', '.js-open-detail', function(){
    $('.modal-content').fadeOut();
    var target = $(this).data('target');
    console.log(target);
    $(target).fadeIn();
  });
  $('.js-close-detail').click(function() {
    $('.modal-content').fadeOut();
  });
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
          $('.gnav-list-wrapper').addClass('fixed_active');
        } else {
          $('.gnav-list-wrapper').removeClass('fixed_active');
        }
    });

  $('.works-slider-handle').click(function(){
    if($(this).hasClass('active')) {
      $(this).removeClass('active');
      $(this).closest('.works-slider').find('.works-slider-inner').slideUp();
    } else {
      $(this).addClass('active');
      $(this).closest('.works-slider').find('.works-slider-inner').slideDown();
    }
  });
});