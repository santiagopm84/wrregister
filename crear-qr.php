<?php 
if(isset($_POST) && !empty($_POST)) {
    include('librerias/phpqrcode/qrlib.php'); 

    $empresa = explode("|",$_POST['formData'],2);
    

    $url_certificado = "https://www.novaterra.com/certificados/valida/estatus?certifica=".$empresa[0];
    $codesDir = "qrs/";   
    $codeFilee = date('d-m-Y-h-i-s').'.png';
    $codeFile = str_replace(' ', '_', $empresa[1]).'.png';

    QRcode::png($url_certificado, $codesDir.$codeFile, $_POST['ecc'], $_POST['size']); 
    echo '<img class="img-thumbnail" src="'.$codesDir.$codeFile.'" />';
    
    // echo $_POST['formData'];
    // echo $ejemplo[1];
} else {
    header('location:./');
}
?>
