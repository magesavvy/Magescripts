<?php

//enable errors to see if something is wrong
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 1);
//include Mage.php
define('MAGENTO_ROOT', getcwd());
$mageFilename = MAGENTO_ROOT . '/app/Mage.php';
require_once $mageFilename;
Mage::app();
Mage::app()->getStore()->setId(Mage_Core_Model_App::ADMIN_STORE_ID);

//comma seperated values for request
$request_path = array("customuicontrolsprodonly/Contact.aspx", "page/FindOrder.aspx", "page/Returns.aspx");
//comma seperated values for target
$target_path = array("contacts/", "order-status", "return-policy");
$_storeId = 1;
$_redirectDesc = "URL Migration";
$i = 0;
//Note: Works only for enterprise
//For community use  Mage::getModel('core/url_rewrite')->load() not tested for community
foreach ($request_path as $request)
{

    Mage::getModel('enterprise_urlrewrite/redirect')->load()
            ->setStoreId($_storeId)
            ->setOptions('RP')
            ->setIdentifier($request)
            ->setTargetPath($target_path[$i])
            ->setDescription($_redirectDesc)
            ->save();
    $i++;
}
?>
