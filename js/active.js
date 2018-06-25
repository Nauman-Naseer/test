jQuery(document).ready(function ($) {

    $('.main_menu li a').click(function() {
        $('.main_menu li a, .category_menu ul li a').removeClass('menu_active');
        $(this).addClass('menu_active');


    });


    $('.category_menu ul li a').click(function() {
        $('.category_menu ul li a').removeClass('menu_active');
        $(this).addClass('menu_active');
    });

  

});