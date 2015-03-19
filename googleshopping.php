<?php

set_time_limit(1800);

define('SAVE_FEED_LOCATION', '/var/www/html/mymagento/output/shopping/sbs.googleshopping.txt');
require_once '/var/www/vhosts/mymagento/httpdocs/app/Mage.php';
Mage::app('default');
try
{
    $handle = fopen(SAVE_FEED_LOCATION, 'w');
    //setting row names
    $heading = array('id', 'title', 'description', 'google_product_category', 'product_type', 'link', 'image_link', 'condition', 'availability', 'price', 'brand', 'gtin', 'mpn', 'gender', 'age_group', 'color', 'size', 'item_group_id', 'tax', 'shipping', 'custom_label_0', 'custom_label_1', 'custom_label_2');

    $feed_line = implode("\t", $heading) . "\r\n";
    fwrite($handle, $feed_line);

    //Getting configurable production collection
    $products = Mage::getModel('catalog/product')->getCollection();
    $products->addAttributeToFilter('type_id', 'configurable');
    $products->addAttributeToFilter('status', 1);
    $products->addAttributeToFilter('visibility', 4);
    $products->addAttributeToFilter('google_shopping', 1);
    $products->addAttributeToFilter('manufacturer', array('in' => array(237, 75, 252, 218, 74, 226)));
    $products->addAttributeToSelect('sku');

    foreach ($products as $prod)
    {
        $product_data = array();
        $product = Mage::getModel('catalog/product')->load($prod->getId());

        $available = $product->getRelease_date();

        if (!$product->isSaleable())
        {
            continue;
        }
//Getting associate child products
        $children = Mage::getModel('catalog/product_type_configurable')->getUsedProducts(null, $product);

        foreach ($children as $child)
        {
            $productimage = Mage::getResourceSingleton('catalog/product')->getAttributeRawValue($child->getId(), 'image', Mage::app()->getStore());
            $childsku = $child->getSku();
            $brand = $product->getResource()->getAttribute('manufacturer')->getFrontend()->getValue($product);

            if (!$productimage)
            {
                continue;
            }

            if (strtotime('now') <= strtotime($available))
            {
                continue;
            }

            $product_data['id'] = $childsku;
            $product_data['title'] = $product->getName();
            $description = $product->getDescription();
            $product_data['description'] = substr($description, 0, 5000);
            $product_data['google_product_category'] = $product->getResource()->getAttribute('google_category')->getFrontend()->getValue($product);
            $product_data['product_type'] = $product->getResource()->getAttribute('google_category')->getFrontend()->getValue($product);
            $product_data['link'] = $product->getProductUrl(false) . '?utm_source=googleshopping&utm_medium=ppc&utm_campaign=ppc';
            $product_data['image_link'] = Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_MEDIA) . 'catalog/product' . $productimage;
            $product_data['condition'] = 'New';

            $stockqty = (int) Mage::getModel('cataloginventory/stock_item')->loadByProduct($child)->getQty();
            $attributeSetName = Mage::getModel('eav/entity_attribute_set')->load($product->getAttributeSetId())->getAttributeSetName();

            if ($child->isSaleable() and $stockqty > 5)
            {
                $product_data['availability'] = 'in stock';
            }
            else
            {
                $product_data['availability'] = 'out of stock';
            }

            if ($product->getSpecialPrice())
            {
                $product_data['price'] = round($product->getSpecialPrice(), 2);
            }
            else
            {
                $product_data['price'] = round($product->getPrice(), 2);
            }

            $product_data['brand'] = $brand;
            $product_data['gtin'] = Mage::getResourceSingleton('catalog/product')->getAttributeRawValue($child->getId(), 'upc', Mage::app()->getStore());

            $skuparts = explode("-", $childsku);
            $product_data['mpn'] = $skuparts['0'];



            $gender = $product->getResource()->getAttribute('gender')->getFrontend()->getValue($product);

            if ($gender == 'Boys')
            {
                $product_data['gender'] = 'Male';
            }
            elseif ($gender == 'Girls')
            {
                $product_data['gender'] = 'Female';
            }
            else
            {
                $product_data['gender'] = 'Unisex';
            }

            if ($product->getResource()->getAttribute('age_group')->getFrontend()->getValue($product) == 'All')
            {
                $product_data['age_group'] = 'Adult';
            }
            else
            {
                $product_data['age_group'] = $product->getResource()->getAttribute('age_group')->getFrontend()->getValue($product);
            }

            $colorValue = implode('/', array_slice(explode('/', $child->getAttributeText('color')), 0, 3));

            if (strlen($colorValue) > 40)
            {
                $product_data['color'] = implode('/', array_slice(explode('/', $child->getAttributeText('color')), 0, 2));
            }
            else
            {
                $product_data['color'] = $colorValue;
            }

            $product_data['size'] = $child->getAttributeText('size');
            $product_data['item_group_id'] = $product->getId();
            $product_data['tax'] = 'US:UT:6.5:n';

            if ($attributeSetName == 'Footwear')
            {
                $product_data['shipping'] = 'US::Ground:0';
            }
            else
            {
                $product_data['shipping'] = 'US::Ground:4.99';
            }

            $product_data['custom_label_0'] = $attributeSetName;
            $product_data['custom_label_1'] = $product->getResource()->getAttribute('sport')->getFrontend()->getValue($product);
            $product_data['custom_label_2'] = $product->getResource()->getAttribute('product_style')->getFrontend()->getValue($product);

            foreach ($product_data as $k => $val)
            {
                $bad = array('"', "\r\n", "\n", "\r", "\t", "\xe2\x80\x98", "\xe2\x80\x99", "\xe2\x80\x9c", "\xe2\x80\x9d", "\xe2\x80\x93", "\xe2\x80\x94", "\xe2\x80\xa6", chr(145), chr(146), chr(147), chr(148), chr(150), chr(151), chr(133));
                $good = array("", " ", " ", " ", "", "'", "'", '"', '"', '-', '--', '...', "'", "'", '"', '"', '-', '--', '...');
                $product_data[$k] = str_replace($bad, $good, $val);
            }
            $feed_line = implode("\t", $product_data) . "\r\n";
            fwrite($handle, $feed_line);
            fflush($handle);
        }
    }
    fclose($handle);
}
catch (Exception $e)
{
    die($e->getMessage());
}
exit();
