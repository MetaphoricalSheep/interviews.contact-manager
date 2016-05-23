$(document).ready(function() {
    $(document).on('click', '.delete-contact', function() {
        $("#delete-modal .name").text($(this).data('name'));
        $("#delete-modal").data('id', $(this).data('id'));
    });

    $('#delete-modal').on('hidden.bs.modal', function () {
    });

    $(document).on('click', '#delete-modal .delete', function() {
        var id = $("#delete-modal").data('id');
        window.location.replace('/contacts/'+id+'/delete');
    })
});