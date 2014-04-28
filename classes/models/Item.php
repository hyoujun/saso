<?php
namespace saso\classes\models;

class Item extends DataModelAbstract{
    protected static $_schema = array(
         'dateCode'        => parent::STRING
        ,'serial'          => parent::STRING
        ,'itemName'        => parent::STRING
        ,'pla'             => parent::INTEGER
        ,'plaNote'         => parent::STRING
        ,'paper'           => parent::INTEGER
        ,'paperNote'       => parent::STRING
        ,'createAt'        => parent::DATETIME
        ,'concatId'        => parent::STRING
    );
    
    public function isValid(){
        //dateCodeは4文字、必須
        $val = $this->dateCode;
        if(empty($val) || !mb_check_encoding($val) || mb_strlen($val) > 4){
            return false;
        }
        
        //serialは3文字、必須
        $val = $this->serial;
        if(empty($val) || !mb_check_encoding($val) || mb_strlen($val) > 4){
            return false;
        }
        
        //itemNameは50文字まで、必須
        $val = $this->itemName;
        if(empty($val) || !mb_check_encoding($val) || mb_strlen($val) > 50){
            return false;
        }
        
         //plaは1文字まで、必須
        $val = $this->pla;
        if(!mb_check_encoding($val) || mb_strlen($val) > 1){
            return false;
        }
        
        //plaNoteは50文字まで
        $val = $this->plaNote;
        if(!mb_check_encoding($val) || mb_strlen($val) > 50){
            return false;
        }
        
        //paperは1文字まで、必須
        $val = $this->paper;
        if(!mb_check_encoding($val) || mb_strlen($val) > 1){
            return false;
        }
        
        //paperNoteは50文字まで
        $val = $this->paperNote;
        if(!mb_check_encoding($val) || mb_strlen($val) > 50){
            return false;
        }
        
        //createAt、必須
        $val = $this->createAt;
        if(empty($val)){
            return false;
        }
        
        return true;
    }
}

