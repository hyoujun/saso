<?php
namespace saso\classes\models;

class QuantityLog extends DataModelAbstract{
    protected static $_schema = array(
         'detaleCode'      => parent::STRING
        ,'fluctuation'     => parent::INTEGER
        ,'inventoryFlag'   => parent::INTEGER
        ,'sum'             => parent::INTEGER
        ,'changeAt'        => parent::DATETIME
    );
    
    public function isValid(){
        //detaleCode必須
        $val = $this->detaleCode;
        if(empty($val)){
            return false;
        }
        
        //fluctuationは4桁まで、必須
        $val = $this->fluctuation;
        if('' === $val || !mb_check_encoding($val) || mb_strlen($val) > 4){
            return false;
        }
        
        //inventoryFlagは1桁
        $val = $this->inventoryFlag;
        if(!mb_check_encoding($val) || mb_strlen($val) > 1){
            return false;
        }
        
        //changeAt必須
        $val = $this->changeAt;
        if(empty($val)){
            return false;
        }
        
        return true;
    }
}

