<?php

use App\Pix\Payload;
use chillerlan\QRCode\QRCode;
/* use Mpdf\QrCode\QrCode;
use Mpdf\QrCode\OutPut; */

require __DIR__ . '/vendor/autoload.php';

/* instância principal do payload pix */
$objPayload = (new Payload)->setPixKey('12345678910')
                           ->setDescription('Pagamento de Mensalidade')
                           ->setMerchantName('Nome do Pagador')
                           ->setMerchantCity('Cidade do Pagador')
                           ->setAmount(0.10)
                           ->setTxId('1234567');

/* código de pagamento PIX */
$payloadQrCode = $objPayload->getPayLoad();

/* QR CODE chillerlan */
$image = (new QRCode)->render($payloadQrCode);

/* QR CODE mpdf */
/* $objQrCode = new QrCode($payloadQrCode); */

/* imagem do QR CODE */
/* $image = (new OutPut\Png)->output($objQrCode,400); */

?>

<h1>QR CODE - PIX</h1>
<br>
<img src="<?= $image; ?>" alt="qr-code">
<!-- <img src="data:image/png;base64, <?= base64_encode($image); ?>" alt="qr-code"> -->
<br><br>
Código Pix para pagamento:<br>
<strong><?= $payloadQrCode; ?></strong>
