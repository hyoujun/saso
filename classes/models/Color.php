<?php
namespace saso\classes\models;

class Color extends DataModelAbstract{
    protected static $_schema = array(
         'concatId'        => parent::STRING
        ,'colorCode'       => parent::STRING
        ,'colorName'       => parent::STRING
        ,'image'           => parent::IMAGE
        ,'imageType'       => parent::STRING
    );
    
    public function isValid(){
        //concatId必須
        $val = $this->concatId;
        if(empty($val)){
            return false;
        }
        
        //colorCodeは2文字まで、必須
        $val = $this->colorCode;
        if(empty($val) || !mb_check_encoding($val) || mb_strlen($val) > 2){
            return false;
        }
        
        //colorNameは50文字まで、必須
        $val = $this->colorName;
        if(empty($val) || !mb_check_encoding($val) || mb_strlen($val) > 50){
            return false;
        }
               
        return true;
    }
}

