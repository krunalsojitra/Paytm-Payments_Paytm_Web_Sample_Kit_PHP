<?php
//http://localhost/ln-projects/demo/test/paytmgetway/generateChecksum.php?ORDER_ID=15&CUST_ID=1&TXN_AMOUNT=10
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");
// following files need to be included
require_once("./lib/encdec_paytm.php");
$checkSum = "";
// below code snippet is mandatory, so that no one can use your checksumgeneration url for other purpose .
$paramList = array();
$paramList["MID"] = 'MID97080837487711'; //Provided by Paytm
$paramList["ORDER_ID"] = $_GET['ORDER_ID']; //unique OrderId for every request
$paramList["CUST_ID"] = $_GET['CUST_ID']; // unique customer identifier
$paramList["INDUSTRY_TYPE_ID"] = 'Retail109'; //Provided by Paytm
$paramList["CHANNEL_ID"] = 'WAP'; //Provided by Paytm
$paramList["TXN_AMOUNT"] = $_GET['TXN_AMOUNT']; // transaction amount
$paramList["WEBSITE"] = 'NEXTECWAP';//Provided by Paytm
$paramList["CALLBACK_URL"] = 'https://securegw.paytm.in/theia/paytmCallback?ORDER_ID='.$_GET['ORDER_ID'];//Provided by Paytm
$paramList["EMAIL"] = $_GET['EMAIL'];; // customer email id
$paramList["MOBILE_NO"] = $_GET['MOBILE_NO'];; // customer 10 digit mobile no.
$checkSum = getChecksumFromArray($paramList,'untk6B@S6&eGcw2o');//PAYTM_MERCHANT_KEY
$paramList["CHECKSUMHASH"] = $checkSum;
print_r(json_encode($paramList));
?>
