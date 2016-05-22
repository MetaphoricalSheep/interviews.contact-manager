<?php

namespace models;

class BaseModel
{
    /**
     * Fetches all records from db
     * 
     * @return array
     */
    public static function getAll()
    {
        $list = [];
        $db = \Database::getInstance();
        $stmt = $db->query('SELECT * FROM contacts');

        foreach($stmt->fetchAll() as $contact) 
        {
            $list[] = new ContactsModel($contact->id, $contact->name, $contact->email, $contact->phone, $contact->photo);
        }

        return $list;
    }

    /**
     * Fetches a specific record from db
     *
     * @param int $id   The primary key of the record
     * @return ContactsModel
     */
    public static function find($id)
    {
        $db = \Database::getInstance();
        $id = intval($id);
        $stmt = $db->prepare('SELECT * FROM contacts WHERE id=:id LIMIT 1');
        $stmt->bindParam('id', $id);
        $stmt->execute();

        $contact = $stmt->fetch();

        return new ContactsModel($contact->id, $contact->name, $contact->email, $contact->phone, $contact->photo);
    }

    /**
     * Fetches all records where field matches value
     *
     * @param string $field    The field you want to query
     * @param int $value       The value of the records you want to retrieve
     * @return array
     */
    public static function getBy($field, $value)
    {
        $list = [];
        $db = \Database::getInstance();
        $stmt = $db->prepare(sprintf('SELECT * FROM contacts WHERE %s=:val', $field));
        $stmt->bindParam('val', $value);
        $stmt->execute();
        
        foreach ($stmt->fetchAll() as $contact)
        {
            $list[] = new ContactsModel($contact->id, $contact->name, $contact->email, $contact->phone, $contact->photo);
        }
        
        return $list;
    }
}
