<?php
namespace saso\classes\controllers;

class ItemController extends ControllerBase{
    protected $_controllerName = 'item';

    public function startAction(){
        $this->_setContentTitle('商品管理');
        $this->_setCurrentContent('start');
    }
    //商品登録
    public function addItemAction(){
        $this->_setContentTitle('商品登録');
        $this->_setCurrentContent('addItem');
    }
    public function addItemConfirmAction(){
        $this->_invalidAccess();
        $this->_setContentTitle('登録確認');
        $this->_setCurrentContent('addItemConfirm');
    }
    public function addItemSaveAction(){
        $this->_invalidAccess();
        $this->_setContentTitle('登録完了');
        $this->_setCurrentContent('addItemSave');
    }
    //アーカイブ
    public function archiveAction(){
        $this->_setContentTitle('アーカイブ管理');
        $this->_setCurrentContent('archive');
    }
    public function archiveConfirmAction(){
        $this->_invalidAccess();
        $this->_setContentTitle('アーカイブ化確認');
        $this->_setCurrentContent('archiveConfirm');
    }
    public function archiveSaveAction(){
        $this->_invalidAccess();
        $this->_setContentTitle('アーカイブ化');
        $this->_setCurrentContent('archiveSave');
    }
    //分類、価格、サイズ変更
    public function changeCategoryAction(){
        $this->_setContentTitle('分類変更');
        $this->_setCurrentContent('changeCategory');
    }
    public function changeCategorySaveAction(){
        $this->_invalidAccess();
        $this->_setContentTitle('分類変更完了');
        $this->_setCurrentContent('changeCategorySave');
    }
    public function changePriceAction(){
        $this->_setContentTitle('価格変更');
        $this->_setCurrentContent('changePrice');
    }
    public function changePriceSaveAction(){
        $this->_invalidAccess();
        $this->_setContentTitle('価格変更完了');
        $this->_setCurrentContent('changePriceSave');
    }
    public function changeSizeOrderAction(){
        $this->_setContentTitle('サイズ並べ替え');
        $this->_setCurrentContent('changeSizeOrder');
    }
    public function changeSizeOrderSaveAction(){
        $this->_invalidAccess();
        $this->_setContentTitle('サイズ並べ替え完了');
        $this->_setCurrentContent('changeSizeOrderSave');
    }
    //色、サイズ追加
    public function addColorAction(){
        $this->_setContentTitle('色追加');
        $this->_setCurrentContent('addColor');
    }
    public function addColorConfirmAction(){
        $this->_invalidAccess();
        $this->_setContentTitle('色追加確認');
        $this->_setCurrentContent('addColorConfirm');
    }
    public function addColorSaveAction(){
        $this->_invalidAccess();
        $this->_setContentTitle('追加完了');
        $this->_setCurrentContent('addColorSave');
    }
    public function addSizeAction(){
        $this->_setContentTitle('サイズ追加');
        $this->_setCurrentContent('addSize');
    }
    public function addSizeConfirmAction(){
        $this->_invalidAccess();
        $this->_setContentTitle('サイズ追加確認');
        $this->_setCurrentContent('addSizeConfirm');
    }
    public function addSizeSaveAction(){
        $this->_invalidAccess();
        $this->_setContentTitle('追加完了');
        $this->_setCurrentContent('addSizeSave');
    }
}

