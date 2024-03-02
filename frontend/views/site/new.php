<?php
	use yii\helpers\Html;
	use yii\helpers\Url;
	use common\widgets\Alert;
	use yii\bootstrap4\ActiveForm;
	use kartik\date\DatePicker;
	$this->title = Yii::t('app', 'new');
?>
<style type="text/css">
	.form-group label {
		margin-bottom: 0 !important;
	}
	.chexbox-block .custom-control.custom-checkbox {
		padding-left: 0;
	}
	.page-wrap .primary .chexbox-block label {
		margin-bottom: 10px;
	}
	.page-wrap .primary .chexbox-block label:before {
		margin-left: 22px;
		margin-top: -7px;
		margin-right: 0;
	}
	.field-waybill-senderdelivery, .field-waybill-receiverdelivery, .field-waybill-iscontract {
		justify-content: flex-end;
	}
	input:disabled {
		background-color: rgba(59, 59, 59, 0.15) !important;
		color: rgb(59, 59, 59) !important;
	}
	.input-group .krajee-datepicker {
		position: relative;
		-webkit-box-flex: 1;
		-ms-flex: 1 1 auto;
		flex: 1 1 auto;
		width: calc(100% - 90px);
		margin-bottom: 0;
	}
	.customer-container {
		display: none;
	}
	.modal-body {
		padding: 0;
	}
	.submit-btn:disabled {
		opacity: 0.5;
		cursor: not-allowed;
	}
	.sender-row {
		display: none;
	}
	.sender-show-hide, .receiver-show-hide, .sending-show-hide {
		cursor: pointer;
	}
	.popup-header-img {
		max-width: 110px;
		margin-left: auto;
		margin-right: auto;
		padding: 30px 5px;
		border: 5px solid #EE6800;
		border-radius: 50%;
		margin-top: -100px;
		background: #FFFFFF;
	}
	.popup-header-img img {
		max-width: 80px;
	}
	input[type=text], input[type=number], input[type=password], select {
		font-weight: 500;
	}
	.close-container {
		position: absolute;
		font-size: 24px;
		line-height: 24px;
		padding: 1.5px;
		padding-top: 2px;
		padding-left: 2px;
		background: #FF3300;
		color: #FFFFFF;
		border-radius: 50%;
		cursor: pointer;
		left: 10px;
		bottom: 10px;
	}
	.close-container:hover {
		background: #FFFFFF;
		color: #FF3300;
	}
	.close-container.disabled {
		opacity: 0.5;
		cursor: not-allowed;
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
	#waybill-senddate:disabled, #waybill-senddate[readonly] {
		background-color: rgba(0, 0, 0, 0.1);
	}
	.receiver-branch {
		display: none;
	}
	.field-waybill-senderdelivery .custom-control, .field-waybill-receiverdelivery .custom-control {
		padding-left: 0;
	}
	.delivery-auto {
		display: inline-block !important;
		padding: 5px 5px;
	}
	.delivery-label + label {
		border: 2px solid #a31c3c;
		background: #ad1e40;
		/*border: 2px solid transparent;*/
		border-radius: 5px;
		width: 265px;
		display: block;
		text-align: center;
		color: #FFFFFF !important;
		cursor: pointer;
	}
	.sign-is-contract {
		width: 170px !important;
	}
	.delivery-label:checked + label {
		background: #2e9d64;
		border-color: #2b935e;
	}
	.delivery-label + label:hover {
		/*background: #5a6268;*/
		/*border-color: #545b62;*/
	}
	.delivery-label + label > img {
		vertical-align: middle;
		margin-right: 5px;
	}
	#waybill-senderdelivery, #waybill-receiverdelivery, #waybill-iscontract {
		position: absolute;
		opacity: 0;
	}
	.is-not-checked, .is-checked {
		vertical-align: middle;
		font-size: 20px;
		margin-left: 5px;
	}
	.is-contract {

		vertical-align: middle;
		font-size: 20px;
		margin-right: 5px;
	}
	.delivery-label:checked + label > .is-not-checked {
		display: none;
		color: white;
	}
	.delivery-label:checked + label > .is-checked {
		display: inline-block;
		color: white;
	}
	.delivery-label + label > .is-not-checked {
		display: inline-block;
		color: white;
	}
	.delivery-label + label > .is-checked {
		display: none;
		color: white;
	}
	.individual-item-search-input {
		width: 100%;
		/*padding: 15px 0px;*/
		border: none !important;
		background-color: transparent;
		border-bottom: 2px solid #777777 !important;
	}
	.individual-item-search-input:focus-visible {
		outline: none !important;
		border-bottom: 2px solid #EE6800 !important;
	}
	#btsClientIndividuals .individual-item.hidden {
		display: none;
	}
	@media screen and (max-width: 768px) {
		input[type=text], input[type=number], input[type=password], select {
			margin-bottom: 0;
			padding: 7px;
		}
		.receiver-show-hide, .sender-show-hide {
			font-size: 18px !important;
		}
		.receiver-show-hide span, .sender-show-hide span {
			float: none !important;
			display: block;
		}
		.receiver-show-hide span:nth-child(1), .sender-show-hide span:nth-child(1) {
			display: inline-block;
		}
		.field-waybill-senderdelivery, .field-waybill-receiverdelivery, .field-waybill-iscontract {
			text-align: center;
		}
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
					</ul>
				</div>
				<?= $this->render('_profile_left') ?>
				<div class="col-md-8 col-lg-9">
					<div class="primary">
						<div class="primary_title">
							<h2><?= Yii::t('app', 'app') ?></h2>
						</div>
						<?= Alert::widget() ?>
						<div style="background: #DDDDDD; padding: 1px 9px; white-space: nowrap; overflow-y: auto; margin-bottom: 15px;">
							<?php if (!empty($userApp)): ?>
								<?php foreach ($userApp as $key => $app): ?>
									<a href="<?= Url::to(['/site/view', 'term' => barcodeToStr($app['id'])]) ?>">
										<div style="background: #FFFFFF; width: 250px; margin: 15px 7px; padding: 10px; display: inline-block; border-radius: 5px; position: relative; min-height: 117px;">
											<p style="margin: 0">
												<span><?= divideString($app['barcode'], 3) ?></span>
												<?php if ($app['avatar']): ?>
													<img src="<?= $app['avatar'] ?>" style="width: 50px; border-radius: 50%; vertical-align: middle; float: right;">
												<?php else: ?>
													<img src="/img/placeholder.jpg" style="width: 50px; border-radius: 50%; vertical-align: middle; float: right;">
												<?php endif ?>
											</p>
											<!-- <div style="clear: both;"></div> -->
											<p style="margin: 0; color: #EE6800;">
												<?= $app['regionName'] ?>
											</p>
											<div style="clear: both;"></div>
											<p style="margin: 0; font-size: 12px; max-width: 100%; float: right; line-height: 15px;">
												<?= $app['receiver'] ?>
											</p>
											<div style="clear: both;"></div>
											<p style="margin: 0; font-size: 12px; max-width: 80%; float: right; line-height: 15px; color: #00A2D4;">
												<?= $app['phone'] ?>
											</p>
											<div style="clear: both;"></div>
											<?php if ($app['isCustomer']): ?>
												<p style="margin: 0; font-size: 12px; max-width: 80%; float: right; line-height: 15px; color: #000000;">
													<?= Yii::t('app', 'isContract') ?>
												</p>
											<?php elseif ($app['paid']): ?>
												<p style="margin: 0; font-size: 12px; max-width: 80%; float: right; line-height: 15px; color: #000000;">
													<?= Yii::t('app', 'paid') ?>
												</p>
											<?php else: ?>
												<p style="margin: 0; font-size: 12px; max-width: 80%; float: right; line-height: 15px; color: #FF0000;">
													<?= Yii::t('app', 'nonPaid') ?>
												</p>
											<?php endif ?>
											<div class="close-container" data-waybillId="<?= $app['id'] ?>">
												<i class="far fa-times-circle"></i>
											</div>
										</div>
									</a>
								<?php endforeach ?>
							<?php endif ?>
						</div>
						<div class="primary_title">
							<h2>
								<?php if ($term): ?>
									<?= Yii::t('app', 'app_update') ?>
								<?php else: ?>
									<?= Yii::t('app', 'new_app') ?>
								<?php endif ?>
							</h2>
						</div>
						<?php if ($model->barcode): ?>
							<div class="row" style="margin-bottom: 15px;">
								<div class="col-lg-4">
								</div>
								<div class="col-lg-4">
									<div class="class-div-barcode-top">
										<?php
											$type = 'code128';
											$barcode = $model->barcode;
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
										<center class="barcode-inner"><?= divideString($model->barcode, 3) ?></center>
									</div>
								</div>
							</div>
						<?php endif ?>
						<?php $form = ActiveForm::begin([
							'id' => 'create-waybill-form',
							'action' => Url::to(['/site/submit-waybill']),
							// 'enableAjaxValidation' => true,
						]); ?>
							<div class="row" style="margin-bottom: 15px;">
								<div class="col-xl-12">
									<div style="padding: 20px; border: 1px solid #AAA; background: #EEEEEE;">
										<h2 class="sender-show-hide" style="font-size: 28px; color: #1b3b8d; font-weight: bold;">
											<?= Yii::t('app', 'Sender') ?>
											<span style="vertical-align: middle; float: right; padding-top: 1px;">
												<i class="fa fa-angle-down"></i>
											</span>
											<?php
												$session = Yii::$app->session;
												$img = $session->get('img');
												$name = $session->get('name');
												if ($model->senderAvatar) {
													$img = $model->senderAvatar;
													$userName = $model->senderName;
												}
											?>
											<?= Html::activeHiddenInput($model, 'id'); ?>
											<?= Html::activeHiddenInput($model, 'barcode'); ?>
											<?php if ($img): ?>
												<?= Html::img($img, [
													'style' => '
														width: 40px;
														border-radius: 50%;
														vertical-align: middle;
														float: right;
														margin: 0 15px;
													'
												]); ?>
											<?php else: ?>
												<?= Html::img('/img/placeholder.jpg', [
													'style' => '
														width: 40px;
														border-radius: 50%;
														vertical-align: middle;
														margin: 0 15px;
													'
												]); ?>
											<?php endif ?>
											<span style="font-size: 15px; vertical-align: middle; float: right; padding-top: 8px;">
												<?= $userName ?>
											</span>
											<div style="clear: both;"></div>
										</h2>
										<div class="sender-row">
											<div class="row" style="margin-bottom: 0;">
												<div class="col-xl-4">
													<?= $form->field($model, 'sendDate')->textInput(['class' => '', 'readonly' => true]); ?>
												</div>
												<div class="col-xl-4">
													<?= $form->field($model, 'senderName')->textInput(['class' => '']) ?>
												</div>
												<div class="col-xl-4">
													<?= $form->field($model, 'senderPhone')->textInput(['class' => '']) ?>
												</div>
												<div class="col-xl-4">
													<?= $form->field($model, 'senderAddressRegionId')->dropDownList($regions, ['class' => '', 'prompt' => '---']) ?>
												</div>
												<div class="col-xl-4">
													<?= $form->field($model, 'senderAddressCityId')->dropDownList($senderCities, ['class' => '']) ?>
												</div>
												<div class="col-xl-4">
													<?= $form->field($model, 'senderAddressStreet')->textInput(['class' => '']) ?>
												</div>
												<div class="col-xl-4">
													<?= $form->field($model, 'senderAddressHome')->textInput(['class' => '']) ?>
												</div>
												<div class="col-xl-4">
													<?= $form->field($model, 'senderAddressApartment')->textInput(['class' => '']) ?>
												</div>
												<div class="col-xl-4">
													<?= $form->field($model, 'senderAddressDestination')->textInput(['class' => '']) ?>
													<?= Html::activeHiddenInput($model, 'senderId'); ?>
												</div>
											</div>
										</div>
									</div>
								</div><!-- end col-xl-6 -->
								<div class="col-xl-12">
									<div style="padding: 20px; border: 1px solid #AAA; background: #EEEEEE; margin-top: 15px;">
										<?php
											$imgReceiver = null;
											$userNameReceiver = null;
											$display = 'none';
											if ($model->senderAvatar) {
												$imgReceiver = $model->receiverAvatar;
												$userNameReceiver = $model->receiverName;
												$display = 'block';
											}
										?>
										<h2 class="receiver-show-hide" style="font-size: 28px; color: #1b3b8d; font-weight: bold;">
											<?= Yii::t('app', 'Receiver') ?>
											<span style="vertical-align: middle; float: right; padding-top: 1px;">
												<i class="fa fa-angle-down fa-rotate-180"></i>
											</span>
											<span style="font-size: 15px; vertical-align: middle; float: right !important;">
												<img src="<?= $imgReceiver ?>" class="receiverPhoto" style="display: <?= $display ?>; width: 40px; border-radius: 50%; margin: 0 15px; vertical-align: middle; float: right;">
											</span>
											<span class="receiverUserName" style="font-size: 15px; vertical-align: middle; float: right; padding-top: 8px; display: <?= $display ?>;"><?= $userNameReceiver ?></span>
											<div style="clear: both;"></div>
										</h2>
										<div class="receiver-row">
											<div class="row" style="margin-bottom: 0;">
												<div class="col-xl-12 text-right">
													<?= $form->field($model, 'isContract')->checkbox([
														'class' => 'delivery-label',
														'labelOptions' => [
															'class' => ['widget' => 'delivery-auto sign-is-contract'],
														]
													])->label('<i class="fal fa-file-signature is-contract"></i>' . Yii::t('app', 'isContract') . '<i class="far fa-check-circle is-checked"></i><i class="far fa-times-circle is-not-checked"></i>') ?>
												</div>
												<div class="col-xl-12 customer-container">
													<?= $form->field($model, 'customerId')->dropDownList([], ['class' => '', 'prompt' => '---']) ?>
												</div>
												<div class="col-xl-6">
													<?= Html::activeHiddenInput($model, 'receiverId'); ?>
													<?= $form->field($model, 'receiverName', [
														'inputTemplate' => '
														<div class="input-group">
															{input}
															<div class="input-group-prepend">
																<span class="input-group-text icon-find-receiver" style="cursor: pointer">
																	<i class="fa fa-user-alt" style="font-size: 25px;"></i>
																</span>
															</div>
														</div>',
													])->textInput(['class' => 'find-receiver', 'style' => 'display: flex; flex: 1;']) ?>
												</div>
												<div class="col-xl-6">
													<?= $form->field($model, 'receiverPhone')->textInput(['class' => '']) ?>
												</div>
												<div class="col-xl-4">
													<?= $form->field($model, 'receiverAddressRegionId')->dropDownList($regions, ['class' => '', 'prompt' => '---']) ?>
												</div>
												<div class="col-xl-4">
													<?= $form->field($model, 'receiverAddressCityId')->dropDownList($receiverCities, ['class' => '', 'prompt' => '---']) ?>
												</div>
												<div class="col-xl-4 receiver-address">
													<?= $form->field($model, 'receiverAddressMfy')->textInput(['class' => '']) ?>
												</div>
												<div class="col-xl-4 receiver-branch">
													<?= $form->field($model, 'receiverBranchId')->dropDownList($receiverBranches, ['class' => '']) ?>
												</div>
												<div class="col-xl-12 receiver-branch">
													<?= $form->field($model, 'receiverBranchAddress')->textInput(['class' => '']) ?>
												</div>
												<div class="col-xl-3 receiver-address">
													<?= $form->field($model, 'receiverAddressStreet')->textInput(['class' => '']) ?>
												</div>
												<div class="col-xl-3 receiver-address">
													<?= $form->field($model, 'receiverAddressHome')->textInput(['class' => '']) ?>
												</div>
												<div class="col-xl-3 receiver-address">
													<?= $form->field($model, 'receiverAddressApartment')->textInput(['class' => '']) ?>
												</div>
												<div class="col-xl-3 receiver-address">
													<?= $form->field($model, 'receiverAddressDestination')->textInput(['class' => '']) ?>
												</div>
												<div class="col-xl-6">
													<?= $form->field($model, 'senderDelivery')->checkbox([
														'class' => 'delivery-label',
														'labelOptions' => [
															'class' => ['widget' => 'delivery-auto auto-sender'],
														]
													])->label('<img src="/img/transport_l_o.png" height="20"> ' . Yii::t('app', 'courer') . '<i class="far fa-check-circle is-checked"></i><i class="far fa-times-circle is-not-checked"></i>') ?>
												</div>
												<div class="col-xl-6 text-right">
													<?= $form->field($model, 'receiverDelivery')->checkbox([
														'class' => 'delivery-label',
														'labelOptions' => [
															'class' => ['widget' => 'delivery-auto auto-receiver'],
														]
													])->label('<img src="/img/transport_r_o.png" height="20"> ' . Yii::t('app', 'receiverDelivery') . '<i class="far fa-check-circle is-checked"></i><i class="far fa-times-circle is-not-checked"></i>') ?>
												</div>
											</div>
										</div>
									</div>
								</div><!-- end col-xl-6 -->
								<div class="col-xl-12">
									<div style="border: 1px solid #AAA; padding: 20px; background: #EEEEEE; margin-top: 15px;">
										<h2 class="sending-show-hide" style="font-size: 28px; color: #1b3b8d; font-weight: bold;">
											<?= Yii::t('app', 'Sending') ?>
											<span style="vertical-align: middle; float: right; padding-top: 1px;">
												<i class="fa fa-angle-down fa-rotate-180"></i>
											</span>
											<div style="clear: both;"></div>
										</h2>
										<div class="sending-row">
											<div class="row">
												<div class="col-xl-4">
													<?= $form->field($model, 'postPostTypeId')->dropDownList($postTypes, ['class' => '', 'prompt' => '---']) ?>
												</div>
												<div class="col-xl-4">
													<?= $form->field($model, 'postPostTypeOther')->textInput(['class' => '', 'disabled' => true]) ?>
												</div>
												<div class="col-xl-4">
													<?= $form->field($model, 'postWeight')->textInput(['class' => '']) ?>
												</div>
												<div class="col-xl-4">
													<?= $form->field($model, 'postWidth')->textInput(['class' => '']) ?>
												</div>
												<div class="col-xl-4">
													<?= $form->field($model, 'postLength')->textInput(['class' => '']) ?>
												</div>
												<div class="col-xl-4">
													<?= $form->field($model, 'postDepth')->textInput(['class' => '']) ?>
												</div>
											</div>
										</div>
									</div>
								</div><!-- end col-xl-12 -->
							</div>
							<div>
								<div class="alert alert-danger text-center">
									<?= Yii::t('app', 'Receiver correct address') ?>
								</div>
							</div>
							<div style="text-align: right;">
								<?php //= Html::a(Yii::t('app', 'Payment'), ['site/payment'], ['class' => 'btn btn-success', 'style' =>'padding: 16px 30px; float: none; display: inline-block; border-radius: 8px;']) ?>
								<button type="button" class="submit-btn" style="margin-bottom: 0;">
									<?php if ($term): ?>
										<?= Yii::t('app', 'Update')?>
									<?php else: ?>
										<?= Yii::t('app', 'create')?>
									<?php endif ?>
								</button>
							</div>
						<?php ActiveForm::end(); ?>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<div class="modal fade" id="btsClientIndividuals" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header" style="flex-wrap: wrap;">
				<div style="flex-basis: 100%;">
					<?= Yii::t('app', 'Receiver') ?>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
				</div>
				<div style="flex-basis: 100%;">
					<input type="text" class="individual-item-search-input" placeholder="<?= Yii::t('app', 'Search receiver') ?>">
				</div>
			</div>
			<div class="modal-body">
				<div style="text-align: center;"><img src="/img/loading.gif" style="height: 200px;"></div>
			</div>
		</div>
	</div>
</div>

<?php
	$paymentTitle = Yii::t('app', 'Payment');
	$url = Url::to(['/site/get-individuals']);
	$flagBranch = 0;
	if ($model->receiverDelivery == 0) {
		$flagBranch = 1;
	}
	$this->registerJs("
		var paymentTitle = '" . $paymentTitle . "';
		function notDeliveryMessage(allText) {
			swal({
				title: '<div class=\"alert-confirm-logo\"><img src=\"/img/logo_new.png\"></div>',
				text: allText,
				// type: \"warning\",
				showCancelButton: true,
				confirmButtonText: \"".Yii::t('app', 'I agree')."\",
				cancelButtonText: \"".Yii::t('app', 'Delivery to address')."\",
				closeOnConfirm: true,
				closeOnCancel: false,
				html: true
			},
			function(isConfirm){
				if (!isConfirm){
					$('#waybill-receiverdelivery').trigger('click');
					swal.close();
				}
			});
		}

		let flagBranch = ".$flagBranch.";
		$('#waybill-senderphone, #waybill-receiverphone').mask('+998 00 000-00-00');
		$('#waybill-senddate').mask('00.00.0000');

		function getBranches() {
			// $('#waybill-receiverbranchid').html('');
			// $('#waybill-receiverbranchaddress').val('');
			// $('#waybill-receiveraddressstreet').val('');
			// $('#waybill-receiveraddresshome').val('');
			let cityId              = $('#waybill-receiveraddresscityid').val();
			let regionId            = $('#waybill-receiveraddressregionid').val();
			let receiverDelivery    = $('#waybill-receiverdelivery').prop('checked');
			if (receiverDelivery) {
				receiverDelivery = 1;
			} else {
				receiverDelivery = 0;
			}
			let receiverBranchId = $('#waybill-receiverbranchid').val();

			if (receiverDelivery == 0) {
				$.get('" . Url::to(['site/get-receiver-branch']) . "', {
					regionId: regionId,
					cityId: cityId,
					receiverDelivery: receiverDelivery,
					receiverBranchId: receiverBranchId
				}, function(data) {
					if (data == '') {
						swal('" . Yii::t('app', 'NoOffice') . "');
						$('#waybill-receiverdelivery').prop('checked',true);
						receiverBranchShow();
					} else {
						$('#waybill-receiverbranchid').html(data);
						// getBranchAddress();
						getBranchAddressNew();
					}
				});
			}
		}

		function getBranchAddressNew() {
			let branchId = $('#waybill-receiverbranchid').val();
			let regionId = $('#waybill-receiverbranchid').find(':selected').data('regionid');
			let cityId = $('#waybill-receiverbranchid').find(':selected').data('cityid');
			let address = $('#waybill-receiverbranchid').find(':selected').data('address');
			let code = $('#waybill-receiverbranchid').find(':selected').data('code');
			let regionName = $('#waybill-receiveraddressregionid').val(regionId).find(':selected').html();
			let cityName = $('#waybill-receiveraddresscityid').val(cityId).find(':selected').html();
			let receiverDelivery = $('#waybill-receiverdelivery').prop('checked');
			if (receiverDelivery) {
				receiverDelivery = 1;
			} else {
				receiverDelivery = 0;
			}
			let allAddress = regionName + ', ' + cityName + ', ' + address;
			$('#waybill-receiverbranchaddress').val(allAddress);
			if (!receiverDelivery) {
				$.get('" . Url::to(['site/get-full-message']) . "', {
					address: allAddress
				}, function(dataNew) {
					notDeliveryMessage(dataNew);
				});
			}
		}

		function getBranchAddress() {
			let branchId = $('#waybill-receiverbranchid').val();
			let receiverDelivery = $('#waybill-receiverdelivery').prop('checked');
			if (receiverDelivery) {
				receiverDelivery = 1;
			} else {
				receiverDelivery = 0;
			}
			$.get('" . Url::to(['site/get-branch-address']) . "', {
				branchId: branchId
			}, function(data) {
				$('#waybill-receiverbranchaddress').val(data);

				if (!receiverDelivery && data) {
					$.get('" . Url::to(['site/get-full-message']) . "', {
						address: data
					}, function(dataNew) {
						notDeliveryMessage(dataNew);
					});
				}
			});
		}
		$('#waybill-receiverbranchid').change(function(){
			// getBranchAddress();
			getBranchAddressNew();
		});

		$('#waybill-receiveraddresscityid').change(function(){
			getBranches();
		});
		$('#waybill-receiverdelivery').change(function(){
			getBranches();
			receiverBranchShow();
		});

		function receiverBranchShow() {
			let checked = $('#waybill-receiverdelivery').prop('checked');
			if (checked) {
				$('.receiver-address').css('display', 'block');
				$('.receiver-branch').css('display', 'none');
			} else {
				$('.receiver-branch').css('display', 'block');
				$('.receiver-address').css('display', 'none');
			}
		}

		if (flagBranch) {
			receiverBranchShow();
			getBranchAddress();
		}

		$('#waybill-senderaddressregionid').change(function(){
			var valId = $(this).val();
			$.get('" . Url::to(['site/get-cities']) . "', {
				regionId: valId
			}, function(data) {
				$('#waybill-senderaddresscityid').html(data);
			});
		});

		$('#waybill-receiveraddressregionid').change(function(){
			var valId = $(this).val();
			$.get('" . Url::to(['site/get-cities']) . "', {
				regionId: valId
			}, function(data) {
				$('#waybill-receiveraddresscityid').html(data);
			});
		});

		$('#waybill-iscontract').change(function(){
			var isCheck = $(this).is(':checked');
			if (isCheck) {
				$('.customer-container').show(0);
				$.get('" . Url::to(['site/get-customers']) . "', {
					id: 0
				}, function(data) {
					if (data == 'no-contract') {
						swal({
							title: '" . Yii::t('app', 'No-contract') . "',
							text: '<div style=\"color: red; font-weight: bold; font-size: 130%;\">" . Yii::t('app', 'sales_department') . ":  <a href=\"tel: +998935052633\" style=\"color: red\">+998 93 505 26 33</a></div>',
							html: true,
						});
						$('.customer-container').hide(0);
						$('#waybill-customerid').html('');
						$('#waybill-iscontract').prop('checked',false);
					} else if (data == 'error') {
						swal('" . Yii::t('app', 'Error') . "');
						$('.customer-container').hide(0);
						$('#waybill-customerid').html('');
						$('#waybill-iscontract').prop('checked',false);
					} else {
						$('#waybill-customerid').html(data);
					}
				});
			} else {
				$('.customer-container').hide(0);
				$('#waybill-customerid').html('');
			}
		});

		$('#waybill-postposttypeid').change(function(){
			var thisVal = $(this).val();
			if (thisVal == '1') {
				$('#waybill-postposttypeother').removeAttr('disabled').focus();
			} else {
				$('#waybill-postposttypeother').prop('disabled', true);
			}
		});

		// $('.find-receiver').focus(function(){
		// 	if ($(this).hasClass('find-receiver')) {
		// 		$('#btsClientIndividuals').modal('show').find('.modal-body').html('<div style=\"text-align: center;\"><img src=\"/img/loading.gif\" style=\"height: 200px;\"></div>');
		// 		$('#btsClientIndividuals').modal('show').find('.modal-body').load('" . $url . "');
		// 	}
		// });
		$('.icon-find-receiver').click(function(){
			$('#btsClientIndividuals .individual-item-search-input').val('');
			$('#btsClientIndividuals').modal('show').find('.modal-body').html('<div style=\"text-align: center;\"><img src=\"/img/loading.gif\" style=\"height: 200px;\"></div>');
			$('#btsClientIndividuals').modal('show').find('.modal-body').load('" . $url . "');
		});


		$('body').on('keyup', '.individual-item-search-input', function(){
			var searchQuery = $(this).val();
			$('#btsClientIndividuals .individual-item').removeClass('hidden');
			if (searchQuery) {
				$('#btsClientIndividuals .individual-item:not(:contains(\"'+searchQuery+'\"))').addClass('hidden');
			}
		});

		jQuery.expr[':'].contains = function(a, i, m) {
			return jQuery(a).text().toUpperCase()
				.indexOf(m[3].toUpperCase()) >= 0;
		};

		$('body').on('click', '.individual-item', function() {
			var thisData = $(this).attr('data-jsondata');
			if (thisData == 'new') {
				$('#waybill-receiverid').val('');
				$('#waybill-receivername').removeClass('find-receiver');
				$('#waybill-receivername').val('');
				$('#waybill-receiverphone').val('');
				$('#waybill-receiveraddressregionid').val('');
				$('#waybill-receiveraddresscityid').val('');
				$('#waybill-receiveraddressstreet').val('');
				$('#waybill-receiveraddresshome').val('');
				$('#waybill-receiveraddressapartment').val('');
				$('#waybill-receiveraddressdestination').val('');
				$('.receiverUserName').html('').css('display', 'none');
				$('.receiverPhoto').attr('src', '').css('display', 'none');
				$('#btsClientIndividuals').modal('hide');
			} else {
				$.post('" . Url::to(['site/data-to-json']) . "', {
					data: thisData
				}, function(response) {
					if (response == 'no-data') {

					} else {
						var obj = jQuery.parseJSON(response);
						$('#waybill-receiverid').val(obj.individualId2);
						$('#waybill-receivername').val(obj.fullName).change();
						$('#waybill-receiverphone').val(obj.phone);
						$('#waybill-receiveraddressregionid').val(obj.regionId);

						$.get('" . Url::to(['site/get-cities']) . "', {
							regionId: obj.regionId
						}, function(data) {
							$('#waybill-receiveraddresscityid').html(data);
							$('#waybill-receiveraddresscityid').val(obj.cityId);
							getBranches();

						});

						$('#waybill-receiveraddressstreet').val(obj.street);
						$('#waybill-receiveraddresshome').val(obj.houseNumber);
						$('#waybill-receiveraddressapartment').val(obj.apartmentNumber);
						$('#waybill-receiveraddressdestination').val(obj.landmark);
						$('.receiverUserName').html(obj.fullName).css('display', 'block');
						$('.receiverPhoto').attr('src', obj.thumb).css('display', 'block');
						$('#btsClientIndividuals').modal('hide');
					}
				});
			}
		});

		$('.submit-btn').click(function(e) {
			e.preventDefault();
			var form = $('#create-waybill-form');
			var actionUrl = form.attr('action');
			$('.submit-btn').prop('disabled', true);
			$.ajax({
				type: 'POST',
				url: actionUrl,
				data: form.serialize(),
				success: function(data)
				{
					$('.submit-btn').removeAttr('disabled');
					let error = '';
					if (typeof data === 'object') {
						for (const [key, value] of Object.entries(data)) {
							error = error + '<div style=\"margin-bottom: 15px;\">' + value + '</div>';
						}
						swal({
							title: '<div class=\"popup-header-img\"><img src=\"/img/logo.svg\"></div>',
							text: '<div style=\"text-align: left; color: #d92550; font-size: 80%;\">' + error + '</div>',
							html: true,
						});
					} else {
						$('#btsClientIndividuals').find('.modal-header').html('<div style=\"font-size: 18px;\">' + paymentTitle + '</div><button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">×</span></button>')
						$('#btsClientIndividuals').modal('show').find('.modal-body').html(data);
					}
				}
			});
		});

		$('body').on('click', '.payment-links', function(e) {
			e.preventDefault();
			var form = $('#create-waybill-form');
			var actionUrl = form.attr('action');
			var attr = $(this).attr('disabled');
			var getLink = $(this).attr('data-link');
			$('.submit-btn').prop('disabled', true);
			$('#btsClientIndividuals').modal('hide');
			if (typeof attr === 'undefined' || attr === false) {
				actionUrl = actionUrl + getLink;
				$.ajax({
					type: 'POST',
					url: actionUrl,
					data: form.serialize(),
					success: function(data)
					{
						if (data) {
							window.location.href=data;
						}
						else {
							location.reload();
						}
					}
				});
			}
		});

		$('#waybill-postposttypeid').click(function(){
			$('.receiver-row').slideUp('slow');
		});

		$('.sender-show-hide').click(function(e){
			$(this).find('i').toggleClass('fa-rotate-180');
			$('.sender-row').slideToggle('slow');
		});

		$('.receiver-show-hide').click(function(e){
			$(this).find('i').toggleClass('fa-rotate-180');
			$('.receiver-row').slideToggle('slow');
		});

		$('.sending-show-hide').click(function(e){
			$(this).find('i').toggleClass('fa-rotate-180');
			$('.sending-row').slideToggle('slow');
		});

		$('body').on('click', '.modal-close	', function(e) {
			$('#btsClientIndividuals').modal('hide').find('.modal-body').html('');
		});


		$('body').on('click', '.contract-confirm', function(e) {
			e.preventDefault();
			var form = $('#create-waybill-form');
			var actionUrl = form.attr('action');
			$('.submit-btn').prop('disabled', true);
			$('#btsClientIndividuals').modal('hide');
			actionUrl = actionUrl + '?flagCustomer=yes';
			$.ajax({
				type: 'POST',
				url: actionUrl,
				data: form.serialize(),
				success: function(data)
				{
					location.reload();
				}
			});
		});

		$('#waybill-receiverphone').blur(function(){
			var phone = $(this).val();//.length;
			if (phone.length > 10) {
				phone = phone.replace(/\-/g, '').replace(/\ /g, '');
				phone = phone.substr(phone.length - 7);
				if ($('#waybill-receivername').hasClass('find-receiver')) {
					$('#btsClientIndividuals .individual-item-search-input').val('');
					$('#btsClientIndividuals').modal('show').find('.modal-body').html('<div style=\"text-align: center;\"><img src=\"/img/loading.gif\" style=\"height: 200px;\"></div>');
					$('#btsClientIndividuals').modal('show').find('.modal-body').load('" . $url . "?phone='+phone);
				}
			}
		});

		$('.close-container').click(function(){
			var isDisable = $(this).hasClass('disabled');
			$(this).addClass('disabled');
			var valId = $(this).attr('data-waybillid');
			if (!isDisable) {
				$.get('" . Url::to(['site/delete']) . "', {
					id: valId
				}, function(data) {
					location.reload();
				});
			}
		});
	")
?>