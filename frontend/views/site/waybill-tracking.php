	<?php
	use yii\helpers\Url;
?>
<?php $this->title = Yii::t('app', 'Tracking') ?>
<style type="text/css">
	.user-emoji-mini .item-emoji {
		width: 30px;
		height: 30px;
		display: block;
		background: url(/img/emoji-mini.png) no-repeat;
		transition: all 0.25s;
		cursor: pointer;
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
	.br-wrapper.br-theme-css-stars {
		display: inline-block;
		vertical-align: bottom;
	}
	.emojies label {
		min-width: 215px;
	}
	@media screen and (max-width: 768px) {
		.history-item {
			font-size: 12px;
		}
		.col-3, .col-4, .col-5 {
			padding-left: 5px;
			padding-right: 5px;
			text-align: center;
		}
		.min-order-1 {
			order: 1;
		}
		.min-order-2 {
			order: 2;
		}
		.min-order-1 div {
			justify-content: space-between !important;
		}
		.min-hidden {
			display: none;
		}
	}
</style>
<section class="page-wrap">
	<div class="container-xl">
		<div class="primary" style="margin: 30px auto; min-height: auto; max-width: 1200px;">
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
					<div class="row">
						<div class="col-md-12 col-lg-12">
							<div style="color: #00B7A7; font-size: 20px; margin-bottom: 10px; text-align: center;">
								<?= Yii::t('app', 'Evaluate our service') ?>
							</div>
							<div class="row">
								<div class="col-md-3 col-lg-3">
									<div style="width: 200px; height: 200px; overflow: hidden; border-radius: 50%; margin: 0 auto">
										<img src="<?= $photo ?>">
									</div>
								</div>
								<div class="col-md-9 col-lg-9" id="user-rating">
									<div style="margin-bottom: 25px;"><?= mb_strtoupper($name) ?></div>
									<div class="emojies">
										<?php foreach ($evaluationTypes as $key => $evaluationType): ?>
											<div class="links">
												<div id="stars-<?= $evaluationType['id'] ?>-1" data-url="<?= Url::to(['/site/ball', 'evaluation_type' => $evaluationType['id'], 'user_id'=>$userId, 'waybill_id' => $id, 'barcode' => $barcode, 'is_receiver' => $is_receiver, 'ball' => 1]) ?>"></div>
												<div id="stars-<?= $evaluationType['id'] ?>-2" data-url="<?= Url::to(['/site/ball', 'evaluation_type' => $evaluationType['id'], 'user_id'=>$userId, 'waybill_id' => $id, 'barcode' => $barcode, 'is_receiver' => $is_receiver, 'ball' => 2]) ?>"></div>
												<div id="stars-<?= $evaluationType['id'] ?>-3" data-url="<?= Url::to(['/site/ball', 'evaluation_type' => $evaluationType['id'], 'user_id'=>$userId, 'waybill_id' => $id, 'barcode' => $barcode, 'is_receiver' => $is_receiver, 'ball' => 3]) ?>"></div>
												<div id="stars-<?= $evaluationType['id'] ?>-4" data-url="<?= Url::to(['/site/ball', 'evaluation_type' => $evaluationType['id'], 'user_id'=>$userId, 'waybill_id' => $id, 'barcode' => $barcode, 'is_receiver' => $is_receiver, 'ball' => 4]) ?>"></div>
												<div id="stars-<?= $evaluationType['id'] ?>-5" data-url="<?= Url::to(['/site/ball', 'evaluation_type' => $evaluationType['id'], 'user_id'=>$userId, 'waybill_id' => $id, 'barcode' => $barcode, 'is_receiver' => $is_receiver, 'ball' => 5]) ?>"></div>
											</div>
											<label for="vol2" style="display: inline-block;">
												<?= $evaluationType['name'] ?>
											</label>
											<select id="css-stars-<?= $evaluationType['id'] ?>" style="display: none;">
												<option value="#stars-<?= $evaluationType['id'] ?>-1" data-html='
													<div class="user-emoji-mini emoji-item-1 active">
														<div data-title="Разочарование" class="item-emoji"></div>
													</div>
												'>1</option>
												<option value="#stars-<?= $evaluationType['id'] ?>-2" data-html='
													<div class="user-emoji-mini emoji-item-2 active">
														<div data-title="Разочарование" class="item-emoji"></div>
													</div>
												'>2</option>
												<option value="#stars-<?= $evaluationType['id'] ?>-3" data-html='
													<div class="user-emoji-mini emoji-item-3 active">
														<div data-title="Разочарование" class="item-emoji"></div>
													</div>
												'>3</option>
												<option value="#stars-<?= $evaluationType['id'] ?>-4" data-html='
													<div class="user-emoji-mini emoji-item-4 active">
														<div data-title="Разочарование" class="item-emoji"></div>
													</div>
												' selected>4</option>
												<option value="#stars-<?= $evaluationType['id'] ?>-5" data-html='
													<div class="user-emoji-mini emoji-item-5 active">
														<div data-title="Разочарование" class="item-emoji"></div>
													</div>
												'>5</option>
											</select>
										<?php endforeach ?>
									</div>
									<div class="row">
										<div class="col-md-7">
											<div class="comment">
												<textarea data-url="<?= Url::to(['/site/comment', 'user_id'=>$userId, 'waybill_id' => $id, 'barcode' => $barcode, 'is_receiver' => $is_receiver]) ?>" style="resize: none; border-radius: 15px; text-indent: 0; padding: 5px 10px;" placeholder="<?= Yii::t('app', 'Comment') ?>"></textarea>
												<div style="text-align: right;">
													<button class="submit-btn"><?= Yii::t('app', 'Submit') ?></button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div id="console"></div>
						</div>
					</div>
				<?php endif ?>
			<?php endif ?>
			<?php if (is_null($isReceiver)): ?>
				<?php if (!empty($dataResult)): ?>
					<div class="row min-hidden" style="border-bottom: 1px solid #dddddd; margin-bottom: 0;">
						<div class="col-md-7 col-lg-7">
							<div class="row">
								<div class="col-3">
									<?= Yii::t('app', 'Date') ?>
								</div>
								<div class="col-4">
									<?= Yii::t('app', 'Barcode') ?>
								</div>
								<div class="col-5">
									<?= Yii::t('app', 'direction') ?>
								</div>
							</div>
						</div>
						<div class="col-md-5 col-lg-5">
							<div style="display: flex; flex-wrap: wrap; column-gap: 25px; min-height: 45px; align-items: center; justify-content: flex-end;">
								<div>
									<?= Yii::t('app', 'Sender') ?>
								</div>
							</div>
						</div>
					</div>
					<?php $history = $dataResult['history'] ?>
					<div class="row history-item" style="border-bottom: 1px solid #dddddd; margin-bottom: 0;">
						<div class="col-md-7 col-lg-7 min-order-2">
							<div class="row">
								<div class="col-3">
									<?= date('d.m.Y', strtotime($history['date'])) ?>
								</div>
								<div class="col-4">
									<b><?= divideString($history['barcode'], 3) ?></b>
								</div>
								<div class="col-5">
									<div class="in" style="display: inline-block;"><?= $history['senderRegionName']; ?></div>
									<div class="icon _iconright-arrow" style="display: inline-block;"></div>
									<div class="out" style="display: inline-block;"><?= $history['regionName'] ?></div>
								</div>
							</div>
						</div>
						<div class="col-md-5 col-lg-5 min-order-1">
							<div style="display: flex; flex-wrap: wrap; column-gap: 25px; min-height: 45px; align-items: center; justify-content: flex-end;">
								<div>
									<?= $history['name'] ?>
								</div>
								<div style="min-width: 35px;">
									<?php if ($history['avatar']): ?>
										<img height="35" style="border-radius: 50%" src="<?= $history['avatar'] ?>">
									<?php endif ?>
								</div>
							</div>
						</div>
						<div class="col-md-12 col-lg-12 history-item-tracking" style="display: none;">
							<div style="text-align: center;"><img src="/img/loading.gif" style="height: 200px;"></div>
						</div>
					</div>
				<?php endif ?>
				<?php
					$result = Yii::$app->controller->renderPartial('tracking', [
						'dataTracking' => $dataResult,
					]);
					echo $result;
				?>
			<?php endif ?>
		</div>
	</div>
</section>

<?php
	$this->registerJs("
		var ratingMessage = '" . Yii::t('app', 'Thank you for rating') . "';
		$('.user-emoji').click(function(){
			$('.user-emoji').not(this).removeClass('active');
			$(this).addClass('active');
			var dataUrl = $(this).attr('data-url');
			$.ajax({
				url: dataUrl,
				type: 'GET',
				// data: { myData: 'This is my data.' },
				success: function (data, status, xhr) {
					// console.log(data);
				}
			});
		});
		$('#css-stars-1, #css-stars-2, #css-stars-3').barrating({
			theme: 'css-stars',
			onSelect:function (value, text, event) {
				var sendUrl = $(value).attr('data-url');
				$.ajax({
					url: sendUrl,
					type: 'GET',
					success: function (data, status, xhr) {
						// console.log(data);
						// $('.console').html(data);
					}
				});
			}
		});
		$('.comment .submit-btn').click(function(){
			var sendUrl = $('.comment textarea').attr('data-url');
			var userComment = $('.comment textarea').val();
			$.ajax({
				url: sendUrl,
				type: 'POST',
				data: {
					comment: userComment
				},
				success: function (data, status, xhr) {
					$('#user-rating').html('<div class=\"alert alert-success\">' + ratingMessage + '</div>');
					// console.log(data);
					// $('.console').html(data);
				}
			});
		});
	");
?>