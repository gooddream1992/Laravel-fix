$(document).ready(function () {
    $("#click_here_sub").click(function () {
        $("#drop_menu_sub").fadeIn(1000);
        $("#drop_menu").slideUp("slow");
        $("#click_here_back").fadeIn(10);
        $("#click_here").fadeOut(10);
    });
    $("#click_here_back").click(function () {
        $("#drop_menu_sub").slideUp(100);
        $("#drop_menu").slideDown("slow");
        $("#click_here_back").fadeOut(100);
        $("#click_here").fadeIn(100);
    });
    $("#click_here").click(function () {
        $(".left_menu_main").removeClass("active");
        return false;
    });

    $(".click_here").click(function () {
        $(".left_menu_main").removeClass("active");
        return false;
    });

    $("#menu-toggle").click(function () {
        $(".left_menu_main").addClass("active");
        return false;
    });


    $(".close").click(function () {
        $(".overlay").removeClass("active");
        $('.overlay').find("*").removeClass("active");
        return false;
    });

    $(".button").click(function () {
        var status_id = $(this).attr('href').split('#');

        $(".overlay").addClass("active");
        $("#" + status_id[1]).addClass("active");

        return false;
    });
});

//
$('.dropdown-menu a.dropdown-toggle').on('click', function (e) {
    if (!$(this).next().hasClass('show')) {
        $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
    }
    var $subMenu = $(this).next(".dropdown-menu");
    $subMenu.toggleClass('show');


    $(this).parents('.dropdown-menu.show').on('hidden.bs.dropdown', function (e) {
        $('.dropdown-submenu .show').removeClass("show");
    });
    return false;
});

//carousel
$(".carousel").swipe({

    swipe: function (event, direction, distance, duration, fingerCount, fingerData) {

        if (direction == 'left')
            $(this).carousel('next');
        if (direction == 'right')
            $(this).carousel('prev');

    },
    allowPageScroll: "vertical"

});

//full screen search form 
//
//$(function () {
//    $('a[href="#full-search"]').on("click", function (event) {
//        event.preventDefault();
//        $("#full-search").addClass("open");
//        $('#full-search > form > input[type="search"]').focus();
//    });
//
//    $("#full-search, #full-search button.close").on("click keyup", function (event) {
//        if (
//                event.target == this ||
//                event.target.className == "close" ||
//                event.keyCode == 27
//                ) {
//            $(this).removeClass("open");
//        }
//    });
//
//    $("form").submit(function (event) {
//        event.preventDefault();
//        return false;
//    });
//});