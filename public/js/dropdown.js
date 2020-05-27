$(document).ready(() => {
    dropdownHover('.department', $('.department__dropdown'));
    dropdownHover($('.dropdown-link').eq(0), $('.dropdown').eq(0));
    dropdownHover($('.dropdown-link').eq(1), $('.dropdown').eq(1));
    
    dropdownClick('.dropdown-link', 0, $('.dropdown').eq(0));
    dropdownClick('.dropdown-link', 1, $('.dropdown').eq(1));

    function dropdownClick(link, number, ul) {
        $(link).eq(number).click(() => {
            if(window.innerWidth < 768){
                ul.slideToggle(400);

                if($(link).eq(number).find('i').hasClass('fa-arrow-right')) {
                    $(link).eq(number).find('i').removeClass('fa-arrow-right');
                    $(link).eq(number).find('i').addClass('fa-arrow-down');
                } else {
                    $(link).eq(number).find('i').removeClass('fa-arrow-down');
                    $(link).eq(number).find('i').addClass('fa-arrow-right');
                }
            }           
        })
    }

    function dropdownHover(link, ul) {
        $(link).mouseenter(() => {
            if(window.innerWidth > 768) {
                ul.slideDown(400);
            }         
        })
    
        $(link).mouseleave(() => {
            if(window.innerWidth > 768) {
                ul.slideUp(400);
            }         
        })
    }
})