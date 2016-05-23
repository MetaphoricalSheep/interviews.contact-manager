$(document).ready(function() {
    $(document).on('click', '.favorite-contact', function() {
        alert('hit');
        var id = $(this).data('id');
        window.location.replace('/contacts/' + id + '/favorite');
    });
});
