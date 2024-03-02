<?php
	use yii\helpers\Url;
	$this->title = Yii::t('app', 'Evaluate our service');
?>
<style type="text/css">
	.rating-stars {
		font-size: 25px;
		cursor: pointer;
		margin-left: -5px;
		vertical-align: top;
		color: #AAAAAA;
		line-height: 30px;
	}
	.rating-stars.checked {
		color: #00A2D4;
	}
	.rating-stars.hover {
		color: #00B7A7;
	}
	.emojis {
		display: inline-block;
	}
	.user-emoji-mini {
		display: none;
	}
	.user-emoji-mini .item-emoji {
		width: 30px;
		height: 30px;
		display: block;
		background: url(/img/emoji-mini.png) no-repeat;
		transition: all 0.25s;
		cursor: pointer;
		display: inline-block;
		vertical-align: middle;
	}
	.user-emoji-mini.emoji-item-1 .item-emoji {
		background-position: -180px 0;
	}
	.user-emoji-mini.emoji-item-2 .item-emoji {
		background-position: -150px 0;
	}
	.user-emoji-mini.emoji-item-3 .item-emoji {
		background-position: -120px 0;
	}
	.user-emoji-mini.emoji-item-4 .item-emoji {
		background-position: -90px 0;
	}
	.user-emoji-mini.emoji-item-5 .item-emoji {
		background-position: -60px 0;
	}
	.emojies label {
		min-width: 215px;
	}
	.emoji-text {
		display: inline-block;
		font-size: 11px;
		margin-left: 5px;
		text-transform: uppercase;
		max-width: 60px;
		vertical-align: middle;
		text-align: left;
		line-height: 14px;
		/*font-weight: bold;*/
	}
	.btn-rating {
		text-decoration: none;
		display: inline-block;
		font-weight: 400;
		color: #212529;
		text-align: center;
		vertical-align: middle;
		-webkit-user-select: none;
		-moz-user-select: none;
		-ms-user-select: none;
		user-select: none;
		background-color: transparent;
		border: 1px solid transparent;
		padding: 0.375rem 0.75rem;
		font-size: 1rem;
		line-height: 1.5;
		border-radius: 0.25rem;
		transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
	}
	.btn-warning {
		background-color: #EE6800;
		border: none;
	}
	.btn-warning:hover {
		background-color: #D04A00;
		text-decoration: none;
	}
	.mobile-app_right .app-link a {
		background-color: #1b3b8d;
		color: white;
		border: 1px solid #1b3b8d;
	}
	.mobile-app_right .app-link a:hover {
		background-color: #1b308d;
		border: 1px solid #1b308d;
	}
	.emojies-container {
		text-align: left;
	}
	.page-wrap .primary label {
		margin: 20px 0;
	}
	@media (max-width: 870px) {
		.emojies label {
			text-align: center;
			display: block !important;
		}
		.emojis {
			float: left;
			display: block;
		}
		.operator-full-name {
			text-align: center;
		}
		.emojies-container {
			display: block !important;
			 text-align: right;
		}
		.col-md-4, .col-md-8 {
			flex: 0 0 100%;
			max-width: 100%;
		}
	}
	@media (max-width: 350px) {
		.top-container {
			padding: 10px !important;
		}
	}
</style>
<section class="page-wrap">
	<div class="primary" style="max-width: 1200px; margin-bottom: 0; padding: 0; min-height: auto;">
		<?php if (!is_null($isReceiver)): ?>
			<?php
				$photo  = null;
				$name   = null;
				$userId = null;
				if ($isReceiver === false) {
					if ($evaluation['sender']) {
						$photo  = $evaluation['sender']['photo'];
						$name   = $evaluation['sender']['name'];
						$userId = $evaluation['sender']['user_id'];
					}
				}
				if ($isReceiver === true) {
					if ($evaluation['receiver']) {
						$photo  = $evaluation['receiver']['photo'];
						$name   = $evaluation['receiver']['name'];
						$userId = $evaluation['receiver']['user_id'];
					}
				}
			?>
			<?php if ($name and $userId): ?>
				<div class="console"></div>
				<div class="row" style="margin-bottom: 0;">
					<div class="col-md-12 col-lg-12">
						<?php if ($dataResult['ratingCount'] == 0): ?>
							<div style="color: #00B7A7; font-size: 20px; margin-bottom: 10px; text-align: center; text-transform: uppercase; font-weight: bold;" class="rating-title">
								<?= Yii::t('app', 'Evaluate our service') ?>
							</div>
						<?php endif ?>
						<div class="row" style="margin-bottom: 0;">
							<div class="col-md-4 col-lg-4">
								<div style="width: 200px; height: 200px; overflow: hidden; border-radius: 50%; margin: 0 auto">
									<img src="<?= $photo ?>">
								</div>
							</div>
							<?php if ($isReceiver === false and $dataResult['ratingCountSender'] > 0 or $isReceiver === true and $dataResult['ratingCountReceiver'] > 0): ?>
								<div class="col-md-8 col-lg-8" id="user-rating" style="margin-top: 10px;">
									<div class="alert alert-success text-center">
										<?= Yii::t('app', 'Thank you for rating') ?>
									</div>
									<div class="text-center">
										<div class="mobile-app_right mobile-app-min">
											<p style="color: #1b308d; font-weight: bold; font-size: 14px;" class="site-index-min-p">
												<?= Yii::t('app', 'rating_mobile_app_text') ?>
											</p>
											<div class="app-link text-center">
												<a href="https://play.google.com/store/apps/details?id=uz.local.bts" style="margin-right: 0px; margin-bottom: 0px;">
													<div class="icon _icongoogle"></div>
													<div class="appstore">
														<span>Available on the </span>
														<p>Google Play</p>
													</div>
												</a>
											</div>
										</div>
									</div>
								</div>
							<?php else: ?>
								<div class="col-md-8 col-lg-8" id="user-rating">
									<div class="operator-full-name" style="margin-bottom: 25px;"><?= mb_strtoupper($name) ?></div>
									<div class="emojies">
										<?php foreach ($evaluationTypes as $key => $evaluationType): ?>
											<label style="display: inline-block;">
												<?= $evaluationType['name'] ?>
											</label>
											<div class="emojies-container" data-id="<?= $key ?>" style="line-height: 10px; display: inline-block; vertical-align: top; min-width: 235px;">
												<!-- <div> -->
												<span class="rating-stars fa fa-star" data-id="1" data-url="<?= Url::to(['/site/ball', 'evaluation_type' => $evaluationType['id'], 'user_id'=>$userId, 'waybill_id' => $id, 'barcode' => $barcode, 'is_receiver' => $is_receiver, 'ball' => 1]) ?>"></span>
												<span class="rating-stars fa fa-star" data-id="2" data-url="<?= Url::to(['/site/ball', 'evaluation_type' => $evaluationType['id'], 'user_id'=>$userId, 'waybill_id' => $id, 'barcode' => $barcode, 'is_receiver' => $is_receiver, 'ball' => 2]) ?>"></span>
												<span class="rating-stars fa fa-star" data-id="3" data-url="<?= Url::to(['/site/ball', 'evaluation_type' => $evaluationType['id'], 'user_id'=>$userId, 'waybill_id' => $id, 'barcode' => $barcode, 'is_receiver' => $is_receiver, 'ball' => 3]) ?>"></span>
												<span class="rating-stars fa fa-star" data-id="4" data-url="<?= Url::to(['/site/ball', 'evaluation_type' => $evaluationType['id'], 'user_id'=>$userId, 'waybill_id' => $id, 'barcode' => $barcode, 'is_receiver' => $is_receiver, 'ball' => 4]) ?>"></span>
												<span class="rating-stars fa fa-star" data-id="5" data-url="<?= Url::to(['/site/ball', 'evaluation_type' => $evaluationType['id'], 'user_id'=>$userId, 'waybill_id' => $id, 'barcode' => $barcode, 'is_receiver' => $is_receiver, 'ball' => 5]) ?>"></span>
												<!-- </div> -->
												<div class="emojis">
													<div class="user-emoji-mini emoji-item-1" data-id="1">
														<div data-title="Разочарование" class="item-emoji"></div>
														<div class="emoji-text"><?= Yii::t('app', 'Too bad') ?></div>
													</div>
													<div class="user-emoji-mini emoji-item-2" data-id="2">
														<div data-title="Разочарование" class="item-emoji"></div>
														<div class="emoji-text"><?= Yii::t('app', 'Bad') ?></div>
													</div>
													<div class="user-emoji-mini emoji-item-3" data-id="3">
														<div data-title="Разочарование" class="item-emoji"></div>
														<div class="emoji-text"><?= Yii::t('app', 'Average') ?></div>
													</div>
													<div class="user-emoji-mini emoji-item-4" data-id="4">
														<div data-title="Разочарование" class="item-emoji"></div>
														<div class="emoji-text"><?= Yii::t('app', 'Good') ?></div>
													</div>
													<div class="user-emoji-mini emoji-item-5" data-id="5">
														<div data-title="Разочарование" class="item-emoji"></div>
														<div class="emoji-text"><?= Yii::t('app', 'Excellent') ?></div>
													</div>
													<!-- <div class="emojis-help">aaa</div> -->
												</div>
											</div>
										<?php endforeach ?>
									</div>
									<div class="comment">
										<textarea
											data-url="<?= Url::to(['/site/comment', 'user_id'=>$userId, 'waybill_id' => $id, 'barcode' => $barcode, 'is_receiver' => $is_receiver, 'urlTerm' => $urlTerm]) ?>"
											class="form-control"
											placeholder="<?= Yii::t('app', 'Comment') ?>"
											style="margin: 10px 0; resize: none;"
										></textarea>
										<div style="text-align: right;">
											<?php $waybillId = isset($dataResult['history']) ? (isset($dataResult['history']['id']) ? $dataResult['history']['id'] : null) : null ?>
											<?php $waybillBarcode = isset($dataResult['history']) ? (isset($dataResult['history']['barcode']) ? $dataResult['history']['barcode'] : null) : null ?>
											<a href="<?= Url::to(['/site/complaint', 'id' => barcodeToStr($waybillId, true), 'barcode' => barcodeToStr($waybillBarcode, true)]) ?>" class="btn-rating btn-warning" target="_blank" style="margin-bottom: 0; color: #FFFFFF;">
												<i class="far fa-file-alt"></i> <?= Yii::t('app', 'complaint') ?>
											</a>
											<?php if ($dataResult['waybill_image']): ?>
												<?php $file = base64_encode($dataResult['waybill_image']); ?>
												<a href="<?= Url::to(['/site/download', 'file' => $file, 'flagWaybill' => 'yes']) ?>" class="btn-rating btn-warning" target="_blank" style="margin-bottom: 0; color: #FFFFFF;">
													<i class="fas fa-download"></i> <?= Yii::t('app', 'Photo waybill') ?>
												</a>
											<?php endif ?>
											<?php if ($dataResult['photo_report']): ?>
												<?php $file = base64_encode($dataResult['photo_report']); ?>
												<a href="<?= Url::to(['/site/download', 'file' => $file, 'flagReport' => 'yes']) ?>" class="btn-rating btn-warning" target="_blank" style="margin: 0; margin-top: 20px;">
													<i class="fas fa-download"></i> <?= Yii::t('app', 'Photo report') ?>
												</a>
											<?php endif ?>
											<button class="btn-rating btn-warning btn-comment-submit" style="margin-bottom: 0; color: #FFFFFF;"><?= Yii::t('app', 'Submit') ?></button>
										</div>
									</div>
								</div>
							<?php endif ?>
						</div>
						<div id="console"></div>
					</div>
				</div>
			<?php endif ?>
		<?php endif ?>
	</div>
</section>