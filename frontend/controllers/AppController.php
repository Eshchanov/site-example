<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class AppController extends Controller
{
	public function actionAndroid()
	{
		return $this->redirect('https://play.google.com/store/apps/details?id=uz.local.bts');
	}

	public function actionIos()
	{
		return $this->render('ios');
	}
}