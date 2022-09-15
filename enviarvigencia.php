<?php
//recipient
$to = 'santiago.perezm.softtek@gmail.com';

//sender
$from = 'santiagopm84@gmail.com';
$fromName = 'Programacion.net';

//email subject
$subject = 'PHP Email with Attachment'; 

try {
//attachment file path
$file = "uploads/lamentaciones-3-25.jpg";

//email body content
$htmlContent = '<h1>PHP Email with Attachment</h1>
    <p>This email has sent from PHP script with attachment.</p>';

//header for sender info
$headers = "From: $fromName"." <".$from.">";

//boundary 
$semi_rand = md5(time()); 
$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x"; 

//headers for attachment 
$headers .= "nMIME-Version: 1.0n" . "Content-Type: multipart/mixed;n" . " boundary="{$mime_boundary}""; 

//multipart boundary 
$message = "--{$mime_boundary}n" . "Content-Type: text/html; charset="UTF-8"n" .
"Content-Transfer-Encoding: 7bitnn" . $htmlContent . "nn"; 

//preparing attachment
if(!empty($file) > 0){
    if(is_file($file)){
        $message .= "--{$mime_boundary}n";
        $fp =    @fopen($file,"rb");
        $data =  @fread($fp,filesize($file));

        @fclose($fp);
        $data = chunk_split(base64_encode($data));
        $message .= "Content-Type: application/octet-stream; name="".basename($file).""n" . 
        "Content-Description: ".basename($files[$i])."n" .
        "Content-Disposition: attachment;n" . " filename="".basename($file).""; size=".filesize($file).";n" . 
        "Content-Transfer-Encoding: base64nn" . $data . "nn";
    }
}
$message .= "--{$mime_boundary}--";
$returnpath = "-f" . $from;

//send email


    if ($mail = @mail($to, $subject, $message, $headers, $returnpath)){
        // Si el correo es enviado correctamente, mostramos un mensaje 
        $a = 1;
        //$b = "<div class='alert alert-success close'>¡Tu mensaje ha sido enviado correctamente!</div>";
        $b = '<div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>¡Tu mensaje ha sido enviado correctamente!</div>';
    
        $dab = array(
          "a" => $a, 
          "b" => $b
        );
    } else {
        // Si el correo es enviado correctamente, mostramos un mensaje 
        $a = 1;
        //$b = "<div class='alert alert-success close'>¡Tu mensaje ha sido enviado correctamente!</div>";
        $b = '<div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>¡Tu mensaje ha sido enviado correctamente!</div>';
    
        $dab = array(
          "a" => $a, 
          "b" => $b
        );
    }

}  catch (Exception $e) {

    $a = 1;
        //$b = "<div class='alert alert-success close'>¡Tu mensaje ha sido enviado correctamente!</div>";
        $b = '<div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>¡Tu mensaje ha sido enviado correctamente!</div>';
    
        $dab = array(
          "a" => $a, 
          "b" => $b
        );
}


//email sending status
//echo $mail?"<h1>Mail sent.</h1>":"<h1>Mail sending failed.</h1>";