<?php
$this->startSetup();
$this->addAttribute('catalog_category', 'google_product_category', array(
    'type' => 'varchar',
    'label'=> 'Google Product Category',
    'input' => 'text',
    'global' => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
    'visible' => true,
    'required' => false,
    'user_defined' => true,
    'group' => "General Information"
));
$this->addAttribute('catalog_category', 'product_type', array(
    'type' => 'varchar',
    'label'=> 'Google Product Type',
    'input' => 'text',
    'global' => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
    'visible' => true,
    'required' => false,
    'user_defined' => true,
    'group' => "General Information"
));
$this->addAttribute('catalog_category', 'export_trigger', array(
    'input_renderer'    => 'pla/catalog_category_export_renderer',
    'type' => 'int',
    'label'=> 'Export PLA',
    'global' => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
    'visible' => true,
    'required' => false,
    'user_defined' => true,
    'group' => "General Information"
));
$this->endSetup();