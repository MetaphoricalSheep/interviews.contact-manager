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

    /**
     * Deletes the specified contact
     * 
     * @param int $id
     */
    public function deleteContact($id)
    {
        $contact = ContactsModel::find($id);
        $contact->delete();
        $this->redirect('/contacts');
    }

    /**
     * @param array $post
     */
    public function postContact($post)
    {
        $contact = new \models\ContactsModel(
            [
                'name' => $post['name'],
                'email' => $post['email'],
                'phone' => $post['phone'],
            ]
        );
        
        if (!empty($post['id'])) 
        {
            $contact->id = $post['id'];
        }
        
        $contact->save();
        $this->redirect('/contacts');
    }

    /**
     * Toggle the favorite status of a contact
     * 
     * @param int $id
     */
    public function favorite($id)
    {
        die('hit');
    }
}
