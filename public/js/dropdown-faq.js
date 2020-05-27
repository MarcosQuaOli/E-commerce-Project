$(document).ready(() => {
    $('.faq button').click((e) => {
       $(e.target).closest('div').find('p').slideToggle();
       $(e.target).find('span').toggleClass('actived');      

        if($(e.target).find('span').hasClass('fa-plus')) {
            $(e.target).find('span').removeClass('fa-plus');
            $(e.target).find('span').addClass('fa-minus');
        } else {
            $(e.target).find('span').removeClass('fa-minus');
            $(e.target).find('span').addClass('fa-plus');
        }
    })
})