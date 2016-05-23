<table class="table contacts-table">
    <tbody>
    <?php
    if (!empty($contacts))
    {
        foreach ($contacts as $contact)
        {
            require 'contact_row.php';
        }
    }
    else { ?>
        <tr>
            <td colspan="10" class="no-contacts">You currently do not have any contacts to display.</td>
        </tr>
    <?php } ?>
    </tbody>
</table>
