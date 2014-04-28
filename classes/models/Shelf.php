<?php
namespace saso\classes\models;

class Shelf extends DataModelAbstract{
    protected static $_schema = array(
         'detaleCode'      => parent::STRING
        ,'shelfNumber'     => parent::STRING
    );
    
    public function isValid(){
        //detaleCode必須
        $val = $this->detaleCode;
        if(empty($val)){
            return false;
        }
        
        //shelfNumberは15文字まで
        $val = $this->shelfNumber;
        if(!mb_check_encoding($val) || mb_strlen($val) > 15){
            return false;
        }
        
        return true;
    }
}

