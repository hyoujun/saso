<?php
namespace saso\classes\models;
use \saso\classes\models;

class SizeMapper extends DataMapperAbstract{
    const MODEL_CLASS = '\saso\classes\models\Size';
    
    //---------更新系クエリ---------
    public function insert(models\Size $data){
        $modelClass = self::MODEL_CLASS;
        
        $stmt = $this->_pdo->prepare('
            INSERT INTO Size(
                  concatId
                , sizeCode
                , sizeName
                , orderNumber
            )
            VALUES (
                  :concatId
                , :sizeCode
                , :sizeName
                , :orderNumber
            )
        ');
        if(! $data->isValid()){
            throw new \Exception('invalid');
        }
        $stmt->bindValue(':concatId', $data->concatId, \PDO::PARAM_STR);
        $stmt->bindValue(':sizeCode', $data->sizeCode, \PDO::PARAM_STR);
        $stmt->bindValue(':sizeName', $data->sizeName, \PDO::PARAM_STR);
        $stmt->bindValue(':orderNumber', $data->orderNumber, \PDO::PARAM_INT);
        
        $stmt->execute();
    }
    public function updateOrderNumber(models\Size $data){
        $modelClass = self::MODEL_CLASS;
        
        $stmt = $this->_pdo->prepare('
            UPDATE Size
                SET orderNumber = :orderNumber
                WHERE concatId = :concatId
                AND sizeCode = :sizeCode
        ');
        if(! $data->isValid()){
            throw new \Exception(invalid);
        }

        $stmt->bindValue(':concatId', $data->concatId, \PDO::PARAM_STR);
        $stmt->bindValue(':sizeCode', $data->sizeCode, \PDO::PARAM_STR);
        $stmt->bindValue(':orderNumber', $data->orderNumber, \PDO::PARAM_INT);

        $stmt->execute();
    }
    
    //---------参照系クエリ---------
    public function findByConcatId($concatId){
        $stmt = $this->_pdo->prepare('
            SELECT *
                FROM Size
                WHERE concatId = ?
                ORDER BY orderNumber
        ');
        $stmt->bindValue(1, $concatId, \PDO::PARAM_STR);
        $stmt->execute();
        
        return $this->_decorate($stmt);
    }
    public function getSizeName($concatId, $sizeCode){
        $stmt = $this->_pdo->prepare('
            SELECT sizeName
                FROM Size
                WHERE concatId = ? AND sizeCode = ?
        ');
        $stmt->bindValue(1, $concatId, \PDO::PARAM_STR);
        $stmt->bindValue(2, $sizeCode, \PDO::PARAM_STR);
        $stmt->execute();
        
        $this->_decorate($stmt);
        return $stmt->fetch();
    }
    public function getLastSizeCode($concatId){
        $stmt = $this->_pdo->prepare('
            SELECT sizeCode
                FROM Size
                WHERE concatId = ?
        ');
        $stmt->bindValue(1, $concatId, \PDO::PARAM_STR);
        $stmt->execute();
        
        $this->_decorate($stmt);
        foreach($stmt as $value){
            $sizeCodeNumeric[] = (int)$value->sizeCode;
        }
        return max($sizeCodeNumeric);
    }

    public function getLastOrderNumber($concatId){
        $stmt = $this->_pdo->prepare('
            SELECT orderNumber
                FROM Size
                WHERE concatId = ?
        ');
        $stmt->bindValue(1, $concatId, \PDO::PARAM_STR);
        $stmt->execute();
        
        $this->_decorate($stmt);
        foreach($stmt as $value){
            $orderNumber[] = $value->orderNumber;
        }
        return max($orderNumber);
    }
}

