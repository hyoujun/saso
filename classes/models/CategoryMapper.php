<?php
namespace saso\classes\models;
use \saso\classes\models;

class CategoryMapper extends DataMapperAbstract{
    const MODEL_CLASS = '\saso\classes\models\Category';
    
    private $_categoryLeft;

    //---------更新系クエリ---------
    public function insert(models\Category$data, $parentId = null){
        $modelClass = self::MODEL_CLASS;
        
        $stmt = $this->_pdo->prepare('
            INSERT INTO Category( 
                  categoryId
                , categoryName
                , categoryLeft
                , categoryRight
            )
            VALUES (
                  :categoryId
                , :categoryName
                , :categoryLeft
                , :categoryRight
            )
        ');
        if(! $data->isValid()){
            throw new \Exception('invalid');
        }
        $stmt->bindParam(':categoryId', $categoryId, \PDO::PARAM_INT);
        $stmt->bindValue(':categoryName', $data->categoryName, \PDO::PARAM_STR);
        $stmt->bindParam(':categoryLeft', $categoryLeft, \PDO::PARAM_INT);
        $stmt->bindParam(':categoryRight', $categoryRight, \PDO::PARAM_INT);
        
        $categoryId = $this->_appendCategory();

        if(null == $parentId){
            $categoryLeft = $this->_parent();
        }else{
            $categoryLeft = $this->_child($parentId);
        } 
        $categoryRight = $categoryLeft + 1;
        $stmt->execute();
    }
    private function _parent(){
        $stmt = $this->_pdo->query('
            SELECT MAX(categoryRight)
                FROM Category
        ');
        return $stmt->fetchColumn() + 1;
    }
    private function _child($parentId){
        $parentRight = $this->findByCategoryId($parentId)->categoryRight;
        $stmt = $this->_pdo->prepare('
            UPDATE Category
                SET categoryLeft = CASE WHEN categoryLeft > :parentRight
                                        THEN categoryLeft + 2
                                        ELSE categoryLeft END,
                    categoryRight = CASE WHEN categoryRight >= :parentRight
                                        THEN categoryRight + 2
                                        ELSE categoryRight END
            WHERE categoryRight >= :parentRight
        ');
        $stmt->bindValue(':parentRight', $parentRight, \PDO::PARAM_INT);
        $stmt->execute();
        return $parentRight;
    }
    public function update(models\Category$data){
        $modelClass = self::MODEL_CLASS;

        $stmt = $this->_pdo->prepare('
            UPDATE Category
                SET categoryName = :categoryName
            WHERE categoryId = :categoryId
        ');
        if(! $data->isValid()){
            throw new \Exception('invalid');
        }
        $stmt->bindValue(':categoryId', $data->categoryId, \PDO::PARAM_INT);
        $stmt->bindValue(':categoryName', $data->categoryName, \PDO::PARAM_STR);

        $stmt->execute();
    }
    public function deleteWithChildren($categoryId){
        $deleteLeft = $this->findByCategoryId($categoryId)->categoryLeft;
        $deleteRight = $this->findByCategoryId($categoryId)->categoryRight;
        $stmt = $this->_pdo->prepare('
            DELETE FROM Category
                WHERE categoryLeft BETWEEN :categoryLeft
                                       AND :categoryRight
        ');
        $stmt->bindValue(':categoryLeft', $deleteLeft, \PDO::PARAM_INT);
        $stmt->bindValue(':categoryRight', $deleteRight, \PDO::PARAM_INT);
        $stmt->execute();
        
        $stmt = $this->_pdo->prepare('
            UPDATE Category
                SET categoryLeft = CASE WHEN categoryLeft > :deleteLeft
                                        THEN categoryLeft - (:deleteRight - :deleteLeft +1)
                                        ELSE categoryLeft END,
                    categoryRight = CASE WHEN categoryRight > :deleteRight
                                         THEN categoryRight - (:deleteRight - :deleteLeft +1)
                                         ELSE categoryRight END
                WHERE categoryLeft > :deleteLeft
                   OR categoryRight > :deleteRight
        ');
        $stmt->bindValue(':deleteLeft', $deleteLeft, \PDO::PARAM_INT);
        $stmt->bindValue(':deleteRight', $deleteRight, \PDO::PARAM_INT);
        $stmt->execute();
    }
    public function delete($categoryId){
        $deleteLeft = $this->findByCategoryId($categoryId)->categoryLeft;
        $deleteRight = $this->findByCategoryId($categoryId)->categoryRight;
        $stmt = $this->_pdo->prepare('
            DELETE FROM Category
                WHERE categoryId = ?
        ');
        $stmt->bindValue(1, $categoryId, \PDO::PARAM_INT);
        $stmt->execute();
        
        $stmt = $this->_pdo->prepare('
            UPDATE Category
                SET categoryLeft = CASE WHEN categoryLeft < :deleteRight AND categoryLeft > :deleteLeft
                                        THEN categoryLeft -1
                                        WHEN categoryLeft > :deleteLeft
                                        THEN categoryLeft - 2 
                                        ELSE categoryLeft END,
                    categoryRight = CASE WHEN categoryRight > :deleteRight
                                         THEN categoryRight - 2
                                         WHEN categoryRight > :deleteLeft AND categoryRight < :deleteRight
                                         THEN categoryRight -1
                                         ELSE categoryRight END
                WHERE categoryLeft > :deleteLeft
                   OR categoryRight > :deleteRight
        ');
        $stmt->bindValue(':deleteLeft', $deleteLeft, \PDO::PARAM_INT);
        $stmt->bindValue(':deleteRight', $deleteRight, \PDO::PARAM_INT);
        $stmt->execute();
    }
 
    //---------参照系クエリ---------
    public function findByCategoryId($categoryId){
        $stmt = $this->_pdo->prepare('
            SELECT *
                FROM Category
                WHERE categoryId = ?
        ');
        $stmt->bindValue(1, $categoryId, \PDO::PARAM_INT);
        $stmt->execute();
        
        $this->_decorate($stmt);
        return $stmt->fetch();
    }
    public function findAllParent(){
        $stmt = $this->_pdo->query('
            SELECT categoryId, categoryName
            FROM (
            SELECT Child.categoryId, Child.categoryName, COUNT(Parent.categoryId) AS level
                FROM Category AS Child, Category AS Parent
                WHERE Child.categoryLeft BETWEEN Parent.categoryLeft AND Parent.categoryRight
                GROUP BY Child.categoryId
            ) AS LevelTable
            WHERE level = 1
        ');
        return $this->_decorate($stmt);
    }
    public function findChildren($parentId){
        $stmt = $this->_pdo->prepare('
            SELECT Child.categoryId, Child.categoryName
                FROM Category AS Parent
                    LEFT OUTER JOIN Category AS Child
                    ON Parent.categoryLeft = (SELECT MAX(categoryLeft)
                                              FROM Category
                                              WHERE Child.categoryLeft > categoryLeft
                                              AND Child.categoryLeft < categoryRight
                                             )
                WHERE Parent.categoryId = ?
        ');
        $stmt->bindValue(1, $parentId, \PDO::PARAM_INT);
        $stmt->execute();
        
        return $this->_decorate($stmt);
    }
    public function findParent($childId){
        $stmt = $this->_pdo->prepare('
            SELECT Parent.categoryId, Parent.categoryName
                FROM Category AS Child
                    LEFT OUTER JOIN Category AS Parent
                    ON Parent.categoryLeft < Child.categoryLeft
                    AND Parent.categoryLeft = (SELECT MAX(categoryLeft)
                                              FROM Category
                                              WHERE Child.categoryLeft > categoryLeft
                                              AND Child.categoryLeft < categoryRight
                                             )
                WHERE Child.categoryId = ?
        ');
        $stmt->bindValue(1, $childId, \PDO::PARAM_INT);
        $stmt->execute();
        
        $this->_decorate($stmt);
        return $stmt->fetch();
    }
    public function getPath($childId){
        if(null == $childId){
            return;
        }
        $categoryId = $childId;
        $categoryName = '';
        if(null != $this->findByCategoryId($childId)){
            $categoryName = $this->findByCategoryId($childId)->categoryName;
        }
        while($this->findParent($categoryId)){
            $categoryName = $this->findParent($categoryId)->categoryName.'/'.$categoryName;
            $categoryId = $this->findParent($categoryId)->categoryId;
        }
        return $categoryName;
    }
    private function _appendCategory(){
        $stmt = $this->_pdo->query('
            SELECT MAX(categoryId) FROM Category
        ');
        return $stmt->fetchColumn() + 1;
    }
}

