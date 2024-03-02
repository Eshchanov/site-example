<?php
	use yii\helpers\Html;
	$model = $receipt['model'];
?>
<div class="row">
	<div class="col-xl-12 text-center" style="font-weight: bold;">
		OOO "BTS EXPRESS CARGO SERVIS"
		<br>
		<?= $model['branchName'] ?> | KOD: <?= $receipt['branch']['code'] ?>
		<br>
		<?= $model['branchAddress'] ?>
	</div>
</div>
<hr>
<?php
	$fio = explode(' ', $model['kassirName']);
	$surname = $fio[0] ?? '';
	$name = $fio[1] ?? '';
?>
<div class="row">
	<div class="col-7 col-xl-6">Smena raqami: <?= $model['smenaNumber'] ?></div>
	<div class="col-5 col-xl-6 text-right">Savdo cheki: <?= $model['salesReceipt'] ?></div>
	<div class="col-7 col-xl-6">Kassir: <?= $surname ?> <?= $name ?></div>
	<div class="col-5 col-xl-6 text-right">STIR: <?= $model['tin'] ?></div>
	<div class="col-7 col-xl-6">Kassa raqami: <?= $model['kassaNumber'] ?></div>
	<div class="col-5 col-xl-6 text-right"><?= date('d.m.Y H:i', strtotime($model['time'])) ?></div>
</div>
<hr>
<div class="row">
	<div class="col-xl-12">1. <?= $model['name'] ?></div>
</div>
<div class="row">
	<div class="col-xl-1"></div>
	<div class="col-xl-11">
		<div>
			narxi: <?= number_format(($model['goodPrice'] / 100), 2, '.', ' ') ?> * <?= $model['amount'] ?> шт 
			<span style="float: right;">= <?= number_format(($model['price'] / 100), 2, '.', ' ') ?> soʻm</span><br>
		</div>
		sh.j. QQS <?= number_format($model['vatPercent'], 2, '.', ' ') ?>% <span style="float: right;">= <?= number_format(($model['vat'] / 100), 2, '.', ' ') ?></span><br>
		MXIK: <?= $model['spic'] ?>
	</div>
</div>
<hr>
<div class="row">
	<div class="col-xl-12">JAMI <span style="float: right;">= <?= number_format(($model['price'] / 100), 2, '.', ' ') ?></span></div>
	<div class="col-xl-12">CHEGIRMA <span style="float: right;">= <?= number_format(($model['discount'] / 100), 2, '.', ' ') ?></span></div>
	<div class="col-xl-12">NAQD <span style="float: right;">= <?= number_format(($model['receicedCash'] / 100), 2, '.', ' ') ?></span></div>
	<div class="col-xl-12">PLASTIK KARTA <span style="float: right;">= <?= number_format(($model['receicedCard'] / 100), 2, '.', ' ') ?></span></div>
	<div class="col-xl-12">QAYTIM <span style="float: right;">= <?= number_format(($model['moneyBack'] / 100), 2, '.', ' ') ?></span></div>
	<div class="col-xl-12">QQS JAMI <?= number_format($model['vatPercent'], 2, '.', ' ') ?>% <span style="float: right;">= <?= number_format(($model['totalVat'] / 100), 2, '.', ' ') ?></span></div>
	<div class="col-xl-12"></div>
</div>
<hr>
<div class="row">
	<div class="col-6 col-xl-4">Seriya raqami</div>
	<div class="col-6 col-xl-8">: <?= $model['terminalId'] ?></div>
</div>
<div class="row">
	<div class="col-6 col-xl-4">FM raqami</div>
	<div class="col-6 col-xl-8">: <?= $model['terminalId'] ?></div>
</div>
<div class="row">
	<div class="col-6 col-xl-4">Chek raqami</div>
	<div class="col-6 col-xl-8">: <?= $model['soliqReceiptId'] ?></div>
</div>
<div class="row">
	<div class="col-6 col-xl-4">Fiskal belgi</div>
	<div class="col-6 col-xl-8">: <?= $model['fiscalSign'] ?></div>
</div>
<div class="row" style="padding-top: 15px;">
	<div class="col-xl-12 text-center">
		<?php
			$type = 'qr';
			$barcode = $model['qrCodeUrl'];
			$options = [];
			$generator = new \frontend\components\BarcodeGenerator();
			$svg = $generator->render_svg($type, $barcode, $options, 'class-barcode-top');
		?>
		<?= $svg ?>
	</div>
</div>