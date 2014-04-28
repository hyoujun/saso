<?php
namespace saso\classes\models;

class Size extends DataModelAbstract{
    protected static $_schema = array(
         'concatId'        => parent::STRING
        ,'sizeCode'        => parent::STRING
        ,'sizeName'        => parent::STRING
        ,'orderNumber'     => parent::INTEGER
    );
    
    public function isValid(){
        //concatId必須
        $val = $this->concatId;
        if(empty($val)){
            return false;
        }
        
        //sizeCodeは10文字まで
        $val = $this->sizeCode;
        if(empty($val) || !mb_check_encoding($val) || mb_strlen($val) > 10){
            return false;
        }
        
        //sizeNameは50文字まで、必須
        $val = $this->sizeName;
        if(empty($val) || !mb_check_encoding($val) || mb_strlen($val) > 50){
            return false;
        }
        
        //orderNumberは2桁まで
        $val = $this->orderNumber;
        if(!mb_check_encoding($val) || mb_strlen($val) > 2){
            return false;
        }
        
        return true;
    }
}

