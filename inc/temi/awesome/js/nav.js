/**
 * Created By LeCs.
 * Date: 01/08/2016 17:21
 * #LFG
 * LSyS
 */

var main = function(){
    $('.dropdown').click(function(){
        $(this).siblings().slideToggle(600);
        $(this).children('.fa-caret-down, .fa-caret-up').toggleClass('fa-caret-down fa-caret-up');
    });
    $('.icon-close').click(function(){
        $('.menu').animate({
            left: "-285px"
        }, 600);

        $('body').animate({
            left: "0px"
        }, 600);
    });
    $('.icon-menu').click(function(){
        $('.menu').animate({
            left: "0px"
        }, 600);

        $('body').animate({
            left: "285px"
        }, 600);
    });
};

$(document).ready(main);