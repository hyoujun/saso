<?php
namespace saso\classes\controllers;
use \saso\classes\base;

class ControllerBase{
    private $_title;
    private $_content;
    private $_actionName;
    private $_errorMessage;

    
    private function _linkTo($path){
        return 'http://' . $_SERVER['HTTP_HOST'] . '/' . PROGRAM_DIR . '/' . $path; 
    }
    private function _getContentTitle() {
        return $this->_title;
    }
    private function _getContent() {
        return $this->_content;
    }
    private function _getControllerName() {
        return $this->_controllerName;
    }
    private function _getActionName() {
        return $this->_actionName;
    }
    protected function _setContentTitle($title) {
        $this->_title = $title;
    }
    protected function _setCurrentContent($actionName) {
        if('getImage' != $actionName && 'image' != $this->_controllerName){
            session_regenerate_id(true);
        }
        $this->_actionName = $actionName;
        require_once 'logic/' . $this->_controllerName . '/' . $actionName.'.php';
        $this->_content = 'view/' . $this->_controllerName . '/' . $actionName.'.php';
        require_once 'view/temp.php';
    }
    protected function _invalidAccess(){
        $postTest = new base\Request(new base\Post());
        if(is_null($postTest->getRequest())){
            header('Location: http://'.$_SERVER['HTTP_HOST'] . '/' . PROGRAM_DIR . '/' . $this->_controllerName . '/start/',TRUE,'303');
        }
    }
    protected function _echoItemList($option, $packageFlag){
        switch($option){
            case 'head':
                $headOption = 'view/'. $this->_getControllerName() . '/' . $this->_actionName . '/headOption.php';
                break;
            case 'foot':
                $footOption = 'view/'. $this->_getControllerName() . '/' . $this->_actionName . '/footOption.php';
                break;
            case 'both':
                $headOption = 'view/'. $this->_getControllerName() . '/' . $this->_actionName . '/headOption.php';
                $footOption = 'view/'. $this->_getControllerName() . '/' . $this->_actionName . '/footOption.php';
                break;
            default :
                break; 
        }
        require 'logic/itemList.php';
        require 'view/itemList.php';
    }
    public function error($errorCode){
        switch($errorCode){
            case 'database':
                $this->_errorMessage = 'データベースに接続できませんでした。';
                break;
            case 'invalid':
                $this->_errorMessage = '入力値が不正です。データベースに書き込めません。';
                break;
            case 'notFound':
                $this->_errorMessage = 'ページが見つかりません。';
                break;
            case 'denyPattern':
                $this->_errorMessage = '許可されない入力値です。';
                break;
            case 'classNotFound':
                $this->_errorMessage = 'クラスが見つかりません。';
                break;
            case 'invalidClone':
                $this->_errorMessage = 'クローンは使えません。';
                break;
            default:
                $this->_errorMessage = '予期せぬエラーが発生しました。';
                break;
        }
        $this->_title = 'エラー';
        $this->_content = 'view/error.php';
        $this->_controllerName = '';
        require_once 'view/temp.php';
    }
}

