<?php
namespace saso\classes\base;

class Post implements RequestInterface{
    private $_values;
    
    public function setValues(){
        foreach($_POST as $key => $value){
            $value = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
            $this->_values[$key] = $value;
        }
        return $this->_values;
    }
}

