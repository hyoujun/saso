<?php
namespace saso\classes\models;

class Archive extends DataModelAbstract{
    protected static $_schema = array(
         'concatId'        => parent::STRING
        ,'archive'         => parent::INTEGER
        ,'archiveNote'     => parent::STRING
        ,'archiveAt'       => parent::DATETIME
    );
    
    public function isValid(){
        //concatId、必須
        $val = $this->concatId;
        if(empty($val)){
            return false;
        }
        
        //archiveNoteは50文字まで
        $val = $this->archiveNote;
        if(!mb_check_encoding($val) || mb_strlen($val) > 50){
            return false;
        }
        
        return true;
    }
}

