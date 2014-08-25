<?php

class Ip_Pla_Block_Catalog_Category_Export_Renderer extends Varien_Data_Form_Element_Text
{
    public function getElementHtml()
    {
        $category_id = Mage::registry('category') ? Mage::registry('category')->getId() : null;
        if($category_id){
            $url = Mage::helper('adminhtml')->getUrl('adminhtml/export/pla', array('category_id'=>$category_id));
            return "<button type=\"button\" onclick=\"setLocation('{$url}');\">Export</button>";
        }
        return '<em>Must save this category before exporting a PLA.</em>';
    }
}