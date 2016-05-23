<table class="table contacts-table">
    <tbody>
    <?php
    if (!empty($favorites))
    {
        foreach ($favorites as $contact)
        {
            require 'contact_row.php';
        }
    }
    else { ?>
        <tr>
            <td colspan="10" class="no-contacts">You currently do not have any favorites to display.</td>
        </tr>
    <?php } ?>
    </tbody>
</table>
