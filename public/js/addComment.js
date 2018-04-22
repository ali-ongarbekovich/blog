$(document).on('click', 'p.reply', function(e){
    e.preventDefault();
    let userId = $(this).attr('href');
    let user = $(this);
    $('#whome').val(userId);
    $('#commentBody').val(user.parent().find('h5').text() + ', ');
    $('#commentBody').focus();
});
