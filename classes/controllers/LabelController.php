<?php
namespace saso\classes\controllers;

class LabelController extends ControllerBase{
    protected $_controllerName = 'label';

    public function startAction(){
        $this->_setContentTitle('ラベル印刷');
        $this->_setCurrentContent('start');
    }
    //ラベル登録
    public function addLabelAction(){
        $this->_setContentTitle('ラベル寸法登録');
        $this->_setCurrentContent('addLabel');
    }
    public function addLabelConfirmAction(){
        $this->_invalidAccess();
        $this->_setContentTitle('ラベル寸法登録確認');
        $this->_setCurrentContent('addLabelConfirm');
    }
    public function addLabelSaveAction(){
        $this->_invalidAccess();
        $this->_setContentTitle('ラベル寸法登録完了');
        $this->_setCurrentContent('addLabelSave');
    }
    public function showLabelAction(){
        $this->_setContentTitle('ラベル表示');
        $this->_setCurrentContent('showLabel');
    }
    public function deleteLabelAction(){
        $this->_invalidAccess();
        $this->_setContentTitle('ラベル削除');
        $this->_setCurrentContent('deleteLabel');
    }
    //ラベル化商品選択
    public function selectItemAction(){
        $this->_setContentTitle('ラベル化商品選択');
        $this->_setCurrentContent('selectItem');
    }
    public function itemSelectedAction(){
        $this->_invalidAccess();
        $this->_setContentTitle('ラベル化商品選択完了');
        $this->_setCurrentContent('itemSelected');
    }
    public function resetSelectionAction(){
        $this->_setContentTitle('商品ラベル削除');
        $this->_setCurrentContent('resetSelection');
    }
    //ラベル出力
    public function selectLabelAction(){
        $this->_setContentTitle('ラベル選択');
        $this->_setCurrentContent('selectLabel');
    }
    public function outputPdfAction(){
        $this->_setContentTitle('PDF出力');
        $this->_setCurrentContent('outputPdf');
    }
}

