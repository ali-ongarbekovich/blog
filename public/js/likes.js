$(document).on('click', 'a.dislike', function(e){
    e.preventDefault();
    let URL = $(this).attr('href');
    let curr = $(this);
    $.ajax({
        url: '/dislike/' + URL,
        data: { '_token': curr.find('input').val()} ,
        method: "POST"
    }).done(function(code) {
        if (code == 1) {
            let amount = parseInt(curr.find('.amount').text());
            curr.attr('href', URL);
            curr.removeClass('dislike').addClass('like');
            curr.find('.amount').html(amount - 1);
            curr.find('svg').attr('data-prefix', 'far');
        }
    });
});

$(document).on('click', 'a.like', function(e){
    e.preventDefault();
    let URL = $(this).attr('href');
    let curr = $(this);
    $.ajax({
        url: '/like/' + URL,
        data: { '_token': curr.find('input').val()} ,
        method: "POST"
    }).done(function(code) {
        if (code == 1) {
            let amount = parseInt(curr.find('.amount').text());
            curr.attr('href', URL);
            curr.removeClass('like').addClass('dislike');
            curr.find('.amount').html(amount + 1);
            curr.find('svg').attr('data-prefix', 'fas');
        }
    });
});
