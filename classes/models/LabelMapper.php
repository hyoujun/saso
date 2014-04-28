<?php
namespace saso\classes\models;
use \saso\classes\models;

class LabelMapper extends DataMapperAbstract{
    const MODEL_CLASS = '\saso\classes\models\Label';
    
    //---------更新系クエリ---------
    public function insert(models\Label $data){
        $modelClass = self::MODEL_CLASS;
        
        $stmt = $this->_pdo->prepare('
            INSERT INTO Label(
                  labelName
                , marginTop
                , marginLeft
                , width
                , height
                , intervalColomn
                , intervalRow
            )
            VALUES (
                  :labelName
                , :marginTop
                , :marginLeft
                , :width
                , :height
                , :intervalColomn
                , :intervalRow
            )
        ');
        if(! $data->isValid()){
            throw new \Exception('invalid');
        }
        $stmt->bindValue(':labelName', $data->labelName, \PDO::PARAM_STR);
        $stmt->bindValue(':marginTop', $data->marginTop, \PDO::PARAM_INT);
        $stmt->bindValue(':marginLeft', $data->marginLeft, \PDO::PARAM_INT);
        $stmt->bindValue(':width', $data->width, \PDO::PARAM_INT);
        $stmt->bindValue(':height', $data->height, \PDO::PARAM_INT);
        $stmt->bindValue(':intervalColomn', $data->intervalColomn, \PDO::PARAM_INT);
        $stmt->bindValue(':intervalRow', $data->intervalRow, \PDO::PARAM_INT);
        
        $stmt->execute();
    }
    public function delete($labelName){
        $stmt = $this->_pdo->prepare('
            DELETE FROM Label
                WHERE labelName = ?
        ');
        $stmt->bindValue(1, $labelName, \PDO::PARAM_STR);
        $stmt->execute();
    }
    
    //---------参照系クエリ---------
    public function findByLabelName($labelName){
        $stmt = $this->_pdo->prepare('
            SELECT *
                FROM Label
                WHERE labelName = ?
        ');
        $stmt->bindValue(1, $labelName, \PDO::PARAM_STR);
        $stmt->execute();
        
        $this->_decorate($stmt);
        return $stmt->fetch();
    }
    public function findAll(){
       $stmt = $this->_pdo->query('
            SELECT *
                FROM Label
        ');
        return $this->_decorate($stmt);
    }
}

