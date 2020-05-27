$(document).ready(() => {
    $('#tab1').fadeIn();

    /* Specialization click */
    $('.pro-links a').click((e) => {
        let target = $(e.target).attr('href');
        e.preventDefault();

        if(target == '#tab1') {
            $('#tab2').fadeOut();
            $('#tab3').fadeOut();
            $(target).fadeIn();
        } else if(target == '#tab2') {
            $('#tab1').fadeOut();
            $('#tab3').fadeOut();
            $(target).fadeIn();
        } else {
            $('#tab1').fadeOut();
            $('#tab2').fadeOut();
            $(target).fadeIn();
        }
    })

    /* Img click */
    $('.product-img a img').click((e) => {
        let target = $(e.target).attr('src');
        e.preventDefault();
        $('.img-center').attr('src', target);
    })
})