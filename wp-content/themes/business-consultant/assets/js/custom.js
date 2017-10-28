/* Start Menu */
(function ($) {
    $.fn.menumaker = function (options) {
        var cssmenu = jQuery(this),
            settings = jQuery.extend({
                title: "",
                format: "dropdown",
                sticky: false
            }, options);
        return this.each(function () {
            cssmenu.prepend('<div id="menu-button">' + settings.title + '</div>');
            jQuery(this).find("#menu-button").on('click', function () {
                jQuery(this).toggleClass('menu-opened');
                var mainmenu = jQuery(this).next('ul');
                if (mainmenu.hasClass('open')) {
                    mainmenu.removeClass('open');
                } else {
                    mainmenu.addClass('open');
                    if (settings.format === "dropdown") {
                        mainmenu.find('ul').show();
                    }
                }
            });
            cssmenu.find('li ul').parent().addClass('has-sub');
            multiTg = function () {
                cssmenu.find(".has-sub").prepend('<span class="submenu-button"></span>');
                cssmenu.find('.submenu-button').on('click', function () {
                    jQuery(this).toggleClass('submenu-opened');
                    if (jQuery(this).siblings('ul').hasClass('open')) {
                        jQuery(this).siblings('ul').removeClass('open').hide();
                    } else {
                        jQuery(this).siblings('ul').addClass('open').show();
                    }
                });
            };
            if (settings.format === 'multitoggle') multiTg();
            else cssmenu.addClass('dropdown');
            if (settings.sticky === true) cssmenu.css('position', 'fixed');
            if (settings.sticky === true) cssmenu.css('position', 'fixed');
            if (settings.sticky === true) cssmenu.css('position', 'fixed');
            if (settings.sticky === true) cssmenu.css('position', 'fixed');
            resizeFix = function () {
                if (jQuery(window).width() > 767) {
                    cssmenu.find('ul').show();
                }
                if (jQuery(window).width() <= 767) {
                    cssmenu.find('ul').removeClass('open');
                }
            };
            resizeFix();
            return jQuery(window).on('resize', resizeFix);
        });
    };
})(jQuery);
(function ($) {
    jQuery(document).ready(function () {
        jQuery(document).ready(function () {
            jQuery("#cssmenu").menumaker({
                title: "<span></span><span></span><span></span><span></span><span></span><span></span>",
                format: "multitoggle"
            });
            jQuery("#cssmenu").prepend("");
        });
        if(!jQuery('div').hasClass('heading-layer')){
            jQuery('#business_consultant_navigation').addClass('fixed-header');
            jQuery('.blog-wrapper').css('padding-top','40px');
        }
        if(jQuery('div').hasClass('transparent')){
            jQuery('#business_consultant_navigation').removeClass('fixed-header');
            jQuery('.blog-wrapper').css('padding-top','0');
        }
        if(jQuery('#business_consultant_navigation').hasClass('fixed-header') && jQuery('#business_consultant_navigation').hasClass('fixed-header')){
            jQuery('#business_consultant_navigation').parent().css('height',jQuery('#business_consultant_navigation').css('height'));
        }
        /** Set Position of Sub-Menu **/
        var wapoMainWindowWidth = jQuery(window).width();
        jQuery('#cssmenu ul ul li').mouseenter(function () {
            var subMenuExist = jQuery(this).find('.sub-menu').length;
            if (subMenuExist > 0) {
                var subMenuWidth = jQuery(this).find('.sub-menu').width();
                var subMenuOffset = jQuery(this).find('.sub-menu').parent().offset().left + subMenuWidth;
                if ((subMenuWidth + subMenuOffset) > wapoMainWindowWidth) {
                    jQuery(this).find('.sub-menu').removeClass('submenu-left');
                    jQuery(this).find('.sub-menu').addClass('submenu-right');
                } else {
                    jQuery(this).find('.sub-menu').removeClass('submenu-right');
                    jQuery(this).find('.sub-menu').addClass('submenu-left');
                }
            }
        });
        if(!jQuery('div').hasClass('heading-layer')){
            jQuery('#business_consultant_navigation').css('position','relative');
        }
        if(jQuery('div').hasClass('transparent')){
            jQuery('#business_consultant_navigation').css('position','absolute');
        }
    });
})(jQuery);
jQuery(window).scroll(function () {
    if (jQuery(window).scrollTop() > 150) {
        jQuery('#business_consultant_navigation').addClass('fixed-header');
    } else {
        jQuery('#business_consultant_navigation').removeClass('fixed-header');
        //if title hide then change menu
        if(!jQuery('div').hasClass('heading-layer')){
            jQuery('#business_consultant_navigation').addClass('fixed-header');
        }
        if(jQuery('div').hasClass('transparent')){
            jQuery('#business_consultant_navigation').removeClass('fixed-header');
        }
    }
});
/*Services-tab-left Menu end*/
jQuery(document).ready(function () {
    /*carousel start*/
    /*carousel end*/
    /*Nav Active start*/
    jQuery('#cssmenu ul li a').click(function (e) {
        // e.preventDefault(); //prevent the link from being followed
        jQuery('#cssmenu ul li a').removeClass('active');
        jQuery(this).addClass('active');
    });
    /*Nav Active end*/
    /*Nav Active start*/
    jQuery('.active-menu ul li').click(function (e) {
        // e.preventDefault(); //prevent the link from being followed
        jQuery('.active-menu ul li').removeClass('active');
        jQuery(this).addClass('active');
    });
    /*Nav Active end*/
    /*Services tab start*/
    jQuery("#services-tabs a").click(function (e) {
        e.preventDefault();
        jQuery(this).tab('show');
    });
    jQuery("#services-tabs a").click(function (e) {
        e.preventDefault();
        jQuery(this).tab('show');
    });
    /*Services tab end*/
    /*Services-tab-left Menu start*/
    jQuery(".services-tabs-left li a").click(function () {
        jQuery(".selected-option").text(jQuery(this).text());
    });
    /*Services-tab-left Menu end*/
    /*skills-progress-bars start*/
    /*skills-progress-bars end*/
    jQuery('.skill').each(function () {
        jQuery(this).appear(function () {
            jQuery(this).find('.count-bar').animate({
                width: jQuery(this).attr('data-percent')
            }, 3000);
            var percent = jQuery(this).attr('data-percent');
            jQuery(this).find('.count').html('<span>' + percent + '</span>');
        });
    });
});
jQuery(window).load(function(){
    jQuery('.preloader').delay(400).fadeOut(500);
});