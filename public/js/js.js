// active sidebar
$.each($('.sidebarlink'), function() {
    $(this).removeClass('active');

    if (location.pathname.toLowerCase().indexOf($(this).html().toLowerCase()) > -1) {
        $(this).addClass('active');
    } else if (location.pathname.toLowerCase() == '/admin/routes' && $(this).html().toLowerCase() == 'users') {
        $(this).addClass('active');
    }
});

// delete button confirmation
$('.deletebtn').on('click', function() {
    return confirm('Are you sure?!');
});

// myalert div
$('.myalert').on('click', function() {
    $('.alert').alert('close');
});
setTimeout(function(){
    $('.alert').alert('close');
}, 2000);
