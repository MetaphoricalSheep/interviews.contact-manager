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
             $('#upload-file-info').text(photo);
             $('#contact-form-photo-display').attr('src', photo);
         }
         
         if (email) {
             $('#contact-form-email').val(email).siblings('i, label').addClass('active');
         }

         if (phone) {
             $('#contact-form-phone').val(phone).siblings('i, label').addClass('active');
         }
     });

     $('#contact-form').on('hidden.bs.modal', function () {
         $('#contact-form-name').val('').siblings('i, label').removeClass('active');
         $('#contact-form-email').val('').siblings('i, label').removeClass('active');
         $('#contact-form-phone').val('').siblings('i, label').removeClass('active');
         $('#upload-file-info').text('');
         $('#contact-form-photo-display').attr('src', '/img/default_profile.png');
     })
 });
