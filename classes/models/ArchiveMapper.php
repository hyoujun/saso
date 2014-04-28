<?php
namespace saso\classes\models;
use \saso\classes\models;

class ArchiveMapper extends DataMapperAbstract{
    const MODEL_CLASS = '\saso\classes\models\Archive';
    
    //---------更新系クエリ---------
    public function insert(models\Archive $data){
        $modelClass = self::MODEL_CLASS;
        
        $stmt = $this->_pdo->prepare('
            UPDATE Item
                SET archive = 0
                WHERE concatId = :concatId
        ');
        if(! $data->isValid()){
            throw new \Exception('invalid');
        }
        $stmt->bindValue(':concatId', $data->concatId, \PDO::PARAM_STR);
        
        $stmt->execute();
    }
    public function setArchive(models\Archive $data){
        $modelClass = self::MODEL_CLASS;
        
        $stmt = $this->_pdo->prepare('
            UPDATE Item
                SET archive = 1
                  , archiveNote = :archiveNote
                  , archiveAt = :archiveAt
                WHERE concatId = :concatId
        ');

        if(! $data->isValid()){
            throw new \Exception('invalid');
        }
        
        $stmt->bindValue(':concatId', $data->concatId, \PDO::PARAM_STR);
        $stmt->bindValue(':archiveNote', $data->archiveNote, \PDO::PARAM_STR);
        $stmt->bindValue(':archiveAt', $data->archiveAt->format('Y-m-d H:i:s'), \PDO::PARAM_STR);
        
        $stmt->execute();
    }
    
    //---------参照系クエリ---------
    public function findByConcatId($concatId){
        $stmt = $this->_pdo->prepare('
            SELECT concatId, archive, archiveNote, archiveAt
                FROM Item
                WHERE concatId = ?
        ');
        $stmt->bindValue(1, $concatId, \PDO::PARAM_STR);
        $stmt->execute();
        
        $this->_decorate($stmt);
        return $stmt->fetch();
    }
    public function findAll(){
        $stmt = $this->_pdo->query('
            SELECT concatId, archive, archiveNote, archiveAt
                FROM Item
                WHERE archive = 1
        ');
        return $this->_decorate($stmt);
    }
}

