jQuery(document).ready(function() {
    setTimeout(function(){
        jQuery('body').addClass('loaded');
        AOS.init({
            once: true,
            disable: function() {
            var maxWidth = 800;
            return window.innerWidth < maxWidth;
            }
        });
    }, 500);

  loader();
  function loader(_success) {
    var obj = document.querySelector('.loader'),
    inner = document.querySelector('.preloader_inner'),
    page = document.querySelector('body');
    obj.classList.add('show');
    page.classList.remove('show');
    var w = 0,
        t = setInterval(function() {
            w = w + 1;
            inner.textContent = w+'%';
            if (w === 100){
                obj.classList.remove('show');
                page.classList.add('show');
                clearInterval(t);
                w = 0;
                if (_success){
                    return _success();
                }
            }
        }, 30);
    }
   //rellax
   var rellax = new Rellax('.rellax');


  jQuery('.burger-icons').click(function(){
    jQuery(this).toggleClass('open');
    jQuery('.burger-slide').toggleClass('open');
  });
  jQuery('.buger-close ').click(function(){
    jQuery('.burger-slide, .burger-icons').removeClass('open');
    
  });
  jQuery('.burger-nav-list li a').click(function(){
    jQuery('.burger-slide, .burger-icons').removeClass('open');
  });
 







   jQuery(window).bind('scroll', function () {
    var windowSize = jQuery(window).width();
    if (windowSize > 0) {
      if (jQuery(this).scrollTop() > 0) {
        jQuery('header, .dropdown-content').addClass('fixed');
      } else {
        jQuery('header, .dropdown-content').removeClass('fixed');
      }
    }
    return false;
  });


    jQuery(document).on('click', 'a[href^="#"]', function(e) {
      e.preventDefault();
      jQuery('html, body').animate({
          scrollTop: jQuery(jQuery.attr(this, 'href')).offset().top-300
      }, 500);
  });







 
 
    
})


