<?php
namespace saso\classes\models;

class ItemVar extends DataModelAbstract{
    protected static $_schema = array(
         'concatId'        => parent::STRING
        ,'price'           => parent::INTEGER
        ,'categoryId'      => parent::STRING
        ,'updateAt'        => parent::DATETIME
    );
    
    public function isValid(){
        return true;
    }
}

