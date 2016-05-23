<?php

namespace controllers;

use models\ContactsModel;

class ContactsController extends Controller
{
    public function index()
    {
        $contacts = ContactsModel::getAll(['field' => 'name']);
        $favorites = ContactsModel::getBy('favorite', 1);
        $nav = 'contacts';
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
        $contact = new ContactsModel(
            [
                'name' => $post['name'],
                'email' => $post['email'],
                'phone' => $post['phone'],
                'photo' => null,
            ]
        );
        
        if (!empty($post['id'])) 
        {
            $contact->id = $post['id'];
        }

        $targetDir = "/img/photos/";
        $targetFile = $targetDir . basename($_FILES["photo"]["name"]);
        $imageFileType = pathinfo($targetFile, PATHINFO_EXTENSION);

        $check = getimagesize($_FILES["photo"]["tmp_name"]);
        if($check !== false)
        {

            if( $imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg")
            {
                if (move_uploaded_file($_FILES['photo']['tmp_name'], $targetFile)) 
                {
                    $contact->photo = $targetFile;
                }
            }
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
	    $contact = ContactsModel::find($id);
        $contact->favorite = ($contact->favorite) ? FALSE : TRUE;
        $contact->save();
        
        $this->redirect('/contacts');
    }

    /**
     * Search contacts
     * 
     * @param string $keyword
     */
    public function search($keyword)
    {
        $key = '%' . $keyword . '%';
        
        $contacts = ContactsModel::where(
            [
                'name' => [
                    'joiner' => 'OR',
                    'operator' => 'LIKE',
                    'value' => $key
                ],
                'email' => [
                    'joiner' => 'OR',
                    'operator' => 'LIKE',
                    'value' => $key
                ],
                'phone' => [
                    'joiner' => 'OR',
                    'operator' => 'LIKE',
                    'value' => $key
                ],
            ]
        );

        $nav = 'contacts';
        require_once 'views/contacts/index.php';
    }

    /**
     * Display only favorite contacts
     */
    public function favorites()
    {
        $favorites = ContactsModel::getBy('favorite', 1);
        $nav = 'favorites';
        require_once 'views/contacts/index.php';
    }
}
