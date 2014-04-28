<?php
namespace saso\classes\base;

class Validation {
    public static function featuresToArray($features){
        $array = explode(',', $features);
        $array = array_values(array_filter($array));
        $featuresArray = array();
        foreach($array as $key => $value){
            $featuresArray[sprintf('%02d',$key+1)] = mb_substr(trim($value),0,50,'utf-8');
        }
        return $featuresArray;
    }
    public static function checkValidation($input, $allowPattern) {
        $pattern = '/[^' . $allowPattern . ']/';
        if(0 === preg_match($pattern, $input) || '' == $input){
            return $input;
        }else{
            throw new \Exception('denyPattern');
        }
    }
}

