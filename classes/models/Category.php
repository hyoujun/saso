<?php
namespace saso\classes\models;

class Category extends DataModelAbstract{
    protected static $_schema = array(
         'categoryId'      => parent::INTEGER
        ,'categoryName'    => parent::STRING
        ,'categoryLeft'    => parent::INTEGER
        ,'categoryRight'   => parent::INTEGER
    );
    
    public function isValid(){
        //categoryName、必須
        $val = $this->categoryName;
        if(empty($val) || !mb_check_encoding($val) || mb_strlen($val) > 50){
            return false;
        }
        
        return true;
    }
}

