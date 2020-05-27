$(document).ready(() => { 
  $('.gallery-itens').click(e => {
    let id_produto = $(e.target).closest('.gallery-itens').attr('id');
    window.location = '/product?id_produto='+ id_produto;
  })
})