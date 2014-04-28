<?php
namespace saso\classes\models;

abstract class DataModelAbstract {
    const
         BOOLEAN = 'boolean'
        ,INTEGER = 'integer'
        ,DOUBLE = 'double'
        ,FLOAT = 'double'
        ,STRING = 'string'
        ,DATETIME = 'dateTime'
        ,IMAGE = 'resource'
    ;
        
    private $_data = array();
    protected static $_schema = array();//オーバーライドしてね。
    
    public function __get($prop){
        if(isset($this->_data[$prop])){
            return $this->_data[$prop];//プロパティがあれば中身を返す。
        }elseif(isset(static::$_schema[$prop])){
            return null;//プロパティはあるけど空ならnullを返す。
        }else{
            throw new \Exception('invalid');//プロパティがないのでエラー
        }
    }
    public function __isset($prop){
        return isset($this->_data[$prop]);
        //プロパティの有無の問い合わせを答える。__get__setで振り分けるので常にfalseだがそれでは困るのでここで実装。
    }
    public function __set($prop, $val) {
        if(!isset(static::$_schema[$prop])){
            throw new \Exception('invalid');//無いものはないのでエラー
        }
        
        $schema = static::$_schema[$prop];//プロパティの型
        $type = gettype($val);//プロパティに入れたい値の型
        
        if($schema === self::DATETIME){//日時はそれに見合った特殊処理
            if($val instanceof \DateTime){
                $this->_data[$prop] = $val;
            }else{
                $this->_data[$prop] = new \DateTime($val);
            }
            return;
        }
        
        if($type == $schema){//プロパティとその中身の型が一致するなら収納して終わり。
            $this->_data[$prop] = $val;
            return;
        }
        
        switch($schema){//一致しないなら、キャスト変換で一致させて終わり。
            case self::BOOLEAN:
                return $this->_data[$prop] = (bool)$val;
            case self::INTEGER:
                return $this->_data[$prop] = (int)$val;
            case self::DOUBLE:
                return $this->_data[$prop] = (double)$val;
            case self::IMAGE:
                return $this->_data[$prop] = null;
            case self::STRING:
            default:
                return $this->_data[$prop] = (string)$val;
        }
    }
    public function toArray(){//配列で出力(__get相当)
        return $this->_data;
    }
    public function fromArray(array $arr){//配列で入力(__set相当)
        foreach($arr as $key => $val){
            $this->__set($key, $val);
        }
    }
    
    abstract function isValid();
}

