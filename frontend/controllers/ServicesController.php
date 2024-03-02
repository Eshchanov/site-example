<?php

namespace frontend\controllers;

use common\models\Services;
use common\models\ServicesSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ServicesController implements the CRUD actions for Services model.
 */
class ServicesController extends Controller
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
     * Lists all Services models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ServicesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Services model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Services model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Services();

        $time = time();
        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->image = UploadedFile::getInstance($model, 'image');
                if ($model->image->saveAs('img/services/'. $time . '.'.$model->image->extension)){
                    $model->image = $time . '.'.$model->image->extension;
                    $model->image_home = UploadedFile::getInstance($model, 'image_home');
                    if ($model->image_home->saveAs('img/services/'. $time . 'home.'.$model->image_home->extension)){
                        $model->image_home = $time . 'home.'.$model->image_home->extension;
                        if ($model->save(false)){
                            return $this->redirect(['view', 'id' => $model->id]);
                        } else {
                            Yii::$app->session->setFlash('error', 'Xizmat qo\'shishda xatolik ketdi. Iltimos qaytadan urunib koring.');
                        }
                    } else {
                        Yii::$app->session->setFlash('error', '(Bosh sahifa) Rasm yuklashda xatolik. Iltimos qaytadan urunib ko\'ring.');
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
     * Updates an existing Services model.
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
                $model->image = UploadedFile::getInstance($model, 'image');
                if ($model->image->saveAs('img/services/'. $time . '.'.$model->image->extension)){
                    $model->image = $time . '.'.$model->image->extension;
                    $model->image_home = UploadedFile::getInstance($model, 'image_home');
                    if ($model->image_home->saveAs('img/services/'. $time . 'home.'.$model->image_home->extension)){
                        $model->image_home = $time . 'home.'.$model->image_home->extension;
                        if ($model->save(false)){
                            return $this->redirect(['view', 'id' => $model->id]);
                        } else {
                            Yii::$app->session->setFlash('error', 'Xizmat qo\'shishda xatolik ketdi. Iltimos qaytadan urunib koring.');
                        }
                    } else {
                        Yii::$app->session->setFlash('error', '(Bosh sahifa) Rasm yuklashda xatolik. Iltimos qaytadan urunib ko\'ring.');
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
     * Deletes an existing Services model.
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
     * Finds the Services model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Services the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Services::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
