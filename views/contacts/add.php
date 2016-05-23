<div class="floatingContainer">
    <div class="actionButton" data-toggle="modal" data-target="#contact-form"></div>
</div>
<div class="add-button" data-toggle="modal" data-target="#contact-form"></div>

<!--Contact Form-->
<div class="modal fade" id="contact-form" tabindex="-1" role="dialog" aria-labelledby="contact-form-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <img class="profile-picture profile-picture-default profile-picture-large" id="contact-form-photo-display" src="img/default_profile.png" />
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-block">
                            <form action="/contacts" method="post" enctype="multipart/form-data">
                                <input type="hidden" id="contact-form-id" name="id" />
                                <div class="row">
                                    <div class="col-md-5">
                                        <h4 class="card-title">Edit Contact</h4>
                                    </div>
                                    <div class="col-md-7 text-right">
                                        <button type="button" class="btn btn-danger-outline waves-effect" data-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </div>

                                <div class="md-form">
                                    <i class="fa fa-envelope prefix"></i>
                                    <input type="text" id="contact-form-name" name="name" class="form-control">
                                    <label for="contact-form-name">Add a name</label>
                                </div>
                                <div class="md-form">
                                    <i class="fa fa-envelope prefix"></i>
                                    <input type="text" id="contact-form-email" name="email" class="form-control">
                                    <label for="contact-form-email">Add an email</label>
                                </div>

                                <div class="md-form">
                                    <i class="fa fa-lock prefix"></i>
                                    <input type="text" id="contact-form-phone" name="phone" class="form-control">
                                    <label for="contact-form-phone">Add a phone</label>
                                </div>

                                <div>
                                    <label class="btn btn-primary-outline" for="contact-form-photo">
                                        <input id="contact-form-photo" name="photo" type="file" style="display:none;" onchange="$('#upload-file-info').html($(this).val());">
                                        Upload photo
                                    </label>
                                    <span class='' id="upload-file-info"></span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
