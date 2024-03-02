<?php

namespace frontend\controllers;

use common\models\Team;
use common\models\TeamSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * TeamController implements the CRUD actions for Team model.
 */
class TeamController extends Controller
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
     * Lists all Team models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TeamSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Team model.
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
     * Creates a new Team model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Team();

        $time = time();
        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->photo = UploadedFile::getInstance($model, 'photo');
                if ($model->photo->saveAs('img/team/'. $time . '.'.$model->photo->extension)){
                    $model->photo = $time . '.'.$model->photo->extension;
                    if ($model->save(false)){
                        return $this->redirect(['view', 'id' => $model->id]);
                    } else {
                        Yii::$app->session->setFlash('error', 'Jamoa qo\'shishda xatolik ketdi. Iltimos qaytadan urunib koring.');
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
     * Updates an existing Team model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $time = time();
        if ($this->request->isPost && $model->load($this->request->post())) {
            $model->photo = UploadedFile::getInstance($model, 'photo');
            if ($model->photo->saveAs('img/team/'. $time . '.'.$model->photo->extension)){
                $model->photo = $time . '.'.$model->photo->extension;
                if ($model->save(false)){
                    return $this->redirect(['view', 'id' => $model->id]);
                } else {
                    Yii::$app->session->setFlash('error', 'Jamoa o\'zgartirishda xatolik ketdi. Iltimos qaytadan urunib koring.');
                }
            } else {
                Yii::$app->session->setFlash('error', 'Rasm yuklashda xatolik. Iltimos qaytadan urunib ko\'ring.');
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Team model.
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
     * Finds the Team model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Team the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Team::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
