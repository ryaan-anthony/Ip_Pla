<?php

class Ip_Pla_Adminhtml_ExportController extends Mage_Adminhtml_Controller_Action
{

    public function plaAction()
    {
        if($category_id = $this->getRequest()->getParam('category_id', 0)){
            $category = Mage::getModel('catalog/category')->load($category_id);
            if($category && $category->getId()){
                $file = Mage::getModel('pla/export_csv')->exportPla($category);
                $this->_prepareDownloadResponse($file, file_get_contents(Mage::getBaseDir('export').'/'.$file));
            } else {
                $this->_redirect('*/catalog_category/', array('id'=>$category_id));
            }
        } else {
            $this->_redirect('*/catalog_category/');
        }
    }

}