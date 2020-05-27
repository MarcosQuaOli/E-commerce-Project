$(document).ready(() => {
    let left = 0;

    sliderInterval();

    $(window).resize(() => {
        left = 0;
        $('.women__menu__gallery, .men__menu__gallery').css('left', '-'+left+'%');
    })

    function sliderInterval() {
        let interval = setInterval(function() {
            if(window.innerWidth < 768) {
                nextSlide(100, 300)
            } else if(window.innerWidth > 768 && window.innerWidth < 992) {
                nextSlide(48, 144)
            } else {
                nextSlide(35, 70)
            }
        }, 3000);
    }

    function nextSlide(element, val) {
        left += element;
        $('.women__menu__gallery, .men__menu__gallery').css('left', '-'+left+'%');

        if(left == val) {
            left = 0;
            $('.women__menu__gallery, .men__menu__gallery').css('left', '-'+left+'%');
        }
    }
})