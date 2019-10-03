$('document').ready(function(){
    $('#nav-toggle').click(function(){
        toggleNav();
    });//end toggle function
    
    if($('main').hasClass('sign-up')) {
        $('form input:not([type=submit])').blur(validate);
        $('form input:not([type=submit])').focus(hideLabel);
        arrEmails = getMemberEmails();
    }
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

function hideLabel() {
    var label = $(this).prev();
    label.fadeOut(250);
}// end hideLabel func

function validate() {
    var icon = $(this).next();
    var input = $(this).val();
    hideMe(icon);
    if(input == '') {
        showMe(icon, 'cancel');
        $(this).prev().fadeIn(250);
    } else if($(this).attr('type') == 'email') {
        if(validEmail(input)) {
            showMe(icon, 'check_circle');
            var nextEl = icon.next();
            if($(nextEl).hasClass('error')) {
                $(nextEl).remove();
            }
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

function getMemberEmails() {
    $.get('http://localhost/web250/coffee-club/public/check-email.php', function(data) {
        $('form').data(data);
    });
}// end getMemberEmails func

function validEmail(input) {
    var emails = $('form').data();
    var i = 0;
    while(emails[i]) {
        if(emails[i] == input) {
            return false;
        }
        i++;
    }
    //return true if email is not found
    return true;
}

// function validateEmail(value) {
//     console.log(value);
//     var result = '';
//     $.when( $.ajax({
//             url: '../public/check-email.php',
//             method: 'POST',
//             data: {functionname: 'memberEmailExists', arguments: value},
//             dataType: 'json',
//         })
//     ).done(function(data){
//        return data;
//     });
//     // $.post('../public/check-email.php', {email: value}, (function(data){
//     //     console.log(data);
//     //     result = data.result;
//     //     console.log(result);
//     //     returnEmail(result);
//     // }));
// }//end validateEmail func