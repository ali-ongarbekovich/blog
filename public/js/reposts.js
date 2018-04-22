$(document).on('click', 'button.repost', function(e){
    e.preventDefault();
    let postId = $(this).attr('pid');
    $('#postal').attr('id-post', postId);
});
