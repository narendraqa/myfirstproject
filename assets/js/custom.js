/*
 Project Name : Video
 Author Company : Ewebcraft
 Project Date: 5 May, 2016
 Author Website : http://www.ewebcraft.com
 Author Email : ewebcraft@gmail.com
 */
  



$(window).load(function () {
    $('#loader-container').fadeOut("slow");
});

(function ($) {
    "use strict";

    new WOW().init();

    /* Login & signUp form */

    $(".login-toggle").on('click', function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
        $(".user-form").toggleClass("form-open");
    });
    $("#signUp-frm-button").on('click', function () {
        $(".login-form").removeClass("form-active");
        $(".signUp-form").addClass("form-active");
    });
    $("#login-frm-button").on('click', function () {
        $(".signUp-form").removeClass("form-active");
        $(".login-form").addClass("form-active");
    });

    /* Login & signUp form */

    /* Sharing Drop down */

    $(".sharing-drop").on('click', function () {
        $(".sharing-bar").toggleClass("sharing-bar-open");
        $(this).toggleClass('sharing-drop-open');
    });

    /* Sharing Drop down */

    /* Search */

    $(".btn-search-drop").on('click', function () {
        $("#search-form .search-group").toggleClass("search-group-active");
        $(this).toggleClass('btn-search-close');
    });

    /* Search */

    /* Full width carousel */

    $('.video-carousel').owlCarousel({
        // autoplay: true;
        autoplay: true,
        loop: true,
        margin: 10,
        nav: false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 3
            }
        }
    });

    /* Full width carousel */


    /*
     * Replace all SVG images with inline SVG
     */
    jQuery('img.svg').each(function () {
        var $img = jQuery(this);
        var imgID = $img.attr('id');
        var imgClass = $img.attr('class');
        var imgURL = $img.attr('src');

        jQuery.get(imgURL, function (data) {
            // Get the SVG tag, ignore the rest
            var $svg = jQuery(data).find('svg');

            // Add replaced image's ID to the new SVG
            if (typeof imgID !== 'undefined') {
                $svg = $svg.attr('id', imgID);
            }
            // Add replaced image's classes to the new SVG
            if (typeof imgClass !== 'undefined') {
                $svg = $svg.attr('class', imgClass + ' replaced-svg');
            }

            // Remove any invalid XML tags as per http://validator.w3.org
            $svg = $svg.removeAttr('xmlns:a');

            // Check if the viewport is set, if the viewport is not set the SVG wont't scale.
            if (!$svg.attr('viewBox') && $svg.attr('height') && $svg.attr('width')) {
                $svg.attr('viewBox', '0 0 ' + $svg.attr('height') + ' ' + $svg.attr('width'))
            }

            // Replace image with new SVG
            $img.replaceWith($svg);

        }, 'xml');

    });

})(jQuery);


function searchToggle(obj, evt) { 
    $('#header').removeClass('hidden');
    $(".search-rel-video").removeClass('hidden', 500);
    $(".body-overlay").removeClass('hidden', 500);
    $(".search-rel-video").addClass('show', 500);
    $(".body-overlay").addClass('show', 500);
    $('.nav-bg').addClass('search-on');
    $('.search-wrapper .close').css('display', 'block')
    var container = $(obj).closest('.search-wrapper');

    if (!container.hasClass('active')) {
        container.addClass('active');
        //evt.preventDefault();
    } else if (container.hasClass('active') && $(obj).closest('.input-holder').length == 0) {
        container.removeClass('active');
        $('.search-wrapper .close').css('display', 'none')
        $('.nav-bg').removeClass('search-on');
        $(".search-rel-video").addClass('hidden', 500);
        $(".body-overlay").addClass('hidden', 500);
        // clear input
        container.find('.search-input').val('');
        // clear and hide result container when we press close
        container.find('.result-container').fadeOut(100, function () {
            $(this).empty();
        });
    }
}

function submitFn(obj, evt) {
    value = $(obj).find('.search-input').val().trim();

    _html = "Yup yup! Your search text sounds like this: ";
    if (!value.length) {
        _html = "Yup yup! Add some text friend :D";
    } else {
        _html += "<b>" + value + "</b>";
    }

    $(obj).find('.result-container').html('<span>' + _html + '</span>');
    $(obj).find('.result-container').fadeIn(100);

    //evt.preventDefault();
}


function validateForm() {
    var x = $('#srch').val()
    if (x == null || x == "") {
        //alert("Please Type Search Term.");
        return false;
    }
}