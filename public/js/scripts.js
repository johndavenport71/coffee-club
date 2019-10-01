$('document').ready(function(){
    $('#nav-toggle').click(function(){
        toggleNav();
    });//end toggle function
    //$('form input:not([type=submit])').blur(validate);
});

function toggleNav() {
    if($('nav').hasClass('open')) {
        $('nav').removeClass('open');
        $('nav').animate({'height':'48px'}, 250, function(){
            $('.login a').css('display', 'none');
        });
    } else {
        $('nav').animate({'height':'200px'}, 250);
        $('nav').addClass('open');
        $('.login a').css('display', 'block');
    }
}

/*
function validate() {
    var value = $(this).val();

    if(value == '') {
        $(this).css('background-color','red');
    } else if ($(this).attr('id') == 'email') {
        var nextElem = $(this).next();
        console.log(nextElem.nodeName);
        if(nextElem.class == 'error') {
            console.log('error');
            nextElem.hide;
        } else {
            $.post('../public/check-email.php', {email: value}, function(data){
                if(data == 1) {
                    
                    $('form #email').after('<p class="error">An account with this email already exists</p>');
                }
            });
        }
    } else {
        $(this).css('background-color','green');
    }
}*/