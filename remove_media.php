<?php

//enable errors to see if something is wrong
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 1);
//include Mage.php
define('MAGENTO_ROOT', getcwd());
$mageFilename = MAGENTO_ROOT . '/app/Mage.php';
require_once $mageFilename;
//tell magento that you are running on developer mode, for additional error messages (if any)
Mage::setIsDeveloperMode(true);
//instantiate the application
Mage::app();
Mage::app()->getStore()->setId(Mage_Core_Model_App::ADMIN_STORE_ID);

$products = Mage::getModel('catalog/product')->getCollection();


$mediaApi = Mage::getModel("catalog/product_attribute_media_api");

foreach ($products as $product)
{
    $prodID = $product->getId();
    $_product = Mage::getModel('catalog/product')->load($prodID);
    $items = $mediaApi->items($_product->getId());
    foreach ($items as $item)
    {
        $mediaApi->remove($_product->getId(), $item['file']);
    }
}
?>
