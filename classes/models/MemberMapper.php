<?php
namespace saso\classes\models;
use \saso\classes\models;
use \saso\classes\base;

class MemberMapper extends DataMapperAbstract{
    const MODEL_CLASS = '\saso\classes\models\Member';
    
    //---------更新系クエリ---------
    public function changePassword(models\Member $data){
        $modelClass = self::MODEL_CLASS;
        
        $stmt = $this->_pdo->prepare('
            UPDATE Member
                SET password = :password
                WHERE id = :id
        ');
        $stmt->bindValue(':id', $data->id, \PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, \PDO::PARAM_STR);
        
        $password = base\Password::makeHash($data->password);
        
        $stmt->execute();
    }
    //---------参照系クエリ---------
    public function getPasswordById($id){
        $stmt = $this->_pdo->prepare('
            SELECT password
                FROM Member
                WHERE id = ?
        ');
        $stmt->bindValue(1, $id, \PDO::PARAM_STR);
        $stmt->execute();
        
        $this->_decorate($stmt);
        return $stmt->fetch()->password;
    }
}

