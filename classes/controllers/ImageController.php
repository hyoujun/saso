<?php
namespace saso\classes\controllers;
use \saso\classes\base;
use \saso\classes\models;

class ImageController extends ControllerBase{
    protected $_controllerName = 'image';

    public function startAction(){
        throw new \Exception('notFound');
    }
    public function addImageAction(){
        $this->_setContentTitle('画像登録');
        $this->_setCurrentContent('addImage');
    }
    public function addImageSaveAction(){
        $this->_invalidAccess();
        $this->_setContentTitle('画像登録完了');
        $this->_setCurrentContent('addImageSave');
    }
    public function displayImageAction(){
        $this->_setContentTitle('画像表示');
        $this->_setCurrentContent('displayImage');
    }
    public function getImageAction(){
        $url = new base\Request(new base\UrlParameter());

        $colormp = new models\ColorMapper();
        $image = $colormp->getImage($url->getRequest('item'),$url->getRequest('color'));
        header("Content-Type:". $image['type']);
        print $image['image'];
    }
}

