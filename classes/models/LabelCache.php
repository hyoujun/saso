<?php
namespace saso\classes\models;

class LabelCache extends DataModelAbstract{
    protected static $_schema = array(
         'detaleCode'        => parent::STRING
        ,'sheetsAmount'      => parent::INTEGER
    );
    
    public function isValid(){
        //detaleCode必須
        $val = $this->detaleCode;
        if(empty($val)){
            return false;
        }
        
        //sheetsAmount必須
        $val = $this->sheetsAmount;
        if(empty($val) || !mb_check_encoding($val) || mb_strlen($val) > 4){
            return false;
        }
        
       return true;
    }
}

