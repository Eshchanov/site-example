<?php
	use yii\helpers\Html;
?>
<style type="text/css">
	.payment-links {
		max-width: 110px;
		border: 1px solid #DDDDDD;
		border-radius: 5px;
		padding: 5px;
		box-shadow: 2px 1px 1px #777777;
		position: relative;
	}
	.payment-links:hover {
		background: #DDDDDD;
	}
</style>
<div style="padding: 15px;">
	<center>
		<h4>
			<?= number_format($array['allCost'], 0, ',', ' ') ?> <?= Yii::t('app', 'so`m') ?>
		</h4>
	</center>
	<div class="row">
		<div class="col-lg-7"><?= Yii::t('app', 'senderDeliveryCost') ?>:</div>
		<div class="col-lg-5 text-right"><?= number_format($array['senderDeliveryCost'], 0, ',', ' ') ?> <?= Yii::t('app', 'so`m') ?></div>
	</div>
	<div class="row">
		<div class="col-lg-7"><?= Yii::t('app', 'transportCost') ?>:</div>
		<div class="col-lg-5 text-right"><?= number_format($array['transportCost'], 0, ',', ' ') ?> <?= Yii::t('app', 'so`m') ?></div>
	</div>
	<div class="row">
		<div class="col-lg-7"><?= Yii::t('app', 'receiverDeliveryCost') ?>:</div>
		<div class="col-lg-5 text-right"><?= number_format($array['receiverDeliveryCost'], 0, ',', ' ') ?> <?= Yii::t('app', 'so`m') ?></div>
	</div>
	<hr>
	<div class="row">
		<div class="col-lg-7"><?= Yii::t('app', 'allCost') ?>:</div>
		<div class="col-lg-5 text-right"><?= number_format($array['allCost'], 0, ',', ' ') ?> <?= Yii::t('app', 'so`m') ?></div>
	</div>
	<?php if (is_null($customerId)): ?>
		<hr>
		<div class="row">
			<div class="col-lg-7"><?= Yii::t('app', 'balance') ?>:</div>
			<div class="col-lg-5 text-right"><?= number_format($array['balance'], 0, ',', ' ') ?> <?= Yii::t('app', 'so`m') ?></div>
		</div>
		<div class="row">
			<div class="col-lg-7"><?= Yii::t('app', 'payinAmount') ?>:</div>
			<div class="col-lg-5 text-right"><?= number_format($array['payinAmount'], 0, ',', ' ') ?> <?= Yii::t('app', 'so`m') ?></div>
		</div>
		<hr>
		<center>
			<h4>
				<?= Yii::t('app', 'SelectPaymentType') ?>
			</h4>
		</center>
		<div class="row justify-content-center">
			<?php if (isset($array['paySystems'])): ?>
				<?php foreach ($array['paySystems'] as $key => $value): ?>
					<div class="col-lg-4 col-4">
						<center>
							<?php
								$flag = true;
								$cursor = 'cursor: pointer;';
							?>
							<?php if (!$value['active']): ?>
								<?php
									$flag = false;
									$cursor = 'cursor: not-allowed;';
								?>
							<?php endif ?>
							<div class="payment-links" style="<?= $cursor ?> margin-bottom: 15px;" data-link="<?php if ($flag): ?>?paymentId=<?= $value['id'] ?><?php endif ?>" <?php if (!$flag): ?>disabled<?php endif ?>>
								<img src="<?= $value['icon'] ?>" style="max-width: 100%;">
								<?php if (!$value['active']): ?>
									<span style="position: absolute; background: #001327; left: 0; right: -2px; bottom: -2px; border-radius: 5px; color: #DDDDDD; font-size: 12px;"><?= Yii::t('app', 'Prevention') ?></span>
								<?php endif ?>
							</div>
						</center>
					</div>
				<?php endforeach ?>
			<?php endif ?>
		</div>
	<?php else: ?>
		<div class="row" style="margin-top: 15px; padding: 15px;">
			<div class="col-lg-6">
				<center>
					<span class="modal-close" style="cursor: pointer; color: #EE6800; padding: 15px;"><?= Yii::t('app', 'Back') ?></span>
				</center>
			</div>
			<div class="col-lg-6">
				<center>
					<span class="contract-confirm" style="cursor: pointer; color: #00B7A7; padding: 15px;"><?= Yii::t('app', 'Confirm') ?></span>
				</center>
			</div>
		</div>
	<?php endif ?>
</div>