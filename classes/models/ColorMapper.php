<?php
namespace saso\classes\models;
use \saso\classes\models;

class ColorMapper extends DataMapperAbstract{
    const MODEL_CLASS = '\saso\classes\models\Color';
    
    //---------更新系クエリ---------
    public function insert(models\Color $data){
        $modelClass = self::MODEL_CLASS;
        
        $stmt = $this->_pdo->prepare('
            INSERT INTO Color(
                  concatId
                , colorCode
                , colorName
                , image
                , imageType
            )
            VALUES (
                  :concatId
                , :colorCode
                , :colorName
                , null
                , null
            )
        ');
        if(! $data->isValid()){
            throw new \Exception('invalid');
        }
        $stmt->bindValue(':concatId', $data->concatId, \PDO::PARAM_STR);
        $stmt->bindValue(':colorCode', $data->colorCode, \PDO::PARAM_STR);
        $stmt->bindValue(':colorName', $data->colorName, \PDO::PARAM_STR);
        
        $stmt->execute();
    }
    public function uploadImage(models\Color $data){
        $modelClass = self::MODEL_CLASS;
        
        $stmt = $this->_pdo->prepare('
            UPDATE Color
                SET image = :image
                  , imageType = :imageType
                WHERE concatId = :concatId AND colorCode = :colorCode
        ');
        if(! $data->isValid()){
            throw new \Exception('invalid');
        }
        $stmt->bindValue(':concatId', $data->concatId, \PDO::PARAM_STR);
        $stmt->bindValue(':colorCode', $data->colorCode, \PDO::PARAM_STR);
        $stmt->bindValue(':image', $data->image, \PDO::PARAM_LOB);
        $stmt->bindValue(':imageType', $data->imageType, \PDO::PARAM_STR);
        
        $stmt->execute();
    }
    //---------参照系クエリ---------
    public function getColorName($concatId, $colorCode){
        $stmt = $this->_pdo->prepare('
            SELECT colorName
                FROM Color
                WHERE concatId = ? AND colorCode = ?
        ');
        $stmt->bindValue(1, $concatId, \PDO::PARAM_STR);
        $stmt->bindValue(2, $colorCode, \PDO::PARAM_STR);
        $stmt->execute();
        
        $this->_decorate($stmt);
        return $stmt->fetch();
    }
    public function getImage($concatId, $colorCode){
        $stmt = $this->_pdo->prepare('
            SELECT *
                FROM Color
                WHERE concatId = ? AND colorCode = ?
        ');
        $stmt->bindValue(1, $concatId, \PDO::PARAM_STR);
        $stmt->bindValue(2, $colorCode, \PDO::PARAM_STR);
        $stmt->execute();
        
        $stmt->bindColumn('image', $image, \PDO::PARAM_LOB);
        $stmt->bindColumn('imageType', $type, \PDO::PARAM_STR);
        
        $stmt->fetch(\PDO::FETCH_BOUND);
        $imageset['type'] = $type;
        $imageset['image'] = $image;
        
        return $imageset;
    }
    public function getLastColorCode($concatId){
        $stmt = $this->_pdo->prepare('
            SELECT colorCode
                FROM Color
                WHERE concatId = ?
        ');
        $stmt->bindValue(1, $concatId, \PDO::PARAM_STR);
        $stmt->execute();
        
        $this->_decorate($stmt);
        foreach($stmt as $value){
            $colorCodeNumeric[] = (int)$value->colorCode;
        }
        return max($colorCodeNumeric);
    }
    public function findByConcatId($concatId){
        $stmt = $this->_pdo->prepare('
            SELECT concatId, colorName, colorCode
                FROM Color
                WHERE concatId = ?
                ORDER BY colorCode
        ');
        $stmt->bindValue(1, $concatId, \PDO::PARAM_STR);
        $stmt->execute();
        
        return $this->_decorate($stmt);
    }
}

