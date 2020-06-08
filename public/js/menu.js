$(document).ready(() => {
    if(window.innerWidth >= 992) {
        $('.btn-dropdown i').removeClass();
    }

    $('.btn__menu').click(() => {
        $('.navbar__menu').slideToggle();
    })

    $(window).resize((e) => {
        if(window.innerWidth >= 992) {
            $('.navbar__menu').css('display', 'flex');
            $('.btn-dropdown i').removeClass();
        } else {
            $('.navbar__menu').css('display', 'none');
            $('.btn-dropdown i').addClass('fas fa-arrow-right');
        }
    })
})