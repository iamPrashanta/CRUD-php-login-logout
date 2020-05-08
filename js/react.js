$('#drop').click(function(){
    clareInput_one();
});


$('#sub').click(function(){
    var data = $('.signupform :input').serializeArray();
    $.post($('.signupform').attr('action'), data, function(infoone){
        $('#signresult').html(infoone);
    });
    //clareInput_one();
});

// $('.signupform').submit(function(){
//     return false;
// });

function clareInput_one(){
    $('.signupform :input[type="text"]').each(function(){
        $(this).val('');
    });
    $('.signupform :input[type="email"]').each(function(){
        $(this).val('');
    });
}

// ------------------------------------------------------

$(document).ready(function(){
    $(window).scroll(function() {
        if ($(window).scrollTop() > 200) {
          $('header').addClass('scroll');
          $('header ul li:nth-child(4)').fadeOut();
          $('header h2').html('devpras.tech');
        } else {
          $('header').removeClass('scroll');
          $('header ul li:nth-child(4)').fadeIn();
          //$('header h2').html('devpras.tech');
        }
    });
});


