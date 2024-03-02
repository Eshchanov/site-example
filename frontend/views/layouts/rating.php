<?php
use frontend\assets\RatingAsset;
use yii\bootstrap4\Html;

RatingAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
	<head>
		<meta charset="<?= Yii::$app->charset ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<?php $this->registerCsrfMetaTags() ?>
		<title><?= Html::encode($this->title) ?></title>
		<?php $this->head() ?>
		<style type="text/css">
			img {
				max-width: 100%;
			}
		</style>
	</head>
	<body style="background-color: #EEEEEE;">
		<?php $this->beginBody() ?>
		<div class="top-container" style="margin: 10px auto; min-height: auto; max-width: 900px; padding: 20px; background: #FFFFFF; font-size: 130%;">
			<?= $content ?>
		</div>
		<?php $this->endBody() ?>
		<script type="text/javascript">
			$(function(){
				var oneVal = [];
				oneVal[0] = 0;
				oneVal[1] = 0;
				oneVal[2] = 0;
				$('.rating-stars').click(function(){
					var parentVal = $(this).closest('div').data('id');
					$('.rating-stars').removeClass('checked');
					var thisNumber = $(this).data('id');
					if (thisNumber == oneVal[parentVal]) {
						oneVal[parentVal] = 0;
					} else {
						oneVal[parentVal] = thisNumber;
					}
					sendRating($(this).data("url"));
					addChecked();
				});
				$('.rating-stars').hover(
					function(){
						var parentVal = $(this).closest('div').data('id');
						var thisNumber = $(this).data('id');
						addHover(thisNumber, 'hover', parentVal);
					},
					function(){
						addChecked();
					},
				);
				
				function addChecked() {
					$('.rating-stars').removeClass('checked');
					$('.rating-stars').removeClass('hover');
					$('.user-emoji-mini').css('display', 'none');
					for (var i = 2; i >= 0; i--) {
						for (var j = oneVal[i]; j >= 1; j--) {
							$('div[data-id="'+i+'"] .rating-stars[data-id="'+j+'"]').addClass('checked');
							if (oneVal[i] == j) {
								$('div[data-id="'+i+'"] .user-emoji-mini[data-id="'+j+'"]').css('display', 'block');
							}
						}
					}
				}
				function addHover(number, className, parent) {
					$('div[data-id="'+parent+'"] .rating-stars').removeClass('checked');
					$('div[data-id="'+parent+'"] .rating-stars').removeClass('hover');
					$('div[data-id="'+parent+'"] .user-emoji-mini').css('display', 'none');
					for (var i = number; i >= 1; i--) {
						$('div[data-id="'+parent+'"] .rating-stars[data-id="'+i+'"]').addClass(className);
						if (i == number) {
							$('div[data-id="'+parent+'"] .user-emoji-mini[data-id="'+i+'"]').css('display', 'block');
						}
					}
				}
				function sendRating(url) {
					$.ajax({
						url: url,
						type: 'GET',
						// data: { myData: 'This is my data.' },
						success: function (data, status, xhr) {
							console.log(data);
						}
					});
				}
				var ratingMessage = '<?= Yii::t('app', 'Thank you for rating') ?>';

				var newRatingMessage = '<div class="alert alert-success text-center"><?= Yii::t('app', 'Thank you for rating') ?></div><div class="text-center"><div class="mobile-app_right mobile-app-min"><p style="color: #1b308d; font-weight: bold; font-size: 14px;" class="site-index-min-p"><?= Yii::t('app', 'rating_mobile_app_text') ?></p><div class="app-link text-center"><a href="https://play.google.com/store/apps/details?id=uz.local.bts" style="margin-right: 0px; margin-bottom: 0px;"><div class="icon _icongoogle"></div><div class="appstore"><span>Available on the </span><p>Google Play</p></div></a></div></div></div>'

				$('.comment .btn-comment-submit').click(function(){
					var sendUrl = $('.comment textarea').attr('data-url');
					var userComment = $('.comment textarea').val();
					$.ajax({
						url: sendUrl,
						type: 'POST',
						data: {
							comment: userComment
						},
						success: function (data, status, xhr) {
							$('#user-rating').html(newRatingMessage);
							$('.rating-title').css('display', 'none');
						}
					});
				});
			});
		</script>
	</body>
</html>
<?php $this->endPage();
