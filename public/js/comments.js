$(document).on('click', 'button.comment', function(e){
    $('#all-comments').html('');
    e.preventDefault();
    let postId = $(this).attr('postId');
    let curr = $(this);

    $.ajax({
        url: '/comments/' + postId,
        data: { '_token': curr.find('input').val()} ,
        method: "GET"
    }).done(function(response) {
        $('#title').attr('post-id', postId);
        $('#title').html(response.post.title);
        $('.modal-body').html(response.post.body);
        if (response.post.file != null) {
            $('.modal-body').append('<img src="' + response.post.file + '" alt="" class="img-fluid picture">');
        }
        if (response.comments.length == 0) {
            $('#all-comments').html('<h3 class="center">Here nothing to show...</h3>');
        }
        else {
            $('#all-comments').html('');
            $.each(response.comments, function(key, value) {
                $('#all-comments').append(
                    '<div class="row m-3 comment-body"><div class="media"><img class="rounded-circle mr-3" width="40" src="/images/nophoto_n.png" alt="noImage"><div class="media-body"><h5 class="mt-0">' + value.name + '</h5><p class="full-text">' + value.comment + '</p><p href="' + value.user_id + '" class="reply">Reply</p></div></div></div>'
                );
            });
        }
    });
});
