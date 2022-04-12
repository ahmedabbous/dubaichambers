jQuery(document).ready(function ($) {
    var lang = '', next = '', prev = '', isRTL = false;
    if ($('html').attr('lang') === 'ar') {
        lang = 'ar';
        next = 'التالي';
        prev = 'السابق';
        isRTL = true;
    } else {
        lang = 'en';
        next = 'Next';
        prev = 'Previous';
        isRTL = false;
    }

    // Loader
    function loader(_success) {
        var obj = document.querySelector('.loader'),
            inner = document.querySelector('.preloader_inner'),
            page = document.querySelector('body');
        obj.classList.add('show');
        page.classList.remove('show');
        var w = 0,
            t = setInterval(function () {
                w = w + 1;
                inner.textContent = w + '%';
                if (w === 100) {
                    obj.classList.remove('show');
                    page.classList.add('show');
                    clearInterval(t);
                    w = 0;
                    if (_success) {
                        return _success();
                    }
                }
            }, 30);
    }

    setTimeout(function () {
        $('body').addClass('loaded');
        AOS.init({
            once: true,
            disable: function () {
                var maxWidth = 800;
                return window.innerWidth < maxWidth;
            }
        });
    }, 500);
    loader();


    //burger menu
    $('.megamenu-icons').click(function () {
        $(this).toggleClass('open');
    });
    //fixed header
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


    //Increase Decrease font size
    $.fn.fontResize = function (options) {
        var increaseCount = 0;
        var self = this;
        var changeFont = function (element, amount) {
            var baseFontSize = parseInt(element.css('font-size'), 10);
            var baseLineHeight = parseInt(element.css('line-height'), 10);
            element.css('font-size', (baseFontSize + amount) + 'px');
            element.css('line-height', (baseLineHeight + amount) + 'px');
        };
        options.increaseBtn.on('click', function (e) {
            e.preventDefault();
            if (increaseCount === 3) {
                return;
            }
            self.each(function (index, element) {
                changeFont($(element), 1);
            });
            increaseCount++;
        });
        options.decreaseBtn.on('click', function (e) {
            e.preventDefault();
            if (increaseCount === 0) {
                return;
            }
            self.each(function (index, element) {
                changeFont($(element), -1);
            });
            increaseCount--;
        });
    }
    $('body,h1,h2,h3,h4,h5,h6,p,ul,ol,a,input').fontResize({
        increaseBtn: $('#increase-font'),
        decreaseBtn: $('#decrease-font')
    });

    //Handle theme colors
    function getCookie(cname) {
        var name = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }

    function setCookie(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        var expires = "expires=" + d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }


    var themeColor = getCookie('themeColor');
    if (themeColor) {
        $('.theme-handle').removeClass('selected');
        $('body').removeClass('theme-blue theme-blind theme-night');
        $('#' + themeColor).addClass('selected');
        $('body').addClass('theme-' + themeColor);
    } else {
        $('theme-handle-blue').addClass('selected');
        $('body').addClass('theme-blue')
    }
    $('.theme-handle').on('click', function () {
        var id = $(this).attr('id');
        setCookie("themeColor", id, 1000);
        $('.theme-handle').removeClass('selected');
        $('body').removeClass('theme-blue theme-blind theme-night');
        $(this).addClass('selected');
        $('body').addClass('theme-' + id);
    });


    //reset settings
    $('#reset-settings').on('click', function () {
        setTimeout(function () {
            $('#decrease-font').trigger('click');
            $('#decrease-font').trigger('click');
            $('#decrease-font').trigger('click');
        });
        $('.theme-handle').removeClass('selected');
        $('body').removeClass('theme-blue theme-blind theme-night');
        $('#blue').addClass('selected');
        $('body').addClass('theme-blue');
        setCookie("themeColor", 'blue', 1000);
        var iframe = document.getElementsByClassName('goog-te-banner-frame')[0];
        if (!iframe) return;
        var innerDoc = iframe.contentDocument || iframe.contentWindow.document;
        var restore_el = innerDoc.getElementsByTagName("button");
        for (var i = 0; i < restore_el.length; i++) {
            if (restore_el[i].id.indexOf("restore") >= 0) {
                restore_el[i].click();
                var close_el = innerDoc.getElementsByClassName("goog-close-link");
                close_el[0].click();
                return;
            }
        }

    });

    //Old IE
    if (window.ActiveXObject !== undefined) {
        if (!window.XMLHttpRequest || !document.querySelector || !document.addEventListener || !window.atob) {
            alert('To see our website in better preview, Please Update your browser to the latest version');
        }
    }
    console.log(navigator.appVersion);
    if (navigator.appVersion.indexOf('Edg') !== -1) {
        var currentVersionOfEdge = getSecondPart(navigator.appVersion);
        var firt2ChartInVersion = currentVersionOfEdge.substring(0, 3);
        var EdgeVersion = Number(firt2ChartInVersion);
        if (EdgeVersion < 75) {
            alert('To see our website in better preview, Please Update your browser to the latest version');
        }
    }
    if (navigator.appVersion.indexOf('Edge') !== -1) {
        var currentVersionOfEdge = getSecondPart(navigator.appVersion);
        var firt2ChartInVersion = currentVersionOfEdge.substring(0, 3);
        var EdgeVersion = Number(firt2ChartInVersion);
        if (EdgeVersion < 75) {
            alert('To see our website in better preview, Please Update your browser to the latest version');
        }
    }

    function getSecondPart(str) {
        return str.split('Edg/')[1];
    }

    //owl carousel multiple column
    function owlCarouselMultiColumns(selector, items, Columns) {
        var el = $('.' + selector);
        var carousel;
        var carouselOptions = {
            rtl: isRTL,
            margin: 30,
            nav: true,
            dots: false,
            navText: [
                "<i class='fi-arrow-left' data-toggle='tooltip'></i>",
                "<i class='fi-arrow-right' data-toggle='tooltip'></i>",
            ],
            slideBy: 'page',
            responsive: {
                0: {
                    items: 1,
                    rows: 1
                },
                767: {
                    items: 1,
                    rows: 1
                },
                1199: {
                    items: 2,
                    rows: Columns
                },
                1499: {
                    items: items,
                    rows: Columns
                }
            }
        };
        var viewport = function () {
            var width;
            if (carouselOptions.responsiveBaseElement && carouselOptions.responsiveBaseElement !== window) {
                width = $(carouselOptions.responsiveBaseElement).width();
            } else if (window.innerWidth) {
                width = window.innerWidth;
            } else if (document.documentElement && document.documentElement.clientWidth) {
                width = document.documentElement.clientWidth;
            } else {
                console.warn('Can not detect viewport width.');
            }
            return width;
        };

        var severalRows = false;
        var orderedBreakpoints = [];
        for (var breakpoint in carouselOptions.responsive) {
            if (carouselOptions.responsive[breakpoint].rows > 1) {
                severalRows = true;
            }
            orderedBreakpoints.push(parseInt(breakpoint));
        }
        if (severalRows) {
            orderedBreakpoints.sort(function (a, b) {
                return b - a;
            });
            var slides = el.find('[data-slide-index]');
            var slidesNb = slides.length;
            if (slidesNb > 0) {
                var rowsNb;
                var previousRowsNb = undefined;
                var colsNb;
                var previousColsNb = undefined;
                var updateRowsColsNb = function () {
                    var width = viewport();
                    for (var i = 0; i < orderedBreakpoints.length; i++) {
                        var breakpoint = orderedBreakpoints[i];
                        if (width >= breakpoint || i == (orderedBreakpoints.length - 1)) {
                            var breakpointSettings = carouselOptions.responsive['' + breakpoint];
                            rowsNb = breakpointSettings.rows;
                            colsNb = breakpointSettings.items;
                            break;
                        }
                    }
                };

                var updateCarousel = function () {
                    updateRowsColsNb();
                    if (rowsNb != previousRowsNb || colsNb != previousColsNb) {
                        var reInit = false;
                        if (carousel) {
                            carousel.trigger('destroy.owl.carousel');
                            carousel = undefined;
                            slides = el.find('[data-slide-index]').detach().appendTo(el);
                            el.find('.fake-col-wrapper').remove();
                            reInit = true;
                        }

                        var perPage = rowsNb * colsNb;
                        var pageIndex = Math.floor(slidesNb / perPage);
                        var fakeColsNb = pageIndex * colsNb + (slidesNb >= (pageIndex * perPage + colsNb) ? colsNb : (slidesNb % colsNb));
                        var count = 0;
                        for (var i = 0; i < fakeColsNb; i++) {
                            var fakeCol = $('<div class="fake-col-wrapper"></div>').appendTo(el);
                            for (var j = 0; j < rowsNb; j++) {
                                var index = Math.floor(count / perPage) * perPage + (i % colsNb) + j * colsNb;
                                if (index < slidesNb) {
                                    slides.filter('[data-slide-index=' + index + ']').detach().appendTo(fakeCol);
                                }
                                count++;
                            }
                        }
                        previousRowsNb = rowsNb;
                        previousColsNb = colsNb;
                        if (reInit) {
                            carousel = el.owlCarousel(carouselOptions);
                        }
                    }
                };

                $(window).on('resize', updateCarousel);
                updateCarousel();
            }
        }
        carousel = el.owlCarousel(carouselOptions);
    }

    owlCarouselMultiColumns('banner-slide', 1, 1)
    owlCarouselMultiColumns('home-media-all-list', 2, 2)
    owlCarouselMultiColumns('home-service-list', 4, 2);
    owlCarouselMultiColumns('home-resources-list', 3, 2)
    owlCarouselMultiColumns('home-news-list', 2, 2)
    owlCarouselMultiColumns('home-events-list', 2, 2)
    owlCarouselMultiColumns('home-photos-list', 2, 2)
    owlCarouselMultiColumns('home-chamber-tv-list', 2, 2)
    owlCarouselMultiColumns('home-initiatives-list', 3, 1)
    owlCarouselMultiColumns('footer-logos', 6, 1)
    //add title to carousel arrows
    $('.owl-next').attr('title', next);
    $('.owl-prev').attr('title', prev);
    //search
    $('.search-open').click(function () {
        $('.advance-search').addClass('active');
    });
    $('.search-close').click(function () {
        $('.advance-search').removeClass('active');
    });
    //burger menu
    $('.megamenu-icons').click(function () {
        $(this).toggleClass('open');
        $('.global-menu').addClass('active');
        $('.global-menu-list').addClass('active');
    });
    $('.menu-close').click(function () {
        $('.global-menu').removeClass('active');
        $('.megamenu-icons').removeClass('open');
        $('.global-menu-list').removeClass('active');
    });
    $('.global-menu-wrap .level-three').each(function (index) {
        if ($(this).find('.sup-sub-nav-list').children().length == 0) {
            $(this).remove();
        }
    });

    //accessibility
    $('.accessibility-open').click(function () {
        $('.accessibility-option').addClass('active');
    });
    $('.accessibility-close').click(function () {
        $('.accessibility-option').removeClass('active');
    });

    //remove status field in careers form
   $('#wpforms-8224-field_44-container').remove();

});

