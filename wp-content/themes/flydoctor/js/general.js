'use strict';

jQuery(function ($) {

    var $window = $(window),
        $body = $('body'),
        screenWidth = $window.width(),
        screenHeight = $window.height(),
        scrollBarWidth = 0;

    $window.on('resize orientationchange', function () {
        screenWidth = $window.width();
        screenHeight = $window.height();
    });

    $window.on('load', function () {
        $window.resize();
    });

    window.fly = {
        init: function () {
            this.resizedEvent(400); // Trigger Event after Window is Resized
            this.ieWarning(); // IE<9 Warning
            this.disableEmptyLinks(); // Disable Empty Links
            this.checkBoxes(); // Styled CheckBoxes, RadioButtons
            this.scrollToAnchors(); // Smooth Scroll to Anchors
            this.scrollBarWidthDetection(); // ScrollBar Width Detection
            this.videoPlayerRatio(); // Video Player Ratio
            this.fullHeight(); // Set full window height to the Blocks
            this.dropDownMenu(); // Dropdown Menu in Header
            this.stickyMenu(); // Sticky Menu
            this.lastItemLabel('.post-meta'); // Post Meta First Item
            this.parallaxInit(); // Parallax
            this.headerSearchForm(); // Search Form in Header
            this.postListMasonry(); // PostList Masonry Layout
            this.lightBox(); // LightBox (swipeBox)
            this.owlSlidersInit(); // Owl Carousels
            this.selectsInit(); // Select2
        },

        resizedEvent: function (delay) {
            var resizeTimerId;

            $window.on('resize orientationchange', function () {
                clearTimeout(resizeTimerId);

                resizeTimerId = setTimeout(function () {
                    $window.trigger('resized');
                }, delay);
            });
        },

        ieWarning: function () {
            if ($('html').hasClass('oldie')) {
                $body.empty().html('Please, Update your Browser to at least IE9');
            }
        },

        disableEmptyLinks: function () {
            $('[href="#"], .btn.disabled').on('click', function (event) {
                event.preventDefault();
            });
        },

        checkBoxes: function () {
            $.fn.customInput = function () {
                $(this).each(function () {
                    var container = $(this),
                        input = container.find('input'),
                        label = container.find('label');

                    input.on('update', function () {
                        input.is(':checked') ? label.addClass('checked') : label.removeClass('checked');
                    })
                        .trigger('update')
                        .on('click', function () {
                            $('input[name=' + input.attr('name') + ']').trigger('update');
                        });
                });
            };

            $('.checkbox, .radio').customInput();
        },

        scrollToAnchors: function () {
            $('.anchor[href^="#"]').on('click', function (e) {
                e.preventDefault();
                var speed = 1,
                    boost = 1,
                    offset = 80,
                    target = $(this).attr('href'),
                    currPos = parseInt($window.scrollTop(), 10),
                    targetPos = target != "#" && $(target).length == 1 ? parseInt($(target).offset().top, 10) - offset : currPos,
                    distance = targetPos - currPos;

                boost = Math.abs(distance * boost / 1000);

                $("html, body").animate({scrollTop: targetPos}, parseInt(Math.abs(distance / (speed + boost)), 10));
            });

			$(window).on('load', function() {
				var url = window.location.href;

				var anchor = url.split('#')[1];

				if (anchor) {
					var speed = 1,
						boost = 1,
						offset = 80,
						target = '#' + anchor,
						currPos = parseInt($window.scrollTop(), 10),
						targetPos = target != "#" && $(target).length == 1 ? parseInt($(target).offset().top, 10) - offset : currPos,
						distance = targetPos - currPos;

					boost = Math.abs(distance * boost / 1000);

					$("html, body").animate({scrollTop: targetPos}, parseInt(Math.abs(distance / (speed + boost)), 10));
				}
			});
        },

        scrollBarWidthDetection: function () {
            $body.append('<div class="scrollbar-detect"><span></span></div>');

            var scrollBarDetect = $('.scrollbar-detect');

            scrollBarWidth = scrollBarDetect.width() - scrollBarDetect.find('span').width();

            scrollBarDetect.remove();
        },

        videoPlayerRatio: function () {
            function setRatio() {
                $('.video-player').each(function () {
                    var self = $(this),
                        ratio = self.attr('width') && self.attr('height') ? self.attr('width') / self.attr('height') : 16 / 9,
                        videoWidth = self.width();

                    self.css({height: parseInt(videoWidth / ratio)});

                    self.trigger('videoPlayerRatioSet');
                });
            }

            setRatio();

            $window.on('resized', function () {
                setRatio();
            });
        },

        fullHeight: function () {
            var blocks = $('.full-height');

            $window.on('resized', function () {
                blocks.css({
                    height: screenHeight
                });
            });
        },

        dropDownMenu: function () {
            var navContainer = $('.nav-menu'),
                navItems = navContainer.find('li'),
                animationIn = 'growIn',
                animationOut = 'growOut',
                breakPoint = 767;

            $window.on('load', function () {
                navContainer.removeClass('invisible');
                navContainer.addClass('loaded');
            });

            navContainer.find('ul').addClass('hidden');
            navItems.has('ul').addClass('parent');
            navItems.children('a').addClass('menu-link');

            navItems.hover(function () {
                if (screenWidth > breakPoint) {
                    var self = $(this),
                        dropdown = self.children('ul');

                    if (dropdown.length) {
                        dropdown.removeClass('hidden');

                        // Move Dropdown (Level 2+) to the left side of its Parent if it doesn't fit to screen
                        var dropdownWidth = dropdown.outerWidth(),
                            dropdownOffset = parseInt(dropdown.offset().left, 10);

                        if (dropdownWidth + dropdownOffset > screenWidth - 5) {
                            dropdown.addClass('left');
                        }
                        /////////////////////////////////////////////////////////////////

                        if (Modernizr.cssanimations) {
                            dropdown.addClass(animationIn + ' animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
                                dropdown.removeClass(animationIn + ' animated hidden');
                                dropdown.off('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend');
                            });
                        }
                    }
                }
            }, function () {
                if (screenWidth > breakPoint) {
                    var self = $(this),
                        dropdown = self.children('ul');

                    if (Modernizr.cssanimations) {
                        dropdown.removeClass(animationIn + ' animated hidden').addClass(animationOut + ' animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
                            dropdown.removeClass(animationOut + ' animated').addClass('hidden');
                            dropdown.off('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend');
                        });
                    } else {
                        dropdown.addClass('hidden');
                    }
                }
            });

            // Dropdown Menu for Mobiles
            var menuButton = $('.hamburger').find('a'),
                isAnimating = false;

            menuButton.on('click', function () {
                if (isAnimating) return;

                isAnimating = true;

                if (navContainer.hasClass('active')) {
                    menuButton.parent().removeClass('active');
                    navContainer.removeClass('active');
                    $body.removeClass('overflow-hidden');

                    if (Modernizr.csstransitions && screenWidth < breakPoint + 1) {
                        navContainer.one('webkitTransitionEnd mozTransitionEnd MSTransitionEnd otransitionend transitionend', function () {
                            isAnimating = false;
                            navContainer.off('webkitTransitionEnd mozTransitionEnd MSTransitionEnd otransitionend transitionend');

                            navContainer.css({
                                height: 'auto'
                            });
                        });
                    } else {
                        isAnimating = false;

                        navContainer.css({
                            height: 'auto'
                        });
                    }

                } else {
                    menuButton.parent().addClass('active');
                    navContainer.addClass('active');
                    $body.addClass('overflow-hidden');

                    navContainer.css({
                        height: screenHeight - navContainer.parent().outerHeight()
                    });

                    $window.on('resized', function () {
                        navContainer.css({
                            height: screenHeight - navContainer.parent().outerHeight()
                        });
                    });

                    if (Modernizr.csstransitions && screenWidth < breakPoint + 1) {
                        navContainer.one('webkitTransitionEnd mozTransitionEnd MSTransitionEnd otransitionend transitionend', function () {
                            isAnimating = false;
                            navContainer.off('webkitTransitionEnd mozTransitionEnd MSTransitionEnd otransitionend transitionend');
                        });
                    } else {
                        isAnimating = false;
                    }
                }
            });

            navContainer.find('a.menu-link').on('click', function (event) {
                if (screenWidth < breakPoint + 1) {
                    var self = $(this),
                        menuItem = self.parent('li'),
                        dropdown = self.siblings('ul');

					if (menuItem.hasClass('parent')) {
						event.preventDefault();
					}

                    if (menuItem.hasClass('active')) {
                        dropdown.addClass('hidden');
                        menuItem.removeClass('active');
                    } else {
                        dropdown.removeClass('hidden');
                        menuItem.addClass('active');
                    }
                }
            });

            $window.on('resized', function () {
                if (screenWidth > breakPoint) {
                    navItems.removeClass('active');
                    navItems.find('ul').addClass('hidden');
                    $body.removeClass('overflow-hidden');

                    setTimeout(function () {
                        navContainer.css({
                            height: 'auto'
                        });
                    }, 0);
                }
            });
        },

        stickyMenu: function () {
            $.fn.stickyMenu = function () {
                var stickyMenu = $(this),
                    stickyHeight = stickyMenu.outerHeight(true),
                    becomeSticky = stickyMenu.data('become-sticky'),
                    stickyOffset = stickyMenu.offset().top,
                    scrollTop = $window.scrollTop(),
                    placeholder = $('<div/>'),
                    isPlaceholder = stickyMenu.is('[data-no-placeholder]') ? false : true;

                $window.on('load', function () {
                    stickyHeight = stickyMenu.outerHeight(true);
                });

                function runStickyMenu() {
                    scrollTop = $window.scrollTop();

                    if (isPlaceholder) {
                        placeholder.css({
                            height: stickyHeight
                        });
                    }

                    if (scrollTop > stickyHeight + stickyOffset) {
                        stickyMenu.addClass('sticky');
                        if (isPlaceholder) placeholder.insertAfter(stickyMenu);
                    } else {
                        stickyMenu.removeClass('sticky');
                        if (isPlaceholder) placeholder.detach();
                    }

                    if (scrollTop > stickyHeight + stickyOffset + becomeSticky) {
                        stickyMenu.addClass('sticky-moved');
                    } else {
                        stickyMenu.removeClass('sticky-moved');
                    }
                }

                $window.on('load scroll resized', function () {
                    runStickyMenu();
                });
            };

            $('[data-become-sticky]').each(function () {
                $(this).stickyMenu();
            });
        },

        lastItemLabel: function (selector) {
            $(selector).each(function () {
                $(this).children().eq(-1).addClass('last');
            });
        },

        parallaxInit: function () {
            $.fn.parallax = function () {
                var parallax = $(this),
                    xPos = parallax.data('parallax-position') ? parallax.data('parallax-position') : 'center',
                    speed = parallax.data('parallax-speed') || parallax.data('parallax-speed') == 0 ? parallax.data('parallax-speed') : .1;

                function runParallax() {
                    var scrollTop = $window.scrollTop(),
                        offsetTop = parallax.offset().top,
                        parallaxHeight = parallax.outerHeight();

                    if (scrollTop + screenHeight > offsetTop && offsetTop + parallaxHeight > scrollTop) {
                        var yPos = parseInt((offsetTop - scrollTop) * speed, 10);

                        parallax.css({
                            backgroundPosition: xPos + ' ' + yPos + 'px'
                        });
                    }
                }

                if (screenWidth > 1000 && !parallax.hasClass('parallax-disabled')) {
                    parallax.css({
                        backgroundAttachment: 'fixed'
                    });
                    runParallax();
                }
                $window.on('scroll', function () {
                    if (screenWidth > 1000 && !parallax.hasClass('parallax-disabled')) {
                        parallax.css({
                            backgroundAttachment: 'fixed'
                        });
                        runParallax();
                    }
                });
                $window.on('resized', function () {
                    if (screenWidth > 1000 && !parallax.hasClass('parallax-disabled')) {
                        parallax.css({
                            backgroundAttachment: 'fixed'
                        });
                        runParallax();
                    } else {
                        parallax.css({
                            backgroundPosition: '50% 0',
                            backgroundAttachment: 'scroll'
                        });
                    }
                });
            };

            $('.parallax').each(function () {
                $(this).parallax();
            });
        },

        headerSearchForm: function () {
            var form = $('.form-search-header'),
                formButton = $('.form-search-open');

            formButton.on('click', function () {
                form.toggleClass('active');
            });

            $body.on('click', function (event) {
                var element = $(event.target);

                if (!element.hasClass('form-search-header') && !element.hasClass('form-search-open') && !element.closest('.form-search-header').length) {
                    form.removeClass('active');
                }
            });

            $window.on('keydown', function (event) {
                if (event.keyCode === 27) {
                    form.removeClass('active');
                }
            });
        },

        postListMasonry: function () {
            var postlist = $('.postlist-masonry');

            if (!postlist.length) return false;

            postlist.find('.article').eq(0).addClass('grid-sizer');

            postlist.masonry({
                itemSelector: '.article',
                masonry: {
                    columnWidth: '.grid-sizer'
                }
            });

            postlist.imagesLoaded().progress(function () {
                postlist.masonry('layout');
            });

            $('.video-player').on('videoPlayerRatioSet', function () {
                postlist.masonry('layout');
            });

            $window.on('resized', function () {
                postlist.masonry('layout');
            });
        },

        lightBox: function () {
            $('.swipebox, .swipebox-video').swipebox({
                removeBarsOnMobile: false,
                autoplayVideos: true,
                selector: '.swipebox, .swipebox-video'
            });
        },

        owlSlidersInit: function () {
            // Slider on Gallery Post Type
            $('.post-slider').owlCarousel({
                singleItem: true,
                navigation: true,
                navigationText: ['', ''],
                pagination: true
            });

            // Related Posts Slider
            $('.related-posts-slider').owlCarousel({
                items: 3,
                itemsDesktop: [1359, 3],
                itemsDesktopSmall: [1229, 2],
                itemsTablet: [767, 2],
                itemsMobile: [479, 1],
                navigation: false,
                navigationText: false,
                pagination: false
            });

            // Related Posts Slider
            $('.related-posts-slider2').owlCarousel({
                items: 4,
                itemsDesktop: [1359, 4],
                itemsDesktopSmall: [1229, 3],
                itemsTablet: [767, 2],
                itemsMobile: [479, 1],
                navigation: true,
                navigationText: false,
                pagination: false
            });

            // Instagram Slider
            $('.instagram-slider').owlCarousel({
                items: 9,
                itemsDesktop: [1599, 7],
                itemsDesktopSmall: [1229, 6],
                itemsTablet: [991, 5],
                itemsMobile: [767, 3],
                navigation: false,
                navigationText: false,
                pagination: false
            });

            // Twitter Slider
            $('.twitter-slider').owlCarousel({
                singleItem: true,
                navigation: true,
                navigationText: ['', ''],
                pagination: false
            });
        },

        selectsInit : function() {
			$('.select2, .fly-form-contact .select-field').select2({
				minimumResultsForSearch: Infinity
			});
		}
    };

    fly.init();
});

