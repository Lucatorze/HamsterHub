$(function () {
    $('.headerSignIn,.menuSignIn').click(function () {
        $('#popup2').css({
            'visibility': 'visible',
            'opacity': '1'
        });
    });
    $('.close').click(function () {
        $('#popup2').css({
            'visibility': 'hidden',
            'opacity': '0'
        });
    });

    $('.headerSignUp, .menuSignUp').click(function () {
        $('#popup1').css({
            'visibility': 'visible',
            'opacity': '1'
        });
    });
    $('.close').click(function () {
        $('#popup1').css({
            'visibility': 'hidden',
            'opacity': '0'
        });
    });

    var trueMenu = true;

    $('.onClick').click(function () {
        if (trueMenu === true) {
            $('#c-menu--slide-left').fadeIn("slow");
            $('body').addClass('stop-scrolling');
            trueMenu = false;
        }
        else {
            $('#c-menu--slide-left').fadeOut("slow");
            $('body').removeClass('stop-scrolling');
            trueMenu = true;
        }
    });

    $('.menuSignUp, .menuSignIn').click(function(){
        $('#c-menu--slide-left').fadeOut("slow");
        $('body').removeClass('stop-scrolling');
    });

    if (window.innerHeight > document.body.offsetHeight) {
        $('.footer').css({
            'position': 'fixed',
            'bottom': '0'
        })
    }
});


