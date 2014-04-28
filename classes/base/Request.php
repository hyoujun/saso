<?php
namespace saso\classes\base;

class Request{
    private $_request;
    
    public function __construct(RequestInterface $r){
        $this->_request = $r->setValues();
    }
    private function _hasKey($key){
        if(false == array_key_exists($key,$this->_request)){
            return false;
        }
        return true;
    }
    public function getRequest($key = null){
        if(null == $key){
            return $this->_request;
        }//キーを指定されなかったら、全部を配列で返す。
        if(false == $this->_hasKey($key)){
            return null;
        }//言われたキーがない場合nullを返す
        return $this->_request[$key];//普通は言われたキーのヴァリューを返す
    }
}

