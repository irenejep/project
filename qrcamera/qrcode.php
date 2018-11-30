<?php   
    
    header('Content-Type:image/png');
    require_once 'vendor/autoload.php';

    $qr = new Endroid\QrCode\QrCode();

    $qr->setText("https://nanyukiappfactory.azurewebsites.net/infomoby/getfavlistings");
    $qr->setSize(200);
    $qr->setPadding(10);

    $qr->render();
?>