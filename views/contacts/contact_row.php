<? /** @var \models\ContactsModel $contact */?>
<tr>
    <td>
        <img class="profile-picture profile-picture-default profile-picture-small" src="<?php echo $contact->photo; ?>" />
    </td>
    <td><?php echo $contact->name; ?></td>
    <td><?php echo $contact->email; ?></td>
    <td><?php echo $contact->phone; ?></td>
    <td>
        <a href="javascript:void(0);" data-id="<?php echo $contact->id; ?>" class="favorite-contact text-warning"><i class="fa fa-heart-o"></i></a>
        <a class="edit-contact" data-id="<?php echo $contact->id; ?>" data-name="<?php echo $contact->name; ?> "data-photo="<?php echo $contact->photo; ?>" data-email="<?php echo $contact->email; ?>" data-phone="<?php echo $contact->phone; ?>" href="javascript:void(0);" data-toggle="modal" data-target="#contact-form">
            <i class="fa fa-pencil"></i>
        </a>
        <a data-name="<?php echo $contact->name; ?>" data-id="<?php echo $contact->id; ?>" href="javascript:void(0);" data-toggle="modal" data-target="#delete-modal" class="delete-contact text-danger">
            <i class="fa fa-trash-o"></i>
        </a>
    </td>
</tr>
