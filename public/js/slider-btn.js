$(document).ready(() => { 
  $('.load a').click(e => {
    e.preventDefault();
    let link = $(e.target).html();
    let dados = $(e.target).attr('href');
    let left = link * 275 / 5 - 165;

    if(left <= 0) {
      left = 0;
    }

    window.location = dados + '&left=-' + left;
  })
})