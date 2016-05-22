<?php

namespace controllers;

use models\ContactsModel;

class ContactsController extends Controller
{
    public function index()
    {
        $contacts = ContactsModel::getAll();
        require_once 'views/contacts/index.php';
    }
}
