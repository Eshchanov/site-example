<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class NashiOfisiController extends Controller
{
    public function actionIndex()
    {
        return $this->redirect(['/site/office']);
    }
}
