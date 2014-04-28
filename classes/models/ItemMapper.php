<?php
namespace saso\classes\models;
use \saso\classes\models;

class ItemMapper extends DataMapperAbstract{
    const MODEL_CLASS = '\saso\classes\models\Item';
    
    //---------更新系クエリ---------
    public function insert(models\Item $data){
        $modelClass = self::MODEL_CLASS;
        
        $stmt = $this->_pdo->prepare('
            INSERT INTO Item(
                  dateCode
                , serial
                , itemName
                , pla
                , plaNote
                , paper
                , paperNote
                , createAt
                , concatId
            )
            VALUES (
                  :dateCode
                , :serial
                , :itemName
                , :pla
                , :plaNote
                , :paper
                , :paperNote
                , :createAt
                , :concatId
            )
        ');
        if(! $data->isValid()){
            throw new \Exception('invalid');
        }
        $stmt->bindValue(':dateCode', $data->dateCode, \PDO::PARAM_STR);
        $stmt->bindValue(':serial', $data->serial, \PDO::PARAM_INT);
        $stmt->bindValue(':itemName', $data->itemName, \PDO::PARAM_STR);
        $stmt->bindValue(':pla', $data->pla, \PDO::PARAM_INT);
        $stmt->bindValue(':plaNote', $data->plaNote, \PDO::PARAM_STR);
        $stmt->bindValue(':paper', $data->paper, \PDO::PARAM_INT);
        $stmt->bindValue(':paperNote', $data->paperNote, \PDO::PARAM_STR);
        $stmt->bindValue(':createAt', $data->createAt->format('Y-m-d H:i:s'), \PDO::PARAM_STR);
        $stmt->bindParam(':concatId', $concatId, \PDO::PARAM_STR);
        
        $concatId = $data->dateCode . sprintf('%04d',$data->serial);
        
        $stmt->execute();
    }
    
    //---------参照系クエリ---------
    public function findByConcatId($concatId){
        $stmt = $this->_pdo->prepare('
            SELECT dateCode, serial, itemName, pla, plaNote, paper, paperNote, createAt, concatId
                FROM Item
                WHERE concatId = ?
        ');
        $stmt->bindValue(1, $concatId, \PDO::PARAM_STR);
        $stmt->execute();
        
        $this->_decorate($stmt);
        return $stmt->fetch();
    }
    public function findByItemName($itemName){
        $stmt = $this->_pdo->prepare('
            SELECT dateCode, serial, itemName, pla, plaNote, paper, paperNote, createAt, concatId

                FROM Item
                WHERE archive = 0
                AND itemName LIKE ?
        ');
        $stmt->bindValue(1, '%' . $itemName . '%', \PDO::PARAM_STR);
        $stmt->execute();
        
        return $this->_decorate($stmt);
    }
    public function findAllForList($sortColumn = 'createAt',$direction = 'DESC'){
        $stmt = $this->_pdo->query('
            SELECT dateCode, serial, itemName, pla, plaNote, paper, paperNote, createAt, concatId

                FROM Item
                WHERE archive = 0
                ORDER BY ' . $sortColumn . ' ' . $direction . '
        ');
        
        return $this->_decorate($stmt);
    }
    public function findArchivedForList($sortColumn = 'createAt',$direction = 'DESC'){
        $stmt = $this->_pdo->query('
            SELECT dateCode, serial, itemName, pla, plaNote, paper, paperNote, createAt, concatId

                FROM Item
                WHERE archive = 1
                ORDER BY ' . $sortColumn . ' ' . $direction . '
        ');
        
        return $this->_decorate($stmt);
    }

    //---------------
    public function getLastSerial($dateCode){
        $stmt = $this->_pdo->prepare('
            SELECT MAX(serial) AS max
                FROM Item
                WHERE dateCode = ?
        ');
        $stmt->bindValue(1, $dateCode, \PDO::PARAM_STR);
        $stmt->execute();
        
        return $stmt->fetchColumn();
    }
}

