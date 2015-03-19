<?php

require_once 'app/Mage.php';
umask(0);
Mage::app('default');
ini_set('display_errors', 1);
try
{

    $hand = Mage::getSingleton('api/server_v2_handler');

    $params = "";
    $_session = getSession();

    echo "<pre>";
    print_r($hand->__call($_soapMethod, array($_session, $params)));
}
catch (Exception $e)
{
    echo $e->getMessage();
    die;
}

function getSession()
{
    try
    {
        $sess = "";
        $webServiceURl = 'http://someting/index.php/api/v2_soap?wsdl';
        $_apiUserName = 'username';
        $_apiPassword = 'password';
        $_soapMethod = "methodname";
        $client = new SoapClient($webServiceURl);
        $sess = $client->login($_apiUserName, $_apiPassword);
    }
    catch (Exception $exc)
    {
        echo $exc->getTraceAsString();
        die;
    }

    return $sess;
}

?>
