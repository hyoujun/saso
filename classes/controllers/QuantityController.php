<?php
namespace saso\classes\controllers;

class QuantityController extends ControllerBase{
    protected $_controllerName = 'quantity';

    public function startAction(){
        $this->_setContentTitle('数量管理');
        $this->_setCurrentContent('start');
    }
    public function fluctuationAction(){
        $this->_setContentTitle('各商品の数量管理');
        $this->_setCurrentContent('fluctuation');
    }
    public function fluctuationBarcodeAction(){
        $this->_invalidAccess();
        $this->_setContentTitle('各商品の数量管理');
        $this->_setCurrentContent('fluctuationBarcode');
    }
    public function inventoryAction(){
        $this->_invalidAccess();
        $this->_setContentTitle('棚卸');
        $this->_setCurrentContent('inventory');
    }
    public function stockAction(){
        $this->_invalidAccess();
        $this->_setContentTitle('入庫');
        $this->_setCurrentContent('stock');
    }
    public function shipmentAction(){
        $this->_invalidAccess();
        $this->_setContentTitle('出庫');
        $this->_setCurrentContent('shipment');
    }
    public function historyAction(){
        $this->_setContentTitle('入出庫履歴');
        $this->_setCurrentContent('history');
    }
}

