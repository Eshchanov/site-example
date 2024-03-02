<style type="text/css">
	.individual-item {
		display: flex;
		column-gap: 25px;
		min-height: 45px;
		align-items: center;
		padding: 10px 5px;
		padding-left: 10px;
		border-bottom: 1px solid #CCC;
		cursor: pointer;
	}
	.individual-item:hover {
		background: #E4E4E4;
	}
</style>
<div class="individual-item" data-jsondata='new'>
	<img src="/img/user-placeholder.png" style="width: 100px; border-radius: 50%; background-color: #DDDDDD;">
	<div>
		<p style="margin-bottom: 0; font-weight: bold;">
			<?= Yii::t('app', 'New Receiver') ?>
		</p>
	</div>
</div>
<?php foreach ($resData as $key => $value): ?>
	<?php $json = base64_encode(json_encode($value)); ?>
	<div class="individual-item" data-jsondata='<?= $json ?>'>
		<?php if ($value['thumb']): ?>
			<img src="<?= $value['thumb'] ?>" style="width: 100px; border-radius: 50%;">
		<?php else: ?>
			<img src="/img/placeholder.jpg" style="width: 100px; border-radius: 50%;">
		<?php endif ?>
		<div>
			<p style="margin-bottom: 0; font-weight: bold;">
				<?= $value['fullName'] ?>
			</p>
			<p style="margin-bottom: 5px; color: #999; line-height: 15px; margin-top: 10px;">
				<?= $value['phone'] ?>
			</p>
			<p style="margin-bottom: 0; font-size: 12px; color: #999; line-height: 15px;">
				<?php if (!empty($regions)): ?>
					<?= $regions[$value['regionId']] ?>,
				<?php endif ?>
				<?php if (!empty($cities)): ?>
					<?= isset($cities[$value['cityId']]) ? $cities[$value['cityId']] : ''; ?>,
				<?php endif ?>
				<?= $value['address'] ?>
				<?= $value['landmark'] ?>
			</p>
		</div>
	</div>
<?php endforeach ?>