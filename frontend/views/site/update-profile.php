<?php
	use yii\helpers\Html;
	use yii\helpers\Url;
	use yii\bootstrap4\ActiveForm;
	use kartik\date\DatePicker;

	$this->title = Yii::t('app', 'cabinet');

	$gender = [
		'male' => Yii::t('app', 'male'),
		'female' => Yii::t('app', 'female'),
	];
?>
<style type="text/css">
	.input-group .input-group-prepend {
		/*display: none;*/
	}
	.input-group .krajee-datepicker {
		position: relative;
		-webkit-box-flex: 1;
		-ms-flex: 1 1 auto;
		flex: 1 1 auto;
		width: calc(100% - 90px);
		margin-bottom: 0;
	}
</style>
<div class="site-profile">
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
							<?= Html::a(Yii::t('app', 'profile'), ['site/profile'])?>
						</li>
					</ul>
				</div>
				<?= $this->render('_profile_left') ?>
				<div class="col-md-8 col-lg-9">
					<div class="primary">
						<div class="primary_title">
							<h2><?= Yii::t('app', 'cabinet') ?></h2>
						</div>
						<div class="alert alert-danger text-center">
							<?= Yii::t('app', 'Correct address') ?>
						</div>
						<?php $form = ActiveForm::begin(['id' => 'update-profile-form']); ?>
							<div class="row" style="margin-bottom: 0;">
								<div class="col-lg-4">
									<?= $form->field($model, 'name2')->textInput(['class' => '']) ?>
								</div>
								<div class="col-lg-4">
									<?= $form->field($model, 'name')->textInput(['class' => '']) ?>
								</div>
								<div class="col-lg-4">
									<?= $form->field($model, 'name1')->textInput(['class' => '']) ?>
								</div>
							</div>
							<div class="row" style="margin-bottom: 0;">
								<div class="col-lg-6">
									<?= $form->field($model, 'regionId')->dropDownList($regions, ['class' => '']) ?>
								</div>
								<div class="col-lg-6">
									<?= $form->field($model, 'cityId')->dropDownList($cities, ['class' => '']) ?>
								</div>
							</div>
							<div class="row" style="margin-bottom: 0;">
								<div class="col-lg-4">
									<?= $form->field($model, 'street')->textInput(['class' => '']) ?>
								</div>
								<div class="col-lg-4">
									<?= $form->field($model, 'houseNumber')->textInput(['class' => '']) ?>
								</div>
								<div class="col-lg-4">
									<?= $form->field($model, 'apartmentNumber')->textInput(['class' => '']) ?>
								</div>
							</div>
							<?= $form->field($model, 'landmark')->textInput(['class' => '']) ?>
							<div class="row" style="margin-bottom: 0;">
								<div class="col-lg-6">
									<?= $form->field($model, 'phone')->textInput(['class' => '']) ?>
								</div>
								<div class="col-lg-6">
									<?= $form->field($model, 'phone1')->textInput(['class' => '']) ?>
								</div>
							</div>
							<div class="row" style="margin-bottom: 0;">
								<div class="col-lg-6">
									<?= $form->field($model, 'passportSeries')->textInput(['class' => '']) ?>
								</div>
								<div class="col-lg-6">
									<?= $form->field($model, 'passportNumber')->textInput(['class' => '']) ?>
								</div>
							</div>
							<div class="row" style="margin-bottom: 0;">
								<div class="col-lg-6">
									<?= $form->field($model, 'birthdate')->widget(DatePicker::classname(), [
										'pluginOptions' => [
											'autoclose' => true,
											'format' => 'dd.mm.yyyy',
										],
										'options' => [
											'class' => '',
										],
										'addInputCss' => '',
									]); ?>
								</div>
								<div class="col-lg-6">
									<?= $form->field($model, 'gender')->dropDownList($gender, ['class' => '']) ?>
								</div>
							</div>
							<div style="text-align: right;">
								<button type="submit" class="submit-btn" style="margin-bottom: 0;"><?= Yii::t('app', 'Submit')?></button>
							</div>
						<?php ActiveForm::end(); ?>
					</div>
				</div>
			</div>
		</div>
	</section>	
</div>
<option value=""></option>

<?php
	$this->registerJs("
		$('#updateprofile-phone, #updateprofile-phone1').mask('+998 00 000-00-00');
		$('#updateprofile-birthdate').mask('00.00.0000');

		$('#updateprofile-regionid').change(function(){
			var valId = $(this).val();
			$.get('" . Url::to(['site/get-cities']) . "', {
				regionId: valId
			}, function(data) {
				$('#updateprofile-cityid').html(data);
			})
		})
	")
?>