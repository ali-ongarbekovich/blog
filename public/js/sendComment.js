$(document).on('submit', '#send', function(e){
    e.preventDefault();
    let postId = $('#title').attr('post-id');
    let whom = $('#whome').val();
    let comment = $('#commentBody').val();
    console.log('sended');
    $.ajax({
        url: '/comment',
        data: { '_token': $('#send').find('input').val(), 'post_id' : postId, 'whom' : whom, 'comment' : comment} ,
        method: "POST"
    }).done(function(response) {
        console.log(response);
        $.each(response, function(key, value) {
            $('#all-comments').append(
                 '<div class="row m-3 comment-body"><div class="media"><img class="rounded-circle mr-3" width="40" src="/images/nophoto_n.png" alt="noImage"><div class="media-body"><h5 class="mt-0">' + value.name + '</h5><p class="full-text">' + value.comment + '</p><p href="' + value.user_id + '" class="reply">Reply</p></div></div></div>'
            );
        });
        $('#commentBody').val(' ');
    });
});
