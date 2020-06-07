$(document).ready(() => {   
    $('.btn-dropdown').click((e) => { 
    
        if($(window).width() < 768) {
            $dropdown = $(e.currentTarget).children('.dropdown__menu');
            $arrow = $(e.currentTarget).find('i');

            console.log($dropdown);
            console.log($arrow);
      
            if($($arrow).hasClass('fa-arrow-right')) {
                $($arrow).removeClass('fa-arrow-right');
                $($arrow).addClass('fa-arrow-down');
            } else {
                $($arrow).removeClass('fa-arrow-down');
                $($arrow).addClass('fa-arrow-right');
            }
      
            $target = $($dropdown).children('.dropdown__menu');

            $($dropdown).slideToggle();
        }    
    })
      
    if(window.innerWidth > 768) {
    
        $('.dropdown__hover').on('mouseenter mouseleave', (e) => {
      
            $target = $(e.currentTarget).find('.dropdown');

            $($target).slideToggle();
             
        });
    }
})