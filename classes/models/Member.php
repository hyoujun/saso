<?php
namespace saso\classes\models;

class Member extends DataModelAbstract{
    protected static $_schema = array(
         'id'       => parent::STRING
        ,'password' => parent::STRING
    );
    
    public function isValid(){
        //id必須
        $val = $this->id;
        if(empty($val)){
            return false;
        }
        
        //password必須、8から20文字
        $val = $this->password;
        if(empty($val) || !mb_check_encoding($val) || mb_strlen($val) < 8 || mb_strlen($val) > 20){
            return false;
        }
        
       return true;
    }
}

