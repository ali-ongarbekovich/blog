$(document).on('submit', '#doRepost', function(e){
    e.preventDefault();
    let postId = $('#postal').attr('id-post');
    let comment = $('#commentRepost').val();
    $.ajax({
        url: '/repost',
        data: { '_token': $('#send').find('input').val(), 'post_id' : postId, 'comment' : comment} ,
        method: "POST"
    }).done(function(response) {
        $('#repost').modal('hide');
    });
});
