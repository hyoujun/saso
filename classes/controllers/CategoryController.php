<?php
namespace saso\classes\controllers;

class CategoryController extends ControllerBase{
    protected $_controllerName = 'category';

    public function startAction(){
        $this->_setContentTitle('分類管理');
        $this->_setCurrentContent('start');
    }
    public function addCategoryAction(){
        $this->_setContentTitle('分類登録');
        $this->_setCurrentContent('addCategory');
    }
    public function addCategoryConfirmAction(){
        $this->_invalidAccess();
        $this->_setContentTitle('分類登録確認');
        $this->_setCurrentContent('addCategoryConfirm');
    }
    public function addCategorySaveAction(){
        $this->_invalidAccess();
        $this->_setContentTitle('登録完了');
        $this->_setCurrentContent('addCategorySave');
    }
    public function editCategoryAction(){
        $this->_invalidAccess();
        $this->_setContentTitle('分類変更・削除');
        $this->_setCurrentContent('editCategory');
    }
    public function changeNameAction(){
        $this->_invalidAccess();
        $this->_setContentTitle('分類名称変更');
        $this->_setCurrentContent('changeName');
    }
    public function deleteCategoryAction(){
        $this->_invalidAccess();
        $this->_setContentTitle('分類削除');
        $this->_setCurrentContent('deleteCategory');
    }
}

