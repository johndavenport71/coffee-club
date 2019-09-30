$('document').ready(function(){
    $('#nav-toggle').click(function(){
        toggleNav();
    });
});

function toggleNav() {
    if($('nav').hasClass('open')) {
        $('nav').removeClass('open');
        $('nav').animate({'height':'50px'}, 250, function(){
            $('.login a').css('display', 'none');
        });
    } else {
        $('nav').animate({'height':'200px'}, 250);
        $('nav').addClass('open');
        $('.login a').css('display', 'block');
    }
}