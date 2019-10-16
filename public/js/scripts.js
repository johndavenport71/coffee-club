$('document').ready(function(){
    $('#nav-toggle').click(function(){
        toggleNav();
    });//end toggle function
    
    if($('main').hasClass('new')) {
        $('form input:not([type=submit])').blur(validate);
    }

    if($('main').hasClass('sign-up')) {
        var inputs = $('form input:not([type=submit])');
        inputs.focus(hideLabel);
        $.each(inputs, function() {
            if(inputs.val() > 0) {
                $(this).prev().fadeOut(0);
            }
        });
    }
    initButton();
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
    label.fadeOut(100);
}// end hideLabel func

function validate() {
    var icon = $(this).next();
    var input = $(this).val();
    hideMe(icon);
    if(input == '') {
        showMe(icon, 'cancel');
        $(this).prev().fadeIn(250);
    } else if($(this).attr('type') == 'email') {
        validateEmail(input, icon); 
    } else { 
        showMe(icon, 'check_circle');
    }
}//end validate func

function showMe(elem, content) {
  if(content == 'cancel') {
    elem.css({'color':'#E81E28', 'opacity':1});
  } else {
    elem.css({'color':'#1BCFAE', 'opacity':1});
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

function validateEmail(value, icon) {
    $.post('../public/check-email.php', {email: value}, (function(data){
        if(!data) {
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
    }));
}//end validateEmail func

function initButton() {
  $('.more').click(popUp);
}

function popUp() {
  var display = $(this).next();
  var pos = $(this).position();
  display.css({
    'position':'absolute',
    'top':pos.top + 33,
    'left':pos.left - 178,
    'display':'flex'
  });
  $(this).after(display);
  display.fadeIn();
  $(display).mouseleave(function(){
      display.fadeOut();
  });
}