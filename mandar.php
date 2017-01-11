<? 

require "class.phpmailer.php"; 
$mail = new PHPMailer(true); //Nueva instancia, con las excepciones habilitadas
    $mail->IsSMTP();                           // Usamos el metodo SMTP de la clase PHPMailer
    $mail->SMTPAuth   = true;                  // habilitado SMTP autentificación
    $mail->Port       = 2525;                    // puerto del server SMTP
    $mail->Host       = "mail.supremecluster.com"; // SMTP server
    $mail->Username   = "escala@estudiosherpa.com";     // SMTP server Usuario
    $mail->Password   = "everest8850";            // SMTP server password
    $mail->From       = "escala@estudiosherpa.com"; //Remitente de Correo
    $mail->FromName   = "Contacto Web"; //Nombre del remitente
    $to = "escala@estudiosherpa.com"; //Para quien se le va enviar
    $mail->AddAddress($to);
    $mail->Subject  = "Contacto Web"; //Asunto del correo

$cuerpo = "Datos de Contacto"."\n"; 
$cuerpo .= "Nombre: ".$_POST['nombre']."\n";
$cuerpo .= "Telefono:".$_POST['telefono']."\n";
$cuerpo .= "Email:".$_POST['email']."\n";
$cuerpo .= "Empresa:".$_POST['empresa']."\n";
$cuerpo .= "Mensaje:"."\n"; 
$cuerpo .= $_POST['mensaje']."\n"; 

$mail->Body = $cuerpo; 

$exito = $mail->Send(); 

$intentos=1; 
while ((!$exito) && ($intentos < 2)) { 
sleep(2); 
//echo $mail->ErrorInfo; 
$exito = $mail->Send(); 
$intentos=$intentos+1;    

} 


if(!$exito) 
{ 
echo "<H3>Hubo un error en el envio, intenta luego.</h3>"; 
echo "<br/>".$mail->ErrorInfo;    
} 
else 
{ 
header('Location: index.php');
} 
?> 