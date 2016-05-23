$(document).ready(function() {
    $(document).on('click', '.favorite-contact', function() {
        var id = $(this).data('id');
        window.location.replace('/contacts/' + id + '/favorite');
    });
});
