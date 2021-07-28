<?php
namespace App\Dao;

interface IDao {
    public function add($data);
    public function update($data);
    public function delete(int $id);
    public function findAll();
    public function findById(int $id);
}