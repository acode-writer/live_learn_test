<?php

namespace App\Dao;

class CardDAO extends Manager {

    public function __construct()
    {
        $this->setTableName("card");
        $this->setClassName("Card");
    }
    public function add($data){}
    public function update($data){
        $sql = "";
        $attributes = [];
        $this->executeUpdate($sql,$attributes);
    }
}