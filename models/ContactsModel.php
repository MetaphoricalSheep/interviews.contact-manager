<?php

namespace models;

class ContactsModel extends BaseModel
{
    public $id;
    public $name;
    public $email;
    public $phone;
    public $photo;

    function __construct($id=null, $name=null, $email=null, $phone=null, $photo=null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->photo = $photo;
    }
}
