<?php

/**
 * Person Class
 * Provides access to the "Person" database table.
 *
 *
 */
class Service
{
    /**
     *  Three columns,
     *
     *      - The ID
     *      - The person name
     *      - The person's favourite colour.
     */

    public $person;
    public function __construct()
    {
              $this->person=new Person();
    }

    public function getUsers()
    {
        return $this->person->getUsers();
    }
    public function insertUser($user){
        $this->person->insertUser($user);

    }
    public function getUser($id){
       return $this->person->getUser($id);
    }
    public function updateUser($user){
        $this->person->updateUser($user);
    }
    public function deleteUser($id){

        $this->person->deleteUser($id);
    }

}
