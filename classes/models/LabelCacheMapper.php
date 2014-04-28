<?php
namespace saso\classes\models;
use \saso\classes\models;

class LabelCacheMapper extends DataMapperAbstract{
    const MODEL_CLASS = '\saso\classes\models\LabelCache';
    
    //---------更新系クエリ---------
    public function insert(models\LabelCache $data){
        $modelClass = self::MODEL_CLASS;
        
        $stmt = $this->_pdo->prepare('
            INSERT INTO LabelCache(
                  detaleCode
                , sheetsAmount
            )
            VALUES (
                  :detaleCode
                , :sheetsAmount
            )
        ');
        if(! $data->isValid()){
            throw new \Exception('invalid');
        }
        $stmt->bindValue(':detaleCode', $data->detaleCode, \PDO::PARAM_STR);
        $stmt->bindValue(':sheetsAmount', $data->sheetsAmount, \PDO::PARAM_INT);
        
        $stmt->execute();
    }
    public function deleteAll(){
        $modelClass = self::MODEL_CLASS;
        
        $stmt = $this->_pdo->prepare('
            DELETE FROM LabelCache
        ');
        
        $stmt->execute();
    }
    //---------参照系クエリ---------
    public function findByDetaleCode($detaleCode){
        $stmt = $this->_pdo->prepare('
            SELECT *
                FROM LabelCache
                WHERE detaleCode = ?
        ');
        $stmt->bindValue(1, $detaleCode, \PDO::PARAM_STR);
        $stmt->execute();
        
        $this->_decorate($stmt);
        return $stmt->fetch();
    }
    public function findAll(){
        $stmt = $this->_pdo->prepare('
            SELECT *
                FROM LabelCache
        ');
        $stmt->execute();
        
        return $this->_decorate($stmt);
    }
}

