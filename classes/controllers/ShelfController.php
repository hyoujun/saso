<?php
namespace saso\classes\controllers;

class ShelfController extends ControllerBase{
    protected $_controllerName = 'shelf';

    public function startAction(){
        $this->_setContentTitle('棚番管理');
        $this->_setCurrentContent('start');
    }
    public function putShelfAction(){
        $this->_invalidAccess();
        $this->_setContentTitle('棚置');
        $this->_setCurrentContent('putShelf');
    }
    public function putShelfSaveAction(){
        $this->_invalidAccess();
        $this->_setContentTitle('棚置確定');
        $this->_setCurrentContent('putShelfSave');
    }
    //ラベル印刷
    public function addMultiAction(){
        $this->_invalidAccess();
        $this->_setContentTitle('複数棚番ラベル印刷のラベル選択');
        $this->_setCurrentContent('addMulti');
    }
    public function addSingleAction(){
        $this->_invalidAccess();
        $this->_setContentTitle('単一棚番ラベル追加印刷のラベル選択');
        $this->_setCurrentContent('addSingle');
    }
    public function outputPdfAction(){
        $this->_invalidAccess();
        $this->_setContentTitle('PDF出力');
        $this->_setCurrentContent('outputPdf');
    }
}

