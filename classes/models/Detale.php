<?php
namespace saso\classes\models;

class Detale extends DataModelAbstract{
    protected static $_schema = array(
         'detaleCode'        => parent::STRING
        ,'concatId'          => parent::STRING
        ,'colorCode'         => parent::STRING
        ,'sizeCode'          => parent::STRING
    );
    
    public function isValid(){
        //concatId必須
        $val = $this->concatId;
        if(empty($val)){
            return false;
        }
        
        //colorCode必須
        $val = $this->colorCode;
        if(empty($val)){
            return false;
        }
        
        //sizeCode必須
        $val = $this->sizeCode;
        if(empty($val)){
            return false;
        }
        
        return true;
    }
}

