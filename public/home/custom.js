//navbar fix top on scroll
$(function () {
    // Check the initial Poistion of the Sticky Header
    var stickyHeaderTop = $('nav').offset().top;
    var checkWidth = $(window).width();
    console.log(checkWidth);
    $(window).scroll(function () {
        if ($(window).scrollTop() > stickyHeaderTop && checkWidth > 975) {
            $('nav').css({position: 'fixed', top: '0', left: '0', width: '100%', 'transition-duration': '500ms'});
            $('nav').addClass('bg-white');
        } else {
            $('nav').css({position: 'relative'});
            $('nav').removeClass('bg-white');
        }
    });
});

//profile-image form control
$(document).ready(function () {
    $('#image-button').on('click', function () {
        $('.profile-image-form').show();
    });

    $('#image-button-close').on('click', function () {
        $('.profile-image-form').hide();
    });
});