<?php
namespace saso\classes\models;
use saso\classes\base;

abstract class DataMapperAbstract{
    protected $_pdo;
    
    public function __construct(){
        $this->_pdo = base\PdoManager::getPdo();
    }
    protected function _decorate(\PDOStatement $stmt){
        $stmt->setFetchMode(\PDO::FETCH_CLASS, static::MODEL_CLASS);
        return $stmt;    
    }
}

