<?php
namespace saso\classes\models;
use \saso\classes\models;

class ItemVarMapper extends DataMapperAbstract{
    const MODEL_CLASS = '\saso\classes\models\ItemVar';
    
    //---------更新系クエリ---------
    public function insert(models\ItemVar $data){
        $modelClass = self::MODEL_CLASS;
        
        $stmt = $this->_pdo->prepare('
            UPDATE Item
                SET   price = :price
                    , categoryId = :categoryId
                    , updateAt = :updateAt
                WHERE concatId = :concatId
        ');
        if(! $data->isValid()){
            throw new \Exception('invalid');
        }
        $stmt->bindValue(':concatId', $data->concatId, \PDO::PARAM_STR);
        $stmt->bindValue(':price', $data->price, \PDO::PARAM_INT);
        $stmt->bindValue(':categoryId', $data->categoryId, \PDO::PARAM_STR);
        $stmt->bindValue(':updateAt', $data->updateAt->format('Y-m-d H:i:s'), \PDO::PARAM_STR);
        
        $stmt->execute();
    }
    public function changePrice(models\ItemVar $data){
        $modelClass = self::MODEL_CLASS;
        
        $stmt = $this->_pdo->prepare('
            UPDATE Item
                SET   price = :price
                    , updateAt = :updateAt
                WHERE concatId = :concatId
        ');
        
        if(! $data->isValid()){
            throw new \Exception('invalid');
        }
        
        $stmt->bindValue(':concatId', $data->concatId, \PDO::PARAM_STR);
        $stmt->bindValue(':price', $data->price, \PDO::PARAM_INT);
        $stmt->bindValue(':updateAt', $data->updateAt->format('Y-m-d H:i:s'), \PDO::PARAM_STR);
        
        $stmt->execute();
    }
   public function changeCategory(models\ItemVar $data){
        $modelClass = self::MODEL_CLASS;
        
        $stmt = $this->_pdo->prepare('
            UPDATE Item
                SET   categoryId = :categoryId
                    , updateAt = :updateAt
                WHERE concatId = :concatId
        ');
        
        if(! $data->isValid()){
            throw new \Exception('invalid');
        }
        
        $stmt->bindValue(':concatId', $data->concatId, \PDO::PARAM_STR);
        $stmt->bindValue(':categoryId', $data->categoryId, \PDO::PARAM_STR);
        $stmt->bindValue(':updateAt', $data->updateAt->format('Y-m-d H:i:s'), \PDO::PARAM_STR);
        
        $stmt->execute();
    }
    public function update(models\ItemVar $data){
        $modelClass = self::MODEL_CLASS;
        
        $stmt = $this->_pdo->prepare('
            UPDATE Item
                SET  updateAt = :updateAt
                WHERE concatId = :concatId
        ');
        
        if(! $data->isValid()){
            throw new \Exception('invalid');
        }
        
        $stmt->bindValue(':concatId', $data->concatId, \PDO::PARAM_STR);
        $stmt->bindValue(':updateAt', $data->updateAt->format('Y-m-d H:i:s'), \PDO::PARAM_STR);
        
        $stmt->execute();
    }
 
    //---------参照系クエリ---------
    public function findByConcatId($concatId){
        $stmt = $this->_pdo->prepare('
            SELECT concatId, categoryId, price, updateAt
                FROM Item
                WHERE concatId = ?
        ');
        $stmt->bindValue(1, $concatId, \PDO::PARAM_STR);
        $stmt->execute();
        
        $this->_decorate($stmt);
        return $stmt->fetch();
    }
}

