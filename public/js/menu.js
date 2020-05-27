$(document).ready(() => {
    if(window.innerWidth > 768) {
        $('.nav-menu .dropdown-link i').removeClass();
    }

    $('.btn-menu button').click(() => {
        $('.nav-menu').slideToggle('fast');
    })

    $(window).resize((e) => {
        if(window.innerWidth >= 768) {
            $('.nav-menu').css('display', 'flex');
            $('.nav-menu .dropdown-link i').removeClass();
        } else {
            $('.nav-menu').css('display', 'none');
            $('.nav-menu .dropdown-link i').addClass('fas fa-arrow-right');
        }
    })
})