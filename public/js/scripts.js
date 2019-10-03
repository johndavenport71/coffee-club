$('document').ready(function(){
    $('#nav-toggle').click(function(){
        toggleNav();
    });//end toggle function
    $('form input:not([type=submit])').blur(validate);
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
}//end toggleNav func

function validate() {
    var icon = $(this).next();
    var input = $(this).val();
    hideMe(icon);
    if(input == '') {
        showMe(icon, 'cancel');
    } else if($(this).attr('type') == 'email') {
        if(!validateEmail(input)) {
            showMe(icon, 'check_circle');
            console.log('good email');
        } else {
            showMe(icon, 'cancel');
            var nextEl = icon.next();
            if($(nextEl).hasClass('error')) {
                $(nextEl).remove();
            }
            icon.after('<span class="error">A user with this email already exists.</span>');
        }
    } else { 
        showMe(icon, 'check_circle');
    }
}//end validate func

function showMe(elem, content) {
  if(content == 'cancel') {
    elem.css({'color':'red', 'opacity':1});
  } else {
    elem.css({'color':'green', 'opacity':1});
  }
  elem.addClass('show');
  elem.text(content);
}//end showMe func

function hideMe(elem) {
  elem.removeClass('show');
  elem.addClass('hide');
  elem.animate({'opacity':0}, 0, function(){
    $(this).text('');
  });
}//end hideMe func

function validateEmail(value) {
    console.log(value);
    
    $.post('../public/check-email.php', {email: value}).done(function(data){
        console.log(data);
        var result = data.result;
        return result;
    });
}//end validateEmail func