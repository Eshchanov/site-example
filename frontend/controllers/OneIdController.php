<?php

namespace frontend\controllers;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\httpclient\Client;

class OneIdController extends Controller
{
	public function actionBegin($code = null, $state = 'begin')
	{
		$url = 'https://sso.egov.uz/sso/oauth/Authorization.do';
		$flag = true;
		$scope = null;
		$accessToken = null;

		if ($code) {
			$client = new Client([
				'transport' => 'yii\httpclient\CurlTransport'
			]);
			$array = [
				'grant_type' 	=> 'one_authorization_code',
				'client_id' 	=> 'BTS_Express_Cargo_Service_SPACE',
				'client_secret' => 'uNdja2YHjYi8WMNWrcdABtUx',
				'redirect_uri' 	=> 'http://bts.site/one-id/begin',
				'code' 			=> $code
			];
			try {
				$response = $client->createRequest()
					->setMethod('POST')
					->setUrl($url)
					->setData($array)
					->send();
			} catch (\Exception $e) {
				$flag = false;
				$error = $e->getMessage();
			}

			if ($flag and $response->isOk) {
				$result = json_decode($response->content, true);
				$scope = $result['scope'];
				$accessToken = $result['access_token'];
			}

			if ($flag and $scope and $accessToken) {
				$client = new Client([
					'transport' => 'yii\httpclient\CurlTransport'
				]);
				$array = [
					'grant_type' 	=> 'one_access_token_identify',
					'client_id' 	=> 'BTS_Express_Cargo_Service_SPACE',
					'client_secret' => 'uNdja2YHjYi8WMNWrcdABtUx',
					'access_token'  => $accessToken,
					'scope'			=> $scope
				];
				try {
					$response = $client->createRequest()
						->setMethod('POST')
						->setUrl($url)
						->setData($array)
						->send();
				} catch (\Exception $e) {
					$flag = false;
					$error = $e->getMessage();
				}

				if ($flag and $response->isOk) {
					$result = json_decode($response->content, true);
					vd($result);
				}
			}
		}
		return $this->render('begin', [
			'code'  => $code,
			'state' => $state,
		]);
	}

	public function actionDelete($id)
	{
		$this->findModel($id)->delete();

		return $this->redirect(['index']);
	}

	protected function findModel($id)
	{
		if (($model = Profile::findOne($id)) !== null) {
			return $model;
		}
		throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
	}
}
