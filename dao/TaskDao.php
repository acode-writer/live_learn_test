<?php
// namespace App\Dao;

class TaskDAO extends Manager  {
    
    public function __construct()
    {
        $this->setTableName("task");
        $this->setClassName("Task");
    }
    public function add($data){

    }
    public function update($data){
        $sql = "";
        $attributes = [];
        $this->executeUpdate($sql,$attributes);
    }
    
}