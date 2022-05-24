// Scrolling Effect
$(window).on("scroll", function() {
    if($(window).scrollTop()) {
          $('nav').addClass('green');
    }

    else {
          $('nav').removeClass('green');
    }
})
// end navbar