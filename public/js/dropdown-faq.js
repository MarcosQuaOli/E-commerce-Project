$(document).ready(() => {
    $('.faq__btn').click((e) => {
       $(e.target).closest('div').find('p').slideToggle();
       $(e.target).find('span').toggleClass('faq__icon--active');      

        if($(e.target).find('span').hasClass('fa-plus')) {
            $(e.target).find('span').removeClass('fa-plus');
            $(e.target).find('span').addClass('fa-minus');
        } else {
            $(e.target).find('span').removeClass('fa-minus');
            $(e.target).find('span').addClass('fa-plus');
        }
    })
})