<?php 
require __DIR__ . '/vendor/autoload.php';


include_once ("cfg.php");

$client = new \GuzzleHttp\Client(["base_uri" => "http://c710b30b3d0f.ngrok.io", 'headers' => [ 'Content-Type' => 'application/json', 'X-AUTH-SECURED' => 'EVENT' ]]);

$response = $client->post("/mtx-core/apiv70/webapi", ['body' => json_encode($_POST
        
    )] );
echo $response->getBody();

/*
if($_POST['mode']==1) {
  $json = file_get_contents('php://input');
  $query = "|MODE=1|LOGIN=".$_POST['login']."|CPASS=".$_POST['password']."|LEVERAGE=".$_POST['leverage'];
}
else if($_POST['mode']==2) {
  $query = "|MODE=2|LOGIN=".$_POST['login']."|CPASS=".$_POST['password']."|NPASS=".$_POST['newpassword']."|TYPE=".$_POST['passtype'];
}
else if($_POST['mode']==3) {

  if($_POST['paymenttype']<2)
    $mode=3;
  else
    $mode=5;
  if($_POST['paymenttype']==0 || $_POST['paymenttype']==2)
    $amount=$_POST['amount1'];
  else 
    $amount=-1*$_POST['amount1'];
  $query = "|MODE=".$mode."|LOGIN=".$_POST['login']."|CPASS=".$_POST['password']."|AMOUNT=".$amount."|COMMENT=".$_POST['comment1'];
}
else if($_POST['mode']==4) {
  $query = "|MODE=4|LOGIN=".$_POST['login']."|CPASS=".$_POST['password']."|TOACC=".$_POST['toaccount']."|AMOUNT=".$_POST['amount2'];
}

else if($_POST['mode']==6) {
extract($_POST);



    $send_reports=(isset($_POST['send_reports']))? 1:0;
    $query = "|MODE=6|IP=client_ip|GROUP=$group|NAME=$name|PASSWORD=$password|INVESTOR=$investor_password|EMAIL=$email|COUNTRY=$country|STATE=$state|CITY=$city|ADDRESS=$address|COMMENT=$comment|PHONE=$phone|PHONE_PASSWORD=$phone_password|STATUS=$status|ZIPCODE=$zipcode|LEVERAGE=$leverage|AGENT=$agent|SEND_REPORTS=$send_reports|DEPOSIT=$initial_deposit_for_demo_account";

}
else {
echo "Invalid Request";
exit(0);
}


$q = "WMQWEBAPI MASTER=".MT4_MASTER.$query."\nQUIT\n";
//echo $q;
$ret='error';
$ptr=@fsockopen(MT4_SERVER,MT4_PORT,$errno,$errstr,5); 

if($ptr) {
  if(fputs($ptr,$q)!=FALSE) {
      $ret='';
      while(!feof($ptr)) {
	 $line=fgets($ptr,12);
	 //echo $line;
         if($line=="\r\n") break; 
         $ret.= $line;
      } 
 }
fclose($ptr);
}
$ret = substr($ret,0,strlen($ret)-1);

$obj = json_decode($ret);
echo constant($obj->result);

if($_POST['mode']==6)
echo "<br>Account Number: ".$obj->data[0]->login;

*/

?>
