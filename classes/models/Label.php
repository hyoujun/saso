<?php
namespace saso\classes\models;

class Label extends DataModelAbstract{
    protected static $_schema = array(
         'labelName'       => parent::STRING
        ,'marginTop'       => parent::DOUBLE
        ,'marginLeft'      => parent::DOUBLE
        ,'width'           => parent::DOUBLE
        ,'height'          => parent::DOUBLE
        ,'intervalColomn'  => parent::DOUBLE
        ,'intervalRow'     => parent::DOUBLE
    );
    
    public function isValid(){
        //labelNameは50文字まで、必須
        $val = $this->labelName;
        if(empty($val) || !mb_check_encoding($val) || mb_strlen($val) > 50){
            return false;
        }
        
        //marginTopは7桁まで、必須
        $val = $this->marginTop;
        if('' === $val || !mb_check_encoding($val) || mb_strlen($val) > 7){
            return false;
        }
        
        //marginLeftは7桁まで、必須
        $val = $this->marginLeft;
        if('' === $val || !mb_check_encoding($val) || mb_strlen($val) > 7){
            return false;
        }
        
        //widthは7桁まで、必須
        $val = $this->width;
        if(empty($val) || !mb_check_encoding($val) || mb_strlen($val) > 7){
            return false;
        }
        
        //heightは7桁まで、必須
        $val = $this->height;
        if(empty($val) || !mb_check_encoding($val) || mb_strlen($val) > 7){
            return false;
        }
        
        //intervalColomnは7桁まで、必須
        $val = $this->intervalColomn;
        if('' === $val || !mb_check_encoding($val) || mb_strlen($val) > 7){
            return false;
        }
        
        //intervalRowは7桁まで、必須
        $val = $this->intervalRow;
        if('' === $val || !mb_check_encoding($val) || mb_strlen($val) > 7){
            return false;
        }
        
        return true;
    }
}

