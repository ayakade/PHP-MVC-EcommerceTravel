// add class avtive when you're on the page
$(function(){
    $('.menu').on('click',function() {
        $('.menu').removeClass('active');
        $(this).addClass('active');
    });
});
