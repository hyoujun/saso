<?php
namespace saso\classes\controllers;
use \saso\classes\base;

class StartController extends ControllerBase{
    protected $_controllerName = 'start';
    
    public function startAction(){
        $this->_setContentTitle('スタートメニュー');
        $this->_setCurrentContent('start');
    }
    public function changePasswordAction(){
        $this->_setContentTitle('パスワード変更');
        $this->_setCurrentContent('changePassword');
    }
    public function changePasswordSaveAction(){
        $this->_invalidAccess();
        $this->_setContentTitle('パスワード変更完了');
        $this->_setCurrentContent('changePasswordSave');
    }
    public function logoutAction(){
        $this->_setContentTitle('ログアウトしました');
        $this->_setCurrentContent('logout');
    }
}

