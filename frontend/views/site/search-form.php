<?php
	use yii\helpers\Html;
	use yii\helpers\Url;
	use common\widgets\Alert;
	use yii\bootstrap4\ActiveForm;

	$this->title = Yii::t('app', 'observe');
?>
<div class="container-xl">
	<div class="sign-in">
		<div class="sign-in-body" style="margin: 30px 0; font-size: 18px;">
			<?= Alert::widget() ?>
			<h2 class="title text-center"><?= Yii::t('app', 'observe') ?></h2>
			<?php $form = ActiveForm::begin(); ?>
				<?= $form->field($model, 'q')->textInput(['class' => '', 'style' => 'margin-bottom: 0;']) ?>
				<?= $form->field($model, 'captcha')->widget(\yii\captcha\Captcha::className(), [
					'options' => [
						'class' => '',
						'style' => 'margin-bottom: 0;'
					],
					'template' => '<div class="row"><div class="col-lg-4" style="padding-right: 0; padding-top: 10px; margin-right: -20px;">{image}</div><div class="col-lg-8" style="padding: 0;">{input}</div></div>',
				])->label(false)->hint(Yii::t('app', 'Hint: click on the equation to refresh')) ?>
				<div style="text-align: right;">
					<button type="submit" class="submit-btn" style="margin-bottom: 0;"><?= Yii::t('app', 'Search')?></button>
				</div>
			<?php ActiveForm::end(); ?>
		</div>
	</div>
</div>