<?php
    use common\widgets\Alert;
    use yii\bootstrap4\Html;
    use yii\bootstrap4\ActiveForm;
    use yii\helpers\Url;
    use yii\bootstrap4\Modal;

    $this->title = Yii::t('app', 'complaint');
    $this->params['breadcrumbs'][] = $this->title;

    if (isset($userProfile['name'])) {
        $model->name = $userProfile['name'];
    }
    if (isset($userProfile['phone'])) {
        $model->phone = $userProfile['phone'];
    }
?>
<style type="text/css">
    .form-group.field-meeting-captcha label {
        /*color: #FFFFFF;*/
    }
    [readonly] {
        background: #DDDDDD;
    }
    .tr-success {
        background-color: rgba(0,255,0,0.5) !important;
    }
    .modal-title i {
        font-size: 36px;
    }
    .modal-dialog {
        margin-top: 50px;
    }
    .modal-title {
        margin-top: -45px;
        background: #FFFFFF;
        padding: 15px;
        border-radius: 50%;
        border: 3px solid #ee6800;
    }
    .modal-header .close {
        display: none;
    }
    .modal-header {
        justify-content: center;
        background: #FFFFFF;
        border-bottom: none;
    }
</style>
<section class="page-wrap">
    <div class="container-xl">
        <div class="row">
            <div class="breadcrumbs">
                <ul>
                    <!-- <li>
                        <?= Html::a(Yii::t('app', 'home'), ['site/index'])?>
                    </li>
                    <li>
                        <?= Html::a(Yii::t('app', 'clients'), ['site/calculate'])?>
                    </li> -->

                    <li>
                        <?= Html::a(Yii::t('app', 'home'), ['site/index'])?>
                    </li>
                    <li>
                        <?= Html::a(Yii::t('app', 'cabinet'), ['site/profile'])?>
                    </li>
                    <li>
                        <?= Html::a(Yii::t('app', 'complaint'), ['site/complaint'])?>
                    </li>
                </ul>
            </div>
            <!-- <div class="col-md-3 col-lg-3"> -->
                <?php //= $this->render('_clients-left') ?>
                <?= $this->render('_profile_left') ?>
            <!-- </div> -->
            <div class="col-md-8 col-lg-9">
                <div class="primary" style="overflow: auto;">
                    <div class="row">
                        <div class="col-md-8 col-lg-9">
                            <div class="primary_title">
                                <?php if ($barcode): ?>
                                    <h2><?= divideString($barcode, 3) ?> <?= Yii::t('app', 'Complaint about invoices') ?></h2>
                                <?php else: ?>
                                    <h2><?= Yii::t('app', 'My appeals') ?></h2>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-3"><?= Html::a('<i class="fas fa-plus"></i> ' . Yii::t('app', 'complaint'), ['/site/new-complaint'], [
                            'class' => 'submit-btn btn-success btn-sm create-complaint',
                            'style' => 'margin-bottom: 0;'
                        ]) ?></div>
                    </div>
                    <?= Alert::widget() ?>

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr class="text-center">
                                <td style="width: 50px;">№</td>
                                <td style="width: 120px;"><?= Yii::t('app', 'date_of_appeal') ?></td>
                                <td style="width: 115px;"><?= Yii::t('app', 'appeal_number') ?></td>
                                <td style="width: 125px;"><?= Yii::t('app', 'type_metting') ?></td>
                                <td style="width: 150px; display: none;"><?= Yii::t('app', 'sender_request') ?></td>
                                <td style="width: 180px; display: none;"><?= Yii::t('app', 'phone') ?></td>
                                <td><?= Yii::t('app', 'complaint') ?></td>
                                <td style="width: 120px;"><?= Yii::t('app', 'response_date') ?></td>
                                <td><?= Yii::t('app', 'response_to_appeal') ?></td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $inc = 1; ?>
                            <?php foreach ($meetings as $key => $meeting): ?>
                                <?php $class = '' ?>
                                <?php if ($meeting['solution']): ?>
                                    <?php //$class = 'tr-success'; ?>
                                <?php endif ?>
                                <tr class="<?= $class ?>">
                                    <td class="text-center"><?= $inc++; ?></td>
                                    <td class="text-center">
                                        <?php if ($meeting['date']): ?>
                                            <?= date('d.m.Y', strtotime($meeting['date'])) ?>
                                        <?php endif ?>
                                    </td>
                                    <td><div><?= $meeting['nomer'] ?></div></td>
                                    <td>
                                        <?= isset($meetingCategory[$meeting['customerMeetingCategoryId']]) ? $meetingCategory[$meeting['customerMeetingCategoryId']] : "" ?>
                                    </td>
                                    <td style="display: none;"><?= $meeting['name'] ?></td>
                                    <td style="display: none;"><?= $meeting['phone'] ?></td>
                                    <td><?= $meeting['description'] ?></td>
                                    <td class="text-center">
                                        <?php if ($meeting['closedDate']): ?>
                                            <?= date('d.m.Y', strtotime($meeting['closedDate'])) ?>
                                        <?php endif ?>
                                    </td>
                                    <td class="text-center">
                                        <?php if ($meeting['solution']): ?>
                                            <?php if(strpos($meeting['solution'], '{{') && strpos($meeting['solution'], '}}')):?>
                                             <?php
                                                $meeting['solution'] = str_replace('{{', '', $meeting['solution']);
                                                $meeting['solution'] = str_replace('}}', '', $meeting['solution']);
                                             ?>
                                            <?php endif;?>
                                            <?= Html::a('<i class="fas fa-eye"></i> ' . Yii::t('app', 'view'), 'javascript:void(0)', [
                                                'class' => 'btn-success complaint-view',
                                                'style' => '
                                                    padding: 2px 5px;
                                                    border-radius: 5px;
                                                    font-size: 12px;
                                                    float: none;
                                                    width: 107px;
                                                    display: inline-block;
                                                ',
                                                'data-number'   => $meeting['nomer'],
                                                'data-name'     => $meeting['name'],
                                                'data-phone'    => $meeting['phone'],
                                                'data-desc'     => $meeting['description'],
                                                'data-closed'   => date('d.m.Y', strtotime($meeting['closedDate'])),
                                                'data-solution' => $meeting['solution'],
                                                'data-category' => isset($meetingCategory[$meeting['customerMeetingCategoryId']]) ? $meetingCategory[$meeting['customerMeetingCategoryId']] : "",
                                            ]) ?>
                                        <?php else: ?>
                                            <?= Html::a(Yii::t('app', 'being_studied'), 'javascript:void(0)', ['class' => 'btn-danger', 'style' => 'padding: 2px 5px; border-radius: 5px; font-size: 12px; float: none; width: 107px; display: inline-block;']) ?>
                                        <?php endif ?>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<?php Modal::begin([
    'title' => '<i class="fal fa-bullhorn"></i>',
    'id' => 'modal-complaint',
    // 'size'=>'modal-xl',
    'size'=>'modal-md',
]); ?>
<?php Modal::end(); ?>

<?php
    $this->registerJs("
        $('#meeting-phone').mask('+998 00 000-00-00');
        // $('.create-complaint')
        $('.create-complaint').click(function(e){
            e.preventDefault();
            var loadUrl = $(this).attr('href');
            $('#modal-complaint').modal('show').find('.modal-body').load(loadUrl);
        });
        $('.complaint-view').click(function(){
            var dataNumber = $(this).data('number');
            var dataName = $(this).data('name');
            var dataPhone = $(this).data('phone');
            var dataDesc = $(this).data('desc');
            var dataSolution = $(this).data('solution');
            var dataClosed = $(this).data('closed');
            var dataCategory = $(this).data('category');

            var dataHtml = '<div style=\"text-align: center; margin-bottom: 15px;\">№: <b>' + dataNumber + '</b></div>';
            dataHtml += '<div style=\"text-align: left; margin-bottom: 15px;\"><b>" . Yii::t('app', 'type_metting') . "</b>: ' + dataCategory + '</div>';
            dataHtml += '<div style=\"text-align: left; margin-bottom: 15px;\"><b>" . Yii::t('app', 'response_date') . "</b>: ' + dataClosed + '</div>';
            dataHtml += '<div style=\"text-align: left; margin-bottom: 15px;\"><b>" . Yii::t('app', 'response_to_appeal') . "</b>: ' + dataSolution + '</div>';
            dataHtml = '<div style=\"font-size: 18px; line-height: 25px;\">' + dataHtml + '</div>';
            $('#modal-complaint').modal('show').find('.modal-body').html(dataHtml);
        });
    ");
?>