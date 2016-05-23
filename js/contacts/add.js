 $(document).ready(function() {
     $(document).on('click', '.edit-contact', function() {
         $('#contact-form').data('id', $(this).data('id'));
         
         var id = $(this).data('id');
         var name = $(this).data('name');
         var photo = $(this).data('photo');
         var email = $(this).data('email');
         var phone = $(this).data('phone');
         
         if (id) {
             $('#contact-form-id').val(id);
         }
         
         if (name) {
             $('#contact-form-name').val(name).siblings('i, label').addClass('active');
         }
         
         if (photo && photo != '/img/default_profile.png') {
             $('#contact-form-photo').val(photo).siblings('i, label').addClass('active');
         }
         
         if (email) {
             $('#contact-form-email').val(email).siblings('i, label').addClass('active');
         }

         if (phone) {
             $('#contact-form-phone').val(phone).siblings('i, label').addClass('active');
         }
     });

     $('#delete-modal').on('hidden.bs.modal', function () {
         /*clear form*/
     })
 });
