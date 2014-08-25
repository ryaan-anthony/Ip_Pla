<?php

class Ip_Pla_Model_Export_Csv extends Mage_Core_Model_Abstract
{
    const ENCLOSURE = '"';
    const DELIMITER = ',';


    public function exportPla(Mage_Catalog_Model_Category $category)
    {
        $originalStore = Mage::app()->getStore();
        Mage::app()->setCurrentStore('default');
        $fileName = 'pla_export_'.date("Ymd_His").'.csv';
        $fp = fopen(Mage::getBaseDir('export').'/'.$fileName, 'w');
        $this->writeHeadRow($fp);
        foreach ($category->getProductCollection() as $product){
            $product = $product->load($product->getId());
            $this->writeCsv($category, $product, $fp);
        }
        Mage::app()->setCurrentStore($originalStore->getId());
        fclose($fp);
        return $fileName;
    }

    protected function writeHeadRow($fp)
    {
        fputcsv($fp, $this->getHeadRowValues(), self::DELIMITER, self::ENCLOSURE);
    }

    protected function writeCsv(
        Mage_Catalog_Model_Category $category,
        Mage_Catalog_Model_Product $product,
        $fp
    ){
        $common = $this->getDesignatedValues($category, $product);
        fputcsv($fp, $common, self::DELIMITER, self::ENCLOSURE);
    }

    protected function getDesignatedValues(
        Mage_Catalog_Model_Category $category,
        Mage_Catalog_Model_Product $product
    ){
        return array(
            'id' => $product->getSku(),
            'name' => $product->getName(),
            'description' => $product->getDescription(),
            'google_product_category' => $category->getGoogleProductCategory(),
            'product_type' => $category->getProductType(),
            'link' => $product->getProductUrl(),
            'image_link' => Mage::helper('catalog/image')->init($product, 'small_image'),
            'condition' => 'New',
            'availablility' => $product->getIsSalable() ? 'In Stock' : 'Out of Stock',
            'price' => $product->getFinalPrice(),
            'brand' => $product->getBrandName(),
            'tax' => 'US:PA:6:n',
            'shipping_weight' => $product->getWeight(),
        );
    }

    protected function getHeadRowValues()
    {
        return array(
            'id',
            'name',
            'description',
            'google_product_category',
            'product_type',
            'link',
            'image_link',
            'condition',
            'availability',
            'price',
            'brand',
            'tax',
            'shipping_weight',
        );
    }

}