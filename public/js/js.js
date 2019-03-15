// active sidebar
$.each($('.sidebarlink'), function() {
    $(this).removeClass('active');
    if (location.pathname.toLowerCase().indexOf($(this).html().toLowerCase()) > -1) {
        $(this).addClass('active');
    }
});
