 $(document).ready(function() {
     $(document).on('click', '.delete-contact', function() {
         $("#contact-form").data('id', $(this).data('id'));
     });

     $('#delete-modal').on('hidden.bs.modal', function () {
         /*clear form*/
     })
 });
