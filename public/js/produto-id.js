$(document).ready(() => { 
  $('.product').click(e => {
    let id_produto = $(e.target).closest('.product').attr('id');
    window.location = '/product?id_produto='+ id_produto;
  })
})