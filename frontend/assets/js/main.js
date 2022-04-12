$(document).ready(function() {
    setTimeout(function(){
        $('body').addClass('loaded');
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


  $('.burger-icons').click(function(){
    $(this).toggleClass('open');
    $('.burger-slide').toggleClass('open');
  });
  $('.buger-close ').click(function(){
    $('.burger-slide, .burger-icons').removeClass('open');
    
  });
  $('.burger-nav-list li a').click(function(){
    $('.burger-slide').removeClass('open');
  });
 







   $(window).bind('scroll', function () {
    var windowSize = $(window).width();
    if (windowSize > 0) {
      if ($(this).scrollTop() > 0) {
        $('header, .dropdown-content').addClass('fixed');
      } else {
        $('header, .dropdown-content').removeClass('fixed');
      }
    }
    return false;
  });


    $(document).on('click', 'a[href^="#"]', function(e) {
      e.preventDefault();
      $('html, body').animate({
          scrollTop: $($.attr(this, 'href')).offset().top
      }, 500);
  });







 
 
    
})


