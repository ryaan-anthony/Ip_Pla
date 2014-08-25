<?php
$installer = new Mage_Catalog_Model_Resource_Setup('core_setup');
$installer->startSetup();
$installer->addAttribute('catalog_category', 'google_product_category', array(
    'type' => 'varchar',
    'label'=> 'Google Product Category',
    'input' => 'text',
    'global' => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
    'visible' => true,
    'required' => false,
    'user_defined' => true,
    'group' => "General Information"
));
$installer->addAttribute('catalog_category', 'product_type', array(
    'type' => 'varchar',
    'label'=> 'Google Product Type',
    'input' => 'text',
    'global' => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
    'visible' => true,
    'required' => false,
    'user_defined' => true,
    'group' => "General Information"
));
$installer->addAttribute('catalog_category', 'export_trigger', array(
    'input_renderer'    => 'pla/catalog_category_export_renderer',
    'type' => 'int',
    'label'=> 'Export PLA',
    'global' => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
    'visible' => true,
    'required' => false,
    'user_defined' => true,
    'group' => "General Information"
));
$installer->endSetup();