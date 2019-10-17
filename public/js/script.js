
$(document).ready(function(){$('.carousel').carousel({
  wrap: false
  }).on('slid.bs.carousel', function () {
      curSlide = $('.active');
    if(curSlide.is( ':first-child' )) {
       $('.left-indicator').hide();
       return;
    } else {
       $('.left-indicator').show();	  
    }
    if (curSlide.is( ':last-child' )) {
       $('.right-indicator').hide();
       return;
    } else {
       $('.right-indicator').show();	  
    }
  });
  if (screen.width > 1024) {
    AOS.init({
        easing: 'ease-in-out-sine',
        once: true,
    });
} 
$(window).scroll(function() {
    if ($(this).scrollTop() > 100 ) {
        $('.scrolltop:hidden').stop(true, true).fadeIn();
    } else {
        $('.scrolltop').stop(true, true).fadeOut();
    }
});
$(function(){$(".scroll").click(function(){$("html,body").animate({scrollTop:$(".top").offset().top},"1000");return false})})

});

// $(document).scroll(function() {
//   var scrollH = $(window).scrollTop();
//   if (scrollH > 0) {
//       $('header').addClass('sticky');
//       $('#mygradient').addClass('top-gradient');
//   } else {
//       $('header').removeClass('sticky');
//       $('#mygradient').removeClass('top-gradient');
//   }
// });