<?php

class Ip_Pla_Model_Source_Attribute
{
    public function toOptionArray()
    {
        $options = array();
        $attributes = Mage::getResourceModel('catalog/product_attribute_collection');
        foreach ($attributes as $attribute) {
            $apply_to = $attribute->getApplyTo();
            /** @var $attribute Mage_Catalog_Model_Resource_Eav_Attribute */
            if($attribute->getFrontendInput() == 'select' &&        // Input type "Dropdown"
                (!$apply_to || $apply_to[0] == 'configurable') &&   // Apply To All or Configurable Products
                $attribute->getIsConfigurable() &&                  // Use To Create Configurable Product "Yes"
                $attribute->getIsGlobal() == 1){                    // Scope "Global"
                $options[] = array(
                    'value' => $attribute->getAttributeCode(),
                    'label' => $attribute->getFrontendLabel(),
                );
            }
        }
        return $options;
    }
}