<?php

//enable errors to see if something is wrong
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 1);
//include Mage.php
define('MAGENTO_ROOT', getcwd());
$mageFilename = MAGENTO_ROOT . '/app/Mage.php';
require_once $mageFilename;
//tell magento that you are running on developer mode, for additional error messages (if any)
//Mage::setIsDeveloperMode(true);
//instantiate the application
Mage::app();
Mage::app()->getStore()->setId(Mage_Core_Model_App::ADMIN_STORE_ID);

//Attribute Id to assign, we can get this attributeId from eav_attribute as below
//SELECT attribute_id FROM `eav_attribute` WHERE attribute_code='yourattributecode'
$attributeId = 413;
$installer = new Mage_Catalog_Model_Resource_Eav_Mysql4_Setup('core_setup');
$entityType = Mage::getModel('catalog/product')->getResource()->getEntityType();
$collection = Mage::getResourceModel('eav/entity_attribute_set_collection')
        ->setEntityTypeFilter($entityType->getId());

foreach ($collection as $attributeSet)
{
//assing attribute to General group
    $attributeGroupId = 'General';
    $installer->addAttributeToSet('catalog_product', $attributeSet->getId(), $attributeGroupId, $attributeId);
}
$installer->endSetup();
?>
