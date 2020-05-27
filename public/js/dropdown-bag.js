$(document).ready(() => {
    $('.bag-icon').hover(() => {
        $('.bag-dropdown').slideToggle(400);
    })

    $('.user-drop').hover(() => {
        $('.user-drop ul').slideToggle(400);
    })
})