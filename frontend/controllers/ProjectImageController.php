<?php

namespace frontend\controllers;

use common\models\ProjectImage;
use common\models\ProjectImageSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ProjectImageController implements the CRUD actions for ProjectImage model.
 */
class ProjectImageController extends Controller
{
    public function __construct($id, $module, $config = [])
    {
        parent::__construct($id, $module, $config);
        if (Yii::$app->user->isGuest){
            return $this->goHome();
        } else {
            if (Yii::$app->user->identity->role != 100){
                return $this->goHome();
            }
        }
        $this->layout = 'admin';
    }
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Creates a new ProjectImage model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = new ProjectImage();

        $time = time();
        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->project_id = $id;
                $model->image = UploadedFile::getInstance($model, 'image');
                if ($model->image->saveAs('img/projects/'. $time . '.'.$model->image->extension)){
                    $model->image = $time . '.'.$model->image->extension;
                    if ($model->save(false)){
                        return $this->redirect(['project/view', 'id' => $id]);
                    } else {
                        Yii::$app->session->setFlash('error', 'Proektga rasm qo\'shishda xatolik ketdi. Iltimos qaytadan urunib ko\'ring.');
                    }
                } else {
                    Yii::$app->session->setFlash('error', 'Rasm yuklashda xatolik. Iltimos qaytadan urunib ko\'ring.');
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ProjectImage model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $time = time();
        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->project_id = $id;
                $model->image = UploadedFile::getInstance($model, 'image');
                if ($model->image->saveAs('img/projects/'. $time . '.'.$model->image->extension)){
                    $model->image = $time . '.'.$model->image->extension;
                    if ($model->save(false)){
                        return $this->redirect(['project/view', 'id' => $id]);
                    } else {
                        Yii::$app->session->setFlash('error', 'Proektga rasm qo\'shishda xatolik ketdi. Iltimos qaytadan urunib ko\'ring.');
                    }
                } else {
                    Yii::$app->session->setFlash('error', 'Rasm yuklashda xatolik. Iltimos qaytadan urunib ko\'ring.');
                }
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ProjectImage model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ProjectImage model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ProjectImage the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ProjectImage::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
