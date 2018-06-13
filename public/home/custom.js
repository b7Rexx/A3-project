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
});


//rating

$(document).ready(function () {
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
                }
            });
            return false;
        });
    });
});