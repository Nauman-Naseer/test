$(function(){

    $('.navbar-header').click(function(){
        $('.main_menu').toggleClass('menu_fix');
    });

    $(window).scroll(function () {
        if ($(this).scrollTop() > 70) {
            $('header').addClass('menu_fix');
        } else {
            $('header').removeClass('menu_fix');
        }
    });


});