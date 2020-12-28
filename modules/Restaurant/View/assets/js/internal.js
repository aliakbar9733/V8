$(function () {
    "use strict";

    $(window).on('load', function (e) {
        //$('body').addClass('loaded');
        $('.loader').fadeOut("slow");
    });

    loadscroler();
    initReservationForm()

    /*Banner Slider Script Code Start*/
    $('.slideshow').owlCarousel({
        items: 1,
        autoplay: 5000,
        singleItem: true,
        navigation: false,
        pagination: false,
        loop: true,
    });
    /*Banner Slider Script Code End*/

    /*About Script Code Start*/
    $('.owl-about').owlCarousel({
        autoplay: true,
        autoplayTimeout: 3000,
        items: 1,
        loop: true,
        navigation: false,
        pagination: false
    });
    /*About Script Code End */

    /*Popular Dishes Script Code Start */
    $('.dish').owlCarousel({
        margin: 20,
        autoplay: true,
        autoplayTimeout: 3000,
        items: 4,
        navigation: false,
        loop: true,
        pagination: false,
        responsive: {
            0: {
                items: 1,
            },
            768: {
                items: 3,
            },
            992: {
                items: 4,
            }
        }
    });
    /*Popular Dishes Script Code End */

    /*Testimonails Script Code Start */
    $('.owl-testi').owlCarousel({
        items: 1,
        loop: true,
        autoplay: true,
        navigation: false,
        slideSpeed: 300,
        singleItem: true,
        pagination: false
    });
    /*Testimonails Script Code Start */

    /*Fun Factor Script Code Start */
    $('.fun-factor').one('inview', function (isInView) {
        if (isInView) {
            $('.number').countTo({
                speed: 3000
            });
        }
    });
    /*Fun Factor Script Code End */

    /* Video Background Script Code Start */
    $(".video-bg").YTPlayer({
        mute: true,
        loop: true,
        showControls: false,
        showYTLogo: false,
        grayscale: 21,
        hue_rotate: 66,
        invert: 16,
        sepia: 12,
        opacity: 11
    });
    /* Video Background Script Code End */

});


/*Function for Add Go to up arrow Start */
function loadscroler() {
    $('body').prepend('<a href="#" class="bottom-top"><i class="icofont icofont-bubble-up"></i></a>');
    var amountScrolled = 300;
    $(window).on('scroll', function () {
        if ($(window).scrollTop() > amountScrolled) {
            $('a.bottom-top').fadeIn('slow');
        } else {
            $('a.bottom-top').fadeOut('slow');
        }
    });
    $('a.bottom-top').on('click', function () {
        $('html, body').animate({
            scrollTop: 0
        }, 700);
        return false;
    });
}

/*Function for Add Go to up arrow End */

/*Function for Reservation form Start */
function initReservationForm() {
    var $reservationForm = $('.reservation-form');
    //validation rules
    var validator = $reservationForm.validate({
        rules: {
            name: {
                required: true,
                maxlength: 256,
                minlength: 2
            },
            email: {
                required: true,
                minlength: 3,
                maxlength: 100,
                email: true
            },
            mobile: {
                required: true,
                maxlength: 12,
                minlength: 10
            },
            date: {
                required: true,
                date: true
            }
        }
    });
    // Set up an event listener for the contact form.
    $reservationForm.on('submit', function (e) {
        // Stop the browser from submitting the form.
        e.preventDefault();
        // Serialize the form data.
        var formData = $reservationForm.serialize();
        // Submit the form using AJAX.
        $.ajax({
            type: 'POST',
            url: $reservationForm.attr('action'),
            data: formData
        })
            .done(function (response) {
                // Set the message text.
                $('#emailSend').show();
                // Clear the form.
                $('#input-name').val('');
                $('#input-email').val('');
                $('#input-mobile').val('');
                $('#input-date').val('');
                $('#input-time').val('');
                $('#input-persons').val('');
                setTimeout(function () {
                    $('#emailSend').hide();
                }, 3000);
            })
            .fail(function (data) {
                // Set the message text.
                $('#emailError').show();
                setTimeout(function () {
                    $('#emailError').hide();
                }, 3000);
            });
    });
}

/*Function for Reservation form End */