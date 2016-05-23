<?php 
    require_once 'views/contacts/add.php';
    require_once 'views/contacts/delete.php';
    require_once 'views/sidenav.php'; 

    if (empty($contacts))
    {
        $contacts = [];
    }
?>

<div class="col-md-8">
    <div class="container-fluid">
        <div class="background-header">Favorites</div>
        <?php require 'views/contacts/favorites_table.php'; ?>
        
        <div class="background-header">All Contacts (<?php echo sizeof($contacts) ?>)</div>
        <?php require 'views/contacts/contacts_table.php'; ?>
    </div>
</div>

<?php global $inc_js; $inc_js[] = "/js/contacts/delete.js"; ?>
