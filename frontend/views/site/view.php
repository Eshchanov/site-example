<?php
	use yii\helpers\Html;
	use yii\helpers\Url;
	use common\widgets\Alert;
	use yii\bootstrap4\ActiveForm;
	use kartik\date\DatePicker;
	$this->title = Yii::t('app', 'new');
	if ($resData['sender']['delivery']) {
		$resData['sender']['delivery'] = 1;
	} else {
		$resData['sender']['delivery'] = 0;
	}
	if ($resData['receiver']['delivery']) {
		$resData['receiver']['delivery'] = 1;
	} else {
		$resData['receiver']['delivery'] = 0;
	}
	$senderDelivery = [
		0 => Yii::t('app', 'senderDeliveryNot'),
		1 => Yii::t('app', 'senderDeliveryYes'),
		2 => Yii::t('app', 'senderDeliveryTwo'),
	];

	$receiverDelivery = [
		0 => Yii::t('app', 'receiverDeliveryNot'),
		1 => Yii::t('app', 'receiverDeliveryYes'),
		2 => Yii::t('app', 'receiverDeliveryTwo'),
	];
?>
<style type="text/css">
	input[type=text]:disabled,
	select:disabled {
		margin-bottom: 15px;
		text-align: center;
		background: #DDDDDD;
		color: #000000;
		opacity: 1;
	}
	.class-div-barcode-top {
		width: 100%;
		height: 70px;
		overflow: hidden;
		position: relative;
	}
	.class-div-barcode-top center {
		margin-top: -10px;
	}
	.barcode-inner {
		position: absolute;
		bottom: -5px;
		left: 50%;
		transform: translate(-50%, 0%);
		background: #FFFFFF;
		padding: 1px 10px;
	}
</style>
<div class="site-new">
	<section class="page-wrap userpage">
		<div class="container-xl">
			<div class="row">
				<div class="breadcrumbs">
					<ul>
						<li>
							<?= Html::a(Yii::t('app', 'home'), ['site/index'])?>
						</li>
						<li>
							<?= Html::a(Yii::t('app', 'cabinet'), ['site/profile'])?>
						</li>
						<li>
							<?= Html::a(Yii::t('app', 'new'), ['site/new'])?>
						</li>
						<li>
							<?= Html::a(divideString($resData['barcode'], 3), ['site/view', 'term' => barcodeToStr($resData['id'])])?>
						</li>
					</ul>
				</div>
				<?= $this->render('_profile_left') ?>
				<div class="col-md-8 col-lg-9">
					<div class="primary">
						<!-- <div class="primary_title" style="margin-bottom: 0;">
							<h2><?= divideString($resData['barcode'], 3) ?></h2>
						</div> -->
						<?= Alert::widget() ?>
						<div class="row" style="margin-bottom: 15px;">
							<div class="col-lg-4">
							</div>
							<div class="col-lg-4">
								<div class="class-div-barcode-top">
									<?php
										$type = 'code128';
										$barcode = $resData['barcode'];
										$options = [
											'sf' => 2,
											'h' => 90,
										];
									?>
									<?php
										$generator = new frontend\components\BarcodeGenerator();
										$svg = $generator->render_svg($type, $barcode, $options, 'class-barcode-top');
									?>
									<center><?= $svg ?></center>
									<center class="barcode-inner"><?= divideString($resData['barcode'], 3) ?></center>
								</div>
							</div>
						</div>
						<div style="text-align: right; margin-bottom: 15px;">
							<?= $resData['sendDate'] ?>
						</div>
						<div class="row">
							<div class="col-lg-6">
								<div style="margin-bottom: 15px; font-size: 28px;"><?= Yii::t('app', 'Sender') ?></div>
								<div class="row">
									<div class="col-lg-3">
										<?php $img = '/img/placeholder.jpg'; ?>
										<?php if ($resData['sender']['avatar']): ?>
											<?php $img = $resData['sender']['avatar']; ?>
										<?php endif ?>
										<?= Html::img($img, [
											'style' => '
												width: 100px;
												border-radius: 50%;
												vertical-align: middle;
												margin-bottom: 15px;
											'
										]); ?>
									</div>
									<div class="col-lg-9">
										<div><?= Yii::t('app', 'senderName') ?>: <b><?= $resData['sender']['name'] ?></b></div>
										<div><?= Yii::t('app', 'senderPhone') ?>: <b><?= $resData['sender']['phone'] ?></b></div>
										<div><?= Yii::t('app', 'courer') ?>: <b><?= $senderDelivery[$resData['sender']['delivery']] ?></b></div>
										<div><?= Yii::t('app', 'branch') ?>: <b><?= $branchesId[$resData['sender']['branchId']] ?></b></div>
										<?php if ($resData['sender']['address']): ?>
											<div>
												<?= Yii::t('app', 'senderAddressRegionId') ?>:
												<b>
													<?php if (isset($resData['sender']['address']['region'])): ?>
														<?php if (isset($resData['sender']['address']['region']['id'])): ?>
															<?= $regions[$resData['sender']['address']['region']['id']] ?>
														<?php endif ?>
													<?php endif ?>
												</b>
											</div>
											<div>
												<?= Yii::t('app', 'senderAddressCityId') ?>:
												<b>
													<?php if (isset($resData['sender']['address']['city'])): ?>
														<?php if (isset($resData['sender']['address']['city']['id'])): ?>
															<?= $cities[$resData['sender']['address']['city']['id']] ?>
														<?php endif ?>
													<?php endif ?>
												</b>
											</div>
											<div>
												<?= Yii::t('app', 'senderAddressStreet') ?>:
												<b>
													<?php if (isset($resData['sender']['address']['street'])): ?>
														<?= $resData['sender']['address']['street'] ?>
													<?php endif ?>
												</b>
											</div>
											<div>
												<?= Yii::t('app', 'senderAddressHome') ?>:
												<b>
													<?php if (isset($resData['sender']['address']['home'])): ?>
														<?= $resData['sender']['address']['home'] ?>
													<?php endif ?>
												</b>
											</div>
											<div>
												<?= Yii::t('app', 'senderAddressApartment') ?>:
												<b>
													<?php if (isset($resData['sender']['address']['apartment'])): ?>
														<?= $resData['sender']['address']['apartment'] ?>
													<?php endif ?>
												</b>
											</div>
											<div>
												<?= Yii::t('app', 'senderAddressDestination') ?>:
												<b>
													<?php if (isset($resData['sender']['address']['destination'])): ?>
														<?= $resData['sender']['address']['destination'] ?>
													<?php endif ?>
												</b>
											</div>
										<?php endif ?>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div style="margin-bottom: 15px; font-size: 28px;"><?= Yii::t('app', 'Receiver') ?></div>
								<div class="row">
									<div class="col-lg-3">
										<?php $img = '/img/placeholder.jpg'; ?>
										<?php if ($resData['receiver']['avatar']): ?>
											<?php $img = $resData['receiver']['avatar']; ?>
										<?php endif ?>
										<?= Html::img($img, [
											'style' => '
												width: 100px;
												border-radius: 50%;
												vertical-align: middle;
											'
										]); ?>
									</div>
									<div class="col-lg-9">
										<?php $receiverName = explode(' ', $resData['receiver']['name']) ?>
										<div><?= Yii::t('app', 'receiverName') ?>: <b><?= $receiverName[0] ?></b></div>
										<div><?= Yii::t('app', 'receiverPhone') ?>: <b><?= $resData['receiver']['phone'] ?></b></div>
										<div><?= Yii::t('app', 'receiverDelivery') ?>: <b><?= $senderDelivery[$resData['receiver']['delivery']] ?></b></div>
										<div><?= Yii::t('app', 'branch') ?>: <b><?= $branchesId[$resData['receiver']['branchId']] ?></b></div>
										<?php if ($resData['receiver']['address']): ?>
											<div>
												<?= Yii::t('app', 'receiverAddressRegionId') ?>:
												<b>
													<?php if (isset($resData['receiver']['address']['region'])): ?>
														<?php if (isset($resData['receiver']['address']['region']['id'])): ?>
															<?= $regions[$resData['receiver']['address']['region']['id']] ?>
														<?php endif ?>
													<?php endif ?>
												</b>
											</div>
											<div>
												<?= Yii::t('app', 'receiverAddressCityId') ?>:
												<b>
													<?php if (isset($resData['receiver']['address']['city'])): ?>
														<?php if (isset($resData['receiver']['address']['city']['id'])): ?>
															<?= $cities[$resData['receiver']['address']['city']['id']] ?>
														<?php endif ?>
													<?php endif ?>
												</b>
											</div>
											<div>
												<?= Yii::t('app', 'receiverAddressStreet') ?>:
												<b>
													<?php if (isset($resData['receiver']['address']['street'])): ?>
														<?= $resData['receiver']['address']['street'] ?>
													<?php endif ?>
												</b>
											</div>
											<div>
												<?= Yii::t('app', 'receiverAddressHome') ?>:
												<b>
													<?php if (isset($resData['receiver']['address']['home'])): ?>
														<?= $resData['receiver']['address']['home'] ?>
													<?php endif ?>
												</b>
											</div>
											<div>
												<?= Yii::t('app', 'receiverAddressApartment') ?>:
												<b>
													<?php if (isset($resData['receiver']['address']['apartment'])): ?>
														<?= $resData['receiver']['address']['apartment'] ?>
													<?php endif ?>
												</b>
											</div>
											<div>
												<?= Yii::t('app', 'receiverAddressDestination') ?>:
												<b>
													<?php if (isset($resData['receiver']['address']['destination'])): ?>
														<?= $resData['receiver']['address']['destination'] ?>
													<?php endif ?>
												</b>
											</div>
										<?php endif ?>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div style="margin: 15px 0; font-size: 28px;"><?= Yii::t('app', 'Sending') ?></div>
								<div class="row">
									<div class="col-lg-3"></div>
									<div class="col-lg-9">
										<div><?= Yii::t('app', 'postWeight') ?>: <b><?= $resData['post']['weight'] ?></b></div>
										<div><?= Yii::t('app', 'postWidth') ?>: <b><?= $resData['post']['width'] ?></b></div>
										<div><?= Yii::t('app', 'postLength') ?>: <b><?= $resData['post']['length'] ?></b></div>
										<div><?= Yii::t('app', 'postDepth') ?>: <b><?= $resData['post']['depth'] ?></b></div>
										<div><?= Yii::t('app', 'postPackageName') ?>: <b><?= $resData['post']['packageName'] ?></b></div>
										<div><?= Yii::t('app', 'postPostTypeName') ?>: <b><?= $resData['post']['postTypeName'] ?></b></div>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div style="margin: 15px 0; font-size: 28px;"><?= Yii::t('app', 'Payment') ?></div>
								<div class="row">
									<div class="col-lg-3"></div>
									<div class="col-lg-9">
										<div style="display: flex; justify-content: space-between;">
											<?= Yii::t('app', 'senderDeliveryCost') ?>: <b><?= number_format($resData['cost']['senderDeliveryCost'], 0, ',', ' ') ?></b>
										</div>
										<div style="display: flex; justify-content: space-between;">
											<?= Yii::t('app', 'transportCost') ?>: <b><?= number_format($resData['cost']['transportCost'], 0, ',', ' ') ?></b>
										</div>
										<div style="display: flex; justify-content: space-between;">
											<?= Yii::t('app', 'receiverDeliveryCost') ?>: <b><?= number_format($resData['cost']['receiverDeliveryCost'], 0, ',', ' ') ?></b>
										</div>
										<hr style="margin: 5px;">
										<div style="display: flex; justify-content: space-between;">
											<?= Yii::t('app', 'allCost') ?>: <b><?= number_format($resData['cost']['allCost'], 0, ',', ' ') ?></b>
										</div>
										<div class="row" style="margin-top: 15px;">
											<div class="col-lg-6">
												<div style="text-align: center; background: #EEEEEE; color: green; padding: 10px;">
													<div><?= Yii::t('app', 'paid') ?></div>
													<div><?= number_format($resData['cost']['paid'], 0, ',', ' ') ?> <?= Yii::t('app', 'so`m') ?></div>
												</div>
											</div>
											<div class="col-lg-6">
												<div style="text-align: center; background: #EEEEEE; color: red; padding: 10px;">
													<div><?= Yii::t('app', 'payinAmount') ?></div>
													<div><?= number_format($resData['cost']['nonPaid'], 0, ',', ' ') ?> <?= Yii::t('app', 'so`m') ?></div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-4">
								<?php if ($resData['statusId'] == 1): ?>
									<center>
										<?= Html::a(Yii::t('app', 'Update'), ['/site/new', 'term' => barcodeToStr($resData['id'])], [
											'class' => 'btn btn-success',
											'style' => 'float: none;'
										]) ?>
									</center>
								<?php endif ?>
							</div>
							<div class="col-lg-4"></div>
							<div class="col-lg-4">
								<?php if ((1 * $resData['cost']['nonPaid']) > 0): ?>
									<center>
										<?= Html::a(Yii::t('app', 'Pay'), 'http://pay.bts.uz/site/click?id='.$resData['sender']['code'].'&amount='.$resData['cost']['nonPaid'], [
											'class' => 'btn btn-danger',
											'style' => 'float: none;'
										]) ?>
									</center>
								<?php endif ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>