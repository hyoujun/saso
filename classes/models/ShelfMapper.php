<?php
namespace saso\classes\models;
use \saso\classes\models;

class ShelfMapper extends DataMapperAbstract{
    const MODEL_CLASS = '\saso\classes\models\Shelf';
    
    //---------更新系クエリ---------
    public function insert(models\Shelf $data){
        $modelClass = self::MODEL_CLASS;
        
        $stmt = $this->_pdo->prepare('
            INSERT INTO Shelf(
                  detaleCode
                , shelfNumber
            )
            VALUES (
                  :detaleCode
                , :shelfNumber
            )
        ');
        if(! $data->isValid()){
            throw new \Exception('invalid');
        }
        $stmt->bindValue(':detaleCode', $data->detaleCode, \PDO::PARAM_STR);
        $stmt->bindValue(':shelfNumber', $data->shelfNumber, \PDO::PARAM_STR);
        
        $stmt->execute();
    }
    public function putShelf(models\Shelf $data){
        $modelClass = self::MODEL_CLASS;
        
        $stmt = $this->_pdo->prepare('
            UPDATE Shelf
                SET shelfNumber = :shelfNumber
                WHERE detaleCode = :detaleCode
        ');
        
        if(! $data->isValid()){
            throw new \Exception('invalid');
        }
        
        $stmt->bindValue(':detaleCode', $data->detaleCode, \PDO::PARAM_STR);
        $stmt->bindValue(':shelfNumber', $data->shelfNumber, \PDO::PARAM_STR);

        $stmt->execute();
    }
    //---------参照系クエリ---------
    public function findByDetaleCode($detaleCode){
        $stmt = $this->_pdo->prepare('
            SELECT *
                FROM Shelf
                WHERE detaleCode = ?
        ');
        $stmt->bindValue(1, $detaleCode, \PDO::PARAM_STR);
        $stmt->execute();
        
        $this->_decorate($stmt);
        return $stmt->fetch();
    }
    public function findByShelfNumber($shelfNumber){
        $stmt = $this->_pdo->prepare('
            SELECT *
                FROM Shelf
                WHERE shelfNumber = ?
        ');
        $stmt->bindValue(1, $shelfNumber, \PDO::PARAM_STR);
        $stmt->execute();
        
        return $this->_decorate($stmt);
    }
}

