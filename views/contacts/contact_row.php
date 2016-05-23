<? /** @var \models\ContactsModel $contact $contact */?>
<tr>
    <td>
        <img class="profile-picture profile-picture-default profile-picture-small" src="<?php echo $contact->photo; ?>" />
    </td>
    <td><?php echo $contact->name; ?></td>
    <td><?php echo $contact->email; ?></td>
    <td><?php echo $contact->phone; ?></td>
    <td>
        <a href="#" class="text-warning"><i class="fa fa-heart-o"></i></a>
        <a class="edit-contact" data-id="<?php echo $contact->id; ?>" href="javascript:void(0);" data-toggle="modal" data-target="#contact-form">
            <i class="fa fa-pencil"></i>
        </a>
        <a data-name="<?php echo $contact->name; ?>" data-id="<?php echo $contact->id; ?>" href="javascript:void(0);" data-toggle="modal" data-target="#delete-modal" class="delete-contact text-danger">
            <i class="fa fa-trash-o"></i>
        </a>
    </td>
</tr>
