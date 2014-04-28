<?php
namespace saso\classes\models;
use \saso\classes\models;

class DetaleMapper extends DataMapperAbstract{
    const MODEL_CLASS = '\saso\classes\models\Detale';
    
    //---------更新系クエリ---------
    public function insert(models\Detale $data){
        $modelClass = self::MODEL_CLASS;
        
        $stmt = $this->_pdo->prepare('
            INSERT INTO Detale(
                  detaleCode
                , concatId
                , colorCode
                , sizeCode
            )
            VALUES (
                  :detaleCode
                , :concatId
                , :colorCode
                , :sizeCode
            )
        ');
        if(! $data->isValid()){
            throw new \Exception('invalid');
        }
        $stmt->bindParam(':detaleCode', $detaleCode, \PDO::PARAM_STR);
        $stmt->bindValue(':concatId', $data->concatId, \PDO::PARAM_STR);
        $stmt->bindValue(':colorCode', $data->colorCode, \PDO::PARAM_STR);
        $stmt->bindValue(':sizeCode', $data->sizeCode, \PDO::PARAM_STR);
        
        $detaleCode = $data->concatId . $data->colorCode . $data->sizeCode;
        
        $stmt->execute();
    }
    
    //---------参照系クエリ---------
    public function findByDetaleCode($detaleCode){
        $stmt = $this->_pdo->prepare('
            SELECT *
                FROM Detale
                WHERE detaleCode = ?
        ');
        $stmt->bindValue(1, $detaleCode, \PDO::PARAM_STR);
        $stmt->execute();
        
        $this->_decorate($stmt);
        return $stmt->fetch();
    }
    public function findByConcatId($concatId){
        $stmt = $this->_pdo->prepare('
            SELECT *
                FROM Detale
                WHERE concatId = ?
        ');
        $stmt->bindValue(1, $concatId, \PDO::PARAM_STR);
        $stmt->execute();
        
        return $this->_decorate($stmt);
    }
}

