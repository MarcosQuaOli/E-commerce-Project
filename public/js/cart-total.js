$(document).ready(() => {
    price();
    total();

    $('.btn-some').click((e) => {   
        e.preventDefault();
        const input = $(e.target).closest('div').find('input');
        let value = input.val();
        value++;

        if(value >= 10) {
            value = 10;
        }

        input.val(value);     
    })

    $('.btn-sub').click((e) => { 
        e.preventDefault();         
        const input = $(e.target).closest('div').find('input');
        let value = input.val();          
        value--;
        
        if(value == 0) {
            value = 1;
        }

        input.val(value);  
    })

    function price() {
        $('.produtos_cart').each(function(index, element) {
            let priceItem = parseInt($(element).find('.price').html());
            let quantidade = $(element).find('.quantidade_produto').html();

            let mult = priceItem * quantidade;

            $(element).find('.re-price').html(mult);
        })
        
    }

    function total() {
        let priceTotal = 0;

        $('.re-price').each(function(index, element) {
            priceTotal += parseInt($(element).html());
        })

        $('.price-total').html(priceTotal);
    }
})