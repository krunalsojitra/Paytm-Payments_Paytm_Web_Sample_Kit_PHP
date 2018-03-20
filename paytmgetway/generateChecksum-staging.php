<?php
//Staging mode detail
//http://localhost/ln-projects/demo/test/paytmgetway/generateChecksum.php?ORDER_ID=15&CUST_ID=1&TXN_AMOUNT=10
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");
// following files need to be included
//require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");
$checkSum = "";
// below code snippet is mandatory, so that no one can use your checksumgeneration url for other purpose .
$paramList = array();
$paramList["MID"] = 'MID03313926506161'; //Provided by Paytm
$paramList["ORDER_ID"] = $_GET['ORDER_ID']; //unique OrderId for every request
$paramList["CUST_ID"] = $_GET['CUST_ID']; // unique customer identifier
$paramList["INDUSTRY_TYPE_ID"] = 'Retail'; //Provided by Paytm
$paramList["CHANNEL_ID"] = 'WAP'; //Provided by Paytm
$paramList["TXN_AMOUNT"] = $_GET['TXN_AMOUNT']; // transaction amount
$paramList["WEBSITE"] = 'APP_STAGING';//Provided by Paytm
$paramList["CALLBACK_URL"] = 'https://pguat.paytm.com/paytmchecksum/paytmCallback.jsp'  ;//Provided by Paytm
//$paramList["EMAIL"] = 'krunal@gmail.com'; // customer email id
//$paramList["MOBILE_NO"] = '7600962527'; // customer 10 digit mobile no.
$checkSum = getChecksumFromArray($paramList,'!g%Ok1Xhup2&@FAs');//PAYTM_MERCHANT_KEY
$paramList["CHECKSUMHASH"] = $checkSum;
print_r(json_encode($paramList));
?>
