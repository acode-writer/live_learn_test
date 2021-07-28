<?php
namespace App\Dao;

use PDO;

abstract class Manager implements IDao {
    private $pdo = null;
    private $tableName; 
    private $className;

    private function getConnexion()
    {
        $databasename = "live_learn_test";
        $username = "someone";
        $password = "someone";
        if($this->pdo == null){
            try {
                $this->pdo = new \PDO("mysql:host=localhost;dbname=$databasename",$username,$password);
                $this->pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE,\PDO::FETCH_ASSOC);
            } catch (\PDOException $e) {
                die("Database connection error");
            }
        }
    }

    private function closeConnexion()
    {
        if($this->pdo !== null) {
            $this->pdo->closeConnexion();
        }
    }
    public function executeUpdate(string $sql,array $attributes)
    {
        $this->getConnexion();
        $query = $this->pdo->prepare($sql);
        $query->execute($attributes);
        $data = [];
        foreach ($query as $value) {
            
        }
        $this->closeConnexion();
        return $data;
    }
    public function executeSelect(string $sql,array $attributes=null)
    {
        $this->getConnexion();
        if($attributes) {
            $query = $this->pdo->prepare($sql);
            $query->execute($attributes);
        }else{
            $query = $this->pdo->query($sql);
        }
        $data = [];
        foreach ($query as $value) {
            $data[] = new $this->className($value);
        }
        $this->closeConnexion();
        return $data;
    }

    public function delete(int $id){
        if(is_int($id)){
            $this->getConnexion();
            $sql = "delete * from $this->tableName where id = :id";
            $query = $this->pdo->prepare($sql);
            $query->bindValue(":id", $id);
            $query->exec();
        }
    }
   
    public function findAll(){
        $sql = "select from * $this->tableName";
        return $this->executeSelect($sql);
    }
    public function findById(int $id){
        if(is_int($id)){
            $sql = "select * from $this->tableName where id = :id";
            $attributes = ["id" => $id];
            $data = $this->executeSelect($sql,$attributes);
            return count($data) > 0 ? $data[0] : [];
        }
    }

    public function setTableName(string $tableName) : self {
        $this->tableName = $tableName;
        return $this;
    }
    public function setClassName(string $className) : self {
        $this->className = $className;
        return $this;
    }

}