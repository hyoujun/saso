<?php
namespace saso\classes\models;
use \saso\classes\models;

class QuantityLogMapper extends DataMapperAbstract{
    const MODEL_CLASS = '\saso\classes\models\QuantityLog';
    
    //---------更新系クエリ---------
    public function insert(models\QuantityLog $data){
        $modelClass = self::MODEL_CLASS;
        
        $stmt = $this->_pdo->prepare('
            INSERT INTO QuantityLog(
                  detaleCode
                , fluctuation
                , inventoryFlag
                , changeAt
            )
            VALUES (
                  :detaleCode
                , :fluctuation
                , :inventoryFlag
                , :changeAt
            )
        ');
        if(! $data->isValid()){
            throw new \Exception('invalid');
        }
        $stmt->bindValue(':detaleCode', $data->detaleCode, \PDO::PARAM_STR);
        $stmt->bindValue(':fluctuation', $data->fluctuation, \PDO::PARAM_INT);
        $stmt->bindValue(':inventoryFlag', $data->inventoryFlag, \PDO::PARAM_INT);
        $stmt->bindValue(':changeAt', $data->changeAt->format('Y-m-d H:i:s'), \PDO::PARAM_STR);
        
        $stmt->execute();
    }
    public function delete($detaleCode){
        $modelClass = self::MODEL_CLASS;
        
        $stmt = $this->_pdo->prepare('
            DELETE FROM QuantityLog
                WHERE detaleCode = ?
        ');
        $stmt->bindValue(1, $detaleCode, \PDO::PARAM_STR);
        
        $stmt->execute();
    }
    //---------参照系クエリ---------
    public function existInventoryFlag($detaleCode){
        $stmt = $this->_pdo->prepare('
            SELECT inventoryFlag
                FROM QuantityLog
                WHERE detaleCode = ? AND inventoryFlag = 1
        ');
        $stmt->bindValue(1, $detaleCode, \PDO::PARAM_STR);
        $stmt->execute();
        
        $this->_decorate($stmt);
        return $stmt->fetch();
    }
    public function sumListByDetaleCode($detaleCode){
        $stmt = $this->_pdo->prepare('
            SELECT detaleCode, SUM(fluctuation) AS sum
                FROM QuantityLog
                WHERE detaleCode = ?
        ');
        $stmt->bindValue(1, $detaleCode, \PDO::PARAM_STR);
        $stmt->execute();
        
        $this->_decorate($stmt);
        return $stmt->fetch();
    }
    public function findAllHistory($detaleCode){
        $stmt = $this->_pdo->prepare('
            SELECT *
                FROM QuantityLog
                WHERE detaleCode = ?
                ORDER BY changeAt
        ');
        $stmt->bindValue(1, $detaleCode, \PDO::PARAM_STR);
        $stmt->execute();
        
        return $this->_decorate($stmt);
    }
}

