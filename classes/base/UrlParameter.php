<?php
namespace saso\classes\base;

class UrlParameter implements RequestInterface{
    private $_values = array();
    
    public function setValues(){
        $keyArray = array();
        $valueArray = array();
        foreach($_GET as $key => $value){
            $value = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
            if(0 == $key%2){
                $keyArray[] = $value;
            }else{
                $valueArray[] = $value;
            }
        }
        foreach($keyArray as $key => $value){
            $this->_values[$value] = $valueArray[$key];
        }
        return $this->_values;
    }
}

