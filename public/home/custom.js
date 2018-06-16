//navbar fix top on scroll
$(function () {
    // Check the initial Poistion of the Sticky Header
    var stickyHeaderTop = $('nav').offset().top;
    var checkWidth = $(window).width();
    // console.log(checkWidth);
    $(window).scroll(function () {
        if ($(window).scrollTop() > stickyHeaderTop && checkWidth > 975) {
            $('.bg-nav').css({position: 'fixed', top: '0', left: '0', width: '100%', 'transition-duration': '500ms'});
            $('.bg-nav').addClass('bg-white');
        } else {
            $('.bg-nav').css({position: 'relative'});
            $('.bg-nav').removeClass('bg-white');
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

// Rating
    //rating color
    var i;
    for (i = 1; i < 38; i++) {
        var Item = $('#rate' + i + '> i');
        var radioItem = $("#rate" + i + "  input:checked").val();

        var j;
        for (j = 0; j < 5; j++) {
            if (j < radioItem) {
                Item.eq(j).css({color: '#FFD700'});
            }
        }
        // console.log(radioItem);
        // Item.eq(radioItem - 1).css({color: 'red'});
        // console.log('NEXT');
    }

    //rating changes
    $(".rate-form").submit(function (e) {
        // return false;
        e.preventDefault();


        $('.rate-submit').on('click', function () {
            var id = $(this).val();
            var value = $('.rate-radio-' + id + ':checked').val();
            console.log(id);
            $.ajax({
                type: "POST",
                url: server._url + '/user/api/rate',
                data: {_token: server._token, id: id, value: value},
                success: function (response) {
                    console.log(response);
                    var appendDiv = '<div class="rate-message alert alert-success"style="position: fixed;top:150px;left:150px"> <i class="fa fa-check"></i> Rating submitted! re-calibration in process !</div>';
                    $('.bg-content').append(appendDiv);
                    setTimeout(function () {
                        $('.rate-message').remove();
                    }, 3000)
                },
                error: function () {
                    alert('Login required');
                }

            });
            return false;
        });
    });


    //add post in user profile
    $('#post-image-button').click(function (e) {
        e.preventDefault();

        var imageform = "<div class=\"input-group mb-2\" id=\"post-image\">\n" +
            "    <div class=\"input-group-prepend\">\n" +
            "        <div class=\"input-group-text\"><i class=\"fa fa-image\"></i></div>\n" +
            "    </div>\n" +
            "    <input type=\"file\" name=\"image[]\" class=\"form-control\" id=\"inlineFormInputGroup\" placeholder=\"image\" multiple>\n" +
            "</div>\n";

        if (!($('.post-form').hasClass('image-post'))) {
            $('.post-form').append(imageform);
            $('.post-form').addClass('image-post');
            $('.post-form').removeClass('video-post');
            $('#post-video').remove();
        }
    });

    $('#post-video-button').click(function (e) {
        e.preventDefault();
        var videoform = "\n" +
            "<div class=\"input-group mb-2\" id=\"post-video\">\n" +
            "    <div class=\"input-group-prepend\">\n" +
            "        <div class=\"input-group-text\"><i class=\"fa fa-video-camera\"></i></div>\n" +
            "    </div>\n" +
            "    <input type=\"text\" name=\"video\" class=\"form-control\" id=\"inlineFormInputGroup\" placeholder=\"video URL : separate urls with comma (,)\">\n" +
            "</div>";


        if (!($('.post-form').hasClass('video-post'))) {
            $('.post-form').append(videoform);
            $('.post-form').addClass('video-post');
            $('.post-form').removeClass('image-post');
            $('#post-image').remove();
        }
    });


    //view post
    $('.view-post > a').on('click', function (e) {
        e.preventDefault();
    });


});