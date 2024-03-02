<?php
	use yii\helpers\Html;
	$this->title = Yii::t('app', 'login');
?>
<div class="site-about">
	<section class="page-wrap">
		<div class="container-xl">
			<div class="row">
				<div class="breadcrumbs">
					<ul>
						<li>
							<?= Html::a(Yii::t('app', 'home'), ['site/index'])?>
						</li>
						<li>
							<?= Html::a(Yii::t('app', 'login'), ['site/login'])?>
						</li>
					</ul>
				</div>
				<div class="col-md-2 col-lg-2">
					<?php //= $this->render('/site/_about_left') ?>
				</div>
				<div class="col-md-8 col-lg-8">
					<div class="primary">
						<div class="primary_title text-center">
							<h2><?= Yii::t('app', 'login') ?></h2>
						</div>
						<div style="text-align: center;">
							<?php if ($state == 'begin'): ?>
								<form action="https://sso.egov.uz/sso/oauth/Authorization.do" method="GET">
									<input type="hidden" name="response_type" value="one_code">
									<input type="hidden" name="client_id" value="BTS_Express_Cargo_Service_SPACE">
									<input type="hidden" name="redirect_uri" value="http://bts.site/one-id/begin">
									<input type="hidden" name="Scope" value="one_code">
									<input type="hidden" name="state" value="get-code">
									<button type="submit">
										<img src="/img/one-id.png" style="border-radius: 15px;">
									</button>
								</form>
							<?php endif ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>