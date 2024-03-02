<?php

namespace frontend\controllers;

use common\models\Condition;
use common\models\Document;
use common\models\Faq;
use common\models\General;
use common\models\Lang;
use common\models\News;
use common\models\Office;
use common\models\PrivancyPolicy;
use common\models\Profile;
use common\models\Project;
use common\models\Region;
use common\models\Review;
use common\models\Services;
use common\models\Slider;
use common\models\Team;
use common\models\User;
use common\models\Vacancy;
use common\models\BtsRegion;
use common\models\BtsCity;
use common\models\UpdateProfile;
use common\models\Waybill;
use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyForm;
use frontend\models\ForgotPasswordForm;
use frontend\models\BtsUpdatePassword;
use frontend\models\Search;
use frontend\models\Calculate;
use frontend\models\Contract;
use frontend\models\Services as ServicesMessage;
use frontend\models\Franchising;
use frontend\models\CallBack;
use frontend\models\Payment;
use Yii;
use yii\base\InvalidArgumentException;
use yii\data\Pagination;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\helpers\FileHelper;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\httpclient\Client;
use yii\bootstrap4\ActiveForm;
use yii\web\Request;
use yii\web\Response;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use frontend\models\Meeting;
use frontend\models\Login;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public $serverUrlLoc        = 'http://#/index.php?r=';
    public $serverUrl           = 'https://#/index.php?r=';
    public $telegramUrl         = 'https://api.telegram.org/bot/sendMessage';
    public $chatIdRasulbek      = '';
    public $telegramChatId      = '';
    public $chatIdIsfandiyor    = '';
    public $chatIdSardor        = '';
    public $chatIdSardor2591    = '';
    public $chatIdBekzod        = '';
    public $chatIdEmrax         = '';

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                // 'class' => 'yii\captcha\CaptchaAction',
                'class' => 'frontend\components\MathCaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function beforeAction($action)
    {
        $session = Yii::$app->session;
        if (Yii::$app->user->isGuest) {
            $session->remove('img');
            $session->remove('name');
        } else {
            $user = Yii::$app->user;
            $token = $user->identity->bts_token;

            $flag = true;
            $error = '';
            $url  = $this->serverUrl;
            $userProfile = [];
            $client = new Client([
                'transport' => 'yii\httpclient\CurlTransport'
            ]);
            try {
                $response = $client->createRequest()
                    ->setMethod('GET')
                    ->setFormat(Client::FORMAT_JSON)
                    ->setHeaders([
                        'version' => '1',
                        'Authorization' => 'Bearer ' . $token
                    ])
                    ->setUrl($url)
                    ->send();
            } catch (\Exception $e) {
                $flag = false;
                $error = $e->getMessage();
            }
            if ($flag) {
                $result = json_decode($response->content, true);
                if (is_array($result) and isset($result['code']) and $result['code'] == 200) {
                    $userProfile = $result['data'];
                    $session->set('img', $userProfile['thumb']);
                    $session->set('name', $userProfile['name']);
                }
            }
        }
        return parent::beforeAction($action);
    }

    public function actionPayment()
    {
        $model = new Payment();
        return $this->render('payment', [
            'model' => $model
        ]);
    }

    public function actionCallBack()
    {
        $model = new CallBack();

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post())) {
            $message = "<b>Qaytib qoʻngʻiroq qilish!</b>\n
Ism: {$model->name}
Telefon: {$model->phone}";

            $flag = true;
            $client = new \yii\httpclient\Client();
            try {
                $response = $client->createRequest()
                ->setMethod('POST')
                ->setUrl($this->telegramUrl.'?&parse_mode=html')
                ->setData(['text' => $message, 'chat_id' => $this->chatIdEmrax])
                ->send();
            } catch (\Exception $e) {
                $flag = false;
                $error = $e->getMessage();
                Yii::$app->session->setFlash('error', Yii::t('app', 'Error'));
            }
            if ($flag) {
                $result = json_decode($response->content, true);
                if (is_array($result) and isset($result['ok']) and $result['ok']) {
                    $flag = true;
                    Yii::$app->session->setFlash('success', Yii::t('app', 'Thank you for contacting'));
                } else {
                    $flag = false;
                    Yii::$app->session->setFlash('error', Yii::t('app', 'Error'));
                }
            }

            return $this->redirect(['/site/contact']);
        }

        return $this->renderAjax('call-back', [
            'model' => $model
        ]);
    }

    public function actionApp()
    {
        return $this->render('app', [
        ]);
    }

    public function actionDTracking($id)
    {
        $isReceiver = null;

        $lang = Yii::$app->language;
        $lang = explode('-', $lang);
        $lang = isset($lang[0]) ? $lang[0] : 'uz';

        $barcode = '';

        $flag = true;
        $error = '';
        $dataResult = [];
        $evaluation = [];
        $evaluationTypes = [];
        $url  = $this->serverUrl;
        $client = new Client([
            'transport' => 'yii\httpclient\CurlTransport'
        ]);
        try {
            $response = $client->createRequest()
                ->setMethod('GET')
                ->setFormat(Client::FORMAT_JSON)
                ->setHeaders([
                    'version' => '1',
                    'language' => $lang,
                ])
                ->setUrl($url)
                ->send();
        } catch (\Exception $e) {
            $flag = false;
            $error = $e->getMessage();
        }
        if ($flag) {
            $result = json_decode($response->content, true);
            if (is_array($result) and isset($result['code']) and $result['code'] == 200) {
                $flag = true;
                $dataResult = $result['data'];
                $barcode = $dataResult['history']['barcode'];
                $evaluation = $dataResult['evaluation'];
                $evaluationTypes = $dataResult['evaluation']['types'];
            } else {
                $flag = false;
                if (isset($result['messages']['message'])) {
                    Yii::$app->session->setFlash('error', $result['messages']['message']);
                } else {
                    Yii::$app->session->setFlash('error', $result['messages']);
                }
            }
        } else {
            Yii::$app->session->setFlash('error', $error);
        }

        if (!$flag) {
            return $this->redirect(['/site/search-form']);
        }

        return $this->render('/site/waybill-tracking', [
            'dataResult'      => $dataResult,
            'evaluation'      => $evaluation,
            'evaluationTypes' => $evaluationTypes,
            'isReceiver'      => $isReceiver,
            'id'              => $id,           // WaybillId
            'barcode'         => $barcode,
            'is_receiver'     => $isReceiver
        ]);
    }

    public function actionSearchForm()
    {
        $model = new Search();
        if ($model->load(Yii::$app->request->post())) {
            $q = str_replace(' ', '', $model->q);
            $q = barcodeToStr($q, true);
            $q = str_replace('-', '_', $q);
            return $this->redirect(['/s/'.$q]);
        }
        return $this->render('search-form', [
            'model' => $model
        ]);
    }

    public function actionSearch($q, $r = null, $phone = null)
    {
        $q = str_replace('_', '-', $q);
        $str = barcodeToStr($q, false);
        $isReceiver = $str['is_receiver'];
        $q = $str['barcode'];

        $flag = true;
        $error = '';
        $waybillId = null;
        $url  = $this->serverUrl;
        $client = new Client([
            'transport' => 'yii\httpclient\CurlTransport'
        ]);
        try {
            $response = $client->createRequest()
                ->setMethod('GET')
                ->setFormat(Client::FORMAT_JSON)
                ->setHeaders(['version' => '1'])
                ->setUrl($url)
                ->send();
        } catch (\Exception $e) {
            $flag = false;
            $error = $e->getMessage();
        }
        if ($flag) {
            $result = json_decode($response->content, true);
            if (is_array($result) and isset($result['code']) and $result['code'] == 200) {
                $flag = true;
                $waybillId = $result['data']['id'];
                $string = [
                    'waybill_id'  => $waybillId,
                    'barcode'     => $q,
                    'is_receiver' => $isReceiver,
                ];
                $string = json_encode($string);
                $string = base64_encode($string);
                return $this->redirect(['/site/waybill-tracking', 'term' => $string]);
            } else {
                $flag = false;
                if (isset($result['messages']['message'])) {
                    Yii::$app->session->setFlash('error', $result['messages']['message']);
                } else {
                    Yii::$app->session->setFlash('error', $result['messages']);
                }
            }
        } else {
            Yii::$app->session->setFlash('error', $error);
        }
        return $this->redirect(['/site/search-form']);
    }

    public function actionWaybillTracking($term)
    {
        $urlTerm = $term;
        $term = base64_decode($term);
        $term = json_decode($term, true);

        $id         = $term['waybill_id'];
        $barcode    = $term['barcode'];
        $isReceiver = $term['is_receiver'];
        if (!is_null($isReceiver)) {
            $this->layout = 'rating';
        }

        $lang = Yii::$app->language;
        $lang = explode('-', $lang);
        $lang = isset($lang[0]) ? $lang[0] : 'uz';

        $flag = true;
        $error = '';
        $dataResult = [];
        $evaluation = [];
        $evaluationTypes = [];
        $url  = $this->serverUrl;
        $client = new Client([
            'transport' => 'yii\httpclient\CurlTransport'
        ]);
        try {
            $response = $client->createRequest()
                ->setMethod('GET')
                ->setFormat(Client::FORMAT_JSON)
                ->setHeaders([
                    'version' => '1',
                    'language' => $lang,
                ])
                ->setUrl($url)
                ->send();
        } catch (\Exception $e) {
            $flag = false;
            $error = $e->getMessage();
        }
        if ($flag) {
            $result = json_decode($response->content, true);
            if (is_array($result) and isset($result['code']) and $result['code'] == 200) {
                $flag = true;
                $dataResult = $result['data'];
                $evaluation = $dataResult['evaluation'];
                $evaluationTypes = $dataResult['evaluation']['types'];
            } else {
                $flag = false;
                if (isset($result['messages']['message'])) {
                    Yii::$app->session->setFlash('error', $result['messages']['message']);
                } else {
                    Yii::$app->session->setFlash('error', $result['messages']);
                }
            }
        } else {
            Yii::$app->session->setFlash('error', $error);
        }

        if (!$flag) {
            return $this->redirect(['/site/search-form']);
        }

        if (!is_null($isReceiver)) {
            return $this->render('/site/waybill-rating', [
                'dataResult'      => $dataResult,
                'evaluation'      => $evaluation,
                'evaluationTypes' => $evaluationTypes,
                'isReceiver'      => $isReceiver,
                'id'              => $id,           // WaybillId
                'barcode'         => $barcode,
                'is_receiver'     => $isReceiver,
                'urlTerm'         => $urlTerm,
            ]);
        }

        return $this->render('/site/waybill-tracking', [
            'dataResult'      => $dataResult,
            'evaluation'      => $evaluation,
            'evaluationTypes' => $evaluationTypes,
            'isReceiver'      => $isReceiver,
            'id'              => $id,           // WaybillId
            'barcode'         => $barcode,
            'is_receiver'     => $isReceiver,
            'urlTerm'         => $urlTerm,
        ]);
    }

    public function actionBall()
    {
        $request = Yii::$app->request;
        $key = $request->get('evaluation_type');
        $value = $request->get('ball');

        $array = [
            'evaluation_type' => $request->get('evaluation_type'),
            'user_id' => $request->get('user_id'),
            'waybill_id' => $request->get('waybill_id'),
            'barcode' => $request->get('barcode'),
            'is_receiver' => $request->get('is_receiver'),
            'ball' => $request->get('ball'),
        ];

        $session = Yii::$app->session;
        $balls = $session->get('balls');
        if ($balls and is_array($balls)) {
            $balls[$key] = $value;
        } else {
            $balls = [];
            $balls[$key] = $value;
        }
        $session->set('balls', $balls);

        // $flag = true;
        // $error = '';
        // $res = null;
        // $url  = $this->serverUrl;
        // $client = new Client([
        //     'transport' => 'yii\httpclient\CurlTransport'
        // ]);
        // try {
        //     $response = $client->createRequest()
        //         ->setMethod('POST')
        //         ->setFormat(Client::FORMAT_JSON)
        //         ->setHeaders(['version' => '1'])
        //         ->setUrl($url)
        //         ->setData($array)
        //         ->send();
        // } catch (\Exception $e) {
        //     $flag = false;
        //     $error = $e->getMessage();
        // }
        // if ($flag) {
        //     $result = json_decode($response->content, true);
        //     if (is_array($result) and isset($result['code']) and $result['code'] == 200) {
        //         $res = $result['data'];
        //     } else {
        //         $flag = false;
        //         if (isset($result['messages']['message'])) {
        //             $error = $result['messages']['message'];
        //         } else {
        //             $error = $result['messages'];
        //         }
        //     }
        // }

        // return $res;

        // return $request->get('evaluation_type');
    }

    public function actionComment()
    {
        $request = Yii::$app->request;

        $array = [
            'evaluation_type' => $request->get('evaluation_type'),
            'user_id' => $request->get('user_id'),
            'waybill_id' => $request->get('waybill_id'),
            'barcode' => $request->get('barcode'),
            'is_receiver' => $request->get('is_receiver'),
            'comment' => $request->post('comment'),
            'balls' => []
        ];

        $session = Yii::$app->session;
        $sessionBalls = $session->get('balls');
        if ($sessionBalls and is_array($sessionBalls)) {
            $balls = $sessionBalls;
            $session->remove('balls');
            $array['balls'] = $balls;
        }

        $flag = true;
        $error = '';
        $res = null;
        $url  = $this->serverUrl;
        $client = new Client([
            'transport' => 'yii\httpclient\CurlTransport'
        ]);
        try {
            $response = $client->createRequest()
                ->setMethod('POST')
                ->setFormat(Client::FORMAT_JSON)
                ->setHeaders(['version' => '1'])
                ->setUrl($url)
                ->setData($array)
                ->send();
        } catch (\Exception $e) {
            $flag = false;
            $error = $e->getMessage();
        }
        if ($flag) {
            $result = json_decode($response->content, true);
            if (is_array($result) and isset($result['code']) and $result['code'] == 200) {
                $res = $result['data'];
            } else {
                $flag = false;
                if (isset($result['messages']['message'])) {
                    $error = $result['messages']['message'];
                } else {
                    $error = $result['messages'];
                }
            }
        }

        return $res;
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $general = General::find()->where(['lang' => Lang::getCurrent()])->one();
        $offices = Office::find()->where(['lang' => Lang::getCurrent()])->all();
        $services = Services::find()->where(['lang' => Lang::getCurrent()])->all();
        $sliders = Slider::find()->where(['lang' => Lang::getCurrent()])->orderBy('order ASC, id DESC')->all();

        $flag = true;
        $error = '';
        $branches = [];
        $url = $this->serverUrl;
        $client = new Client([
            'transport' => 'yii\httpclient\CurlTransport'
        ]);
        try {
            $response = $client->createRequest()
                ->setMethod('GET')
                ->setFormat(Client::FORMAT_JSON)
                ->setHeaders([
                    'version' => '1'
                ])
                ->setUrl($url)
                ->send();
        } catch (\Exception $e) {
            $flag = false;
            $error = $e->getMessage();
        }
        if ($flag) {
            $result = json_decode($response->content, true);
            if (is_array($result) and isset($result['code']) and $result['code'] == 200) {
                $flag = true;
                $branches = $result['data'];

                $korea = [];
                $korea[0] = [
                    'id' => 1300,
                    'customerId' => null,
                    'is_franchising' => 0,
                    'is_pvz' => 0,
                    'name' => 'BTS KOREA',
                    'nickname' => 'BTS KOREA',
                    'address' => 'Janubiy Koreya, Gyeongsangnam-do, Gimhae-si, Seosang-dong 97-1',
                    'address_uz' => 'Janubiy Koreya, Gyeongsangnam-do, Gimhae-si, Seosang-dong 97-1',
                    'address_ru' => 'Южная Корея, Кёнсан-Намдо, Кимхэ-си, Сосанг-донг,  97-1',
                    'address_en' => 'South Korea, Gyeongsangnam-do, Gimhae-si, Seosang-dong 97-1',
                    'destination_uz' => 'Gimhae Shijang, Gimhae bozori',
                    'destination_ru' => 'Кимхэ Шиджанг, рынок Кимхэ',
                    'destination_en' => 'Gimhae Shijang, Gimhae Market',
                    'lat_long' => '35.2340604, 128.882603',
                    'working_hours' => [
                        1 => '09:00-21:00',
                        2 => '09:00-21:00',
                        3 => '09:00-21:00',
                        4 => '09:00-21:00',
                        5 => '09:00-21:00',
                        6 => null,
                        7 => null,
                    ],
                    'phone' =>  '+8210-2985-8641',
                    'phone1' => '+8210-2926-8641',
                    'phone2' => 'Ubekistan: 1230',
                    'regionId' => 1002,
                    'cityId' => 1002,
                    'open_date' => '2023-08-01',
                    'code' => '82101',
                    'photo' => null,
                    'c_order' => 1,
                    'is_active' => 1,
                    'video_link' => null,
                ];

                $turkey = [];
                $turkey[0] = [
                    'id' => 1200,
                    'customerId' => null,
                    'is_franchising' => 0,
                    'is_pvz' => 0,
                    'name' => 'BTS TÜRKİYE CENTRAL',
                    'nickname' => 'BTS TÜRKİYE CENTRAL',
                    'address' => 'Orucreis, Tekstilkent Plaza, 34235 Esenler/Istanbul',
                    'address_uz' => 'Orucreis, Tekstilkent Plaza, 34235 Esenler/Istanbul',
                    'address_ru' => 'Orucreis, Текстилькент Плаза, 34235 Эсенлер/Стамбул',
                    'address_en' => 'Orucreis, Tekstilkent Plaza, 34235 Esenler/Istanbul',
                    'destination_uz' => 'Tekstilkent Metro chiqishi',
                    'destination_ru' => 'Выход из метро Текстилькент',
                    'destination_en' => 'Tekstilkent Metro exit',
                    'lat_long' => '41.06889964177842, 28.864798913439376',
                    'working_hours' => [
                        1 => '08:00-18:00',
                        2 => '08:00-18:00',
                        3 => '08:00-18:00',
                        4 => '08:00-18:00',
                        5 => '08:00-18:00',
                        6 => null,
                        7 => null,
                    ],
                    'phone' =>  '+905342007377',
                    'phone1' => '+905342007377',
                    'phone2' => 'Ubekistan: 1230',
                    'regionId' => 1001,
                    'cityId' => 1001,
                    'open_date' => '2023-08-14',
                    'code' => '90001',
                    'photo' => null,
                    'c_order' => 1,
                    'is_active' => 1,
                    'video_link' => null,
                ];
                $turkey[1] = [
                    'id' => 1201,
                    'customerId' => null,
                    'is_franchising' => 0,
                    'is_pvz' => 0,
                    'name' => 'BTS ISTANBUL',
                    'nickname' => 'BTS ISTANBUL',
                    'address' => 'Istanbul shahar, Fotih tumani, Katip Kasım mahallasi, Langa Hisarı ko\'chasi № 4A',
                    'address_uz' => 'Istanbul shahar, Fotih tumani, Katip Kasım mahallasi, Langa Hisarı ko\'chasi № 4A',
                    'address_ru' => 'Стамбул Шахар, район Фатих, район Катип Касым, Ланга Хисары ул. № 4А',
                    'address_en' => 'Istanbul shahar, Fatih rayoni, Katip Kasım neighborhood, Langa Hisarı st. № 4A',
                    'destination_uz' => '',
                    'destination_ru' => '',
                    'destination_en' => '',
                    'lat_long' => '41.005029, 28.954056',
                    'working_hours' => [
                        1 => '09:00-18:00',
                        2 => '09:00-18:00',
                        3 => '09:00-18:00',
                        4 => '09:00-18:00',
                        5 => '09:00-18:00',
                        6 => '09:00-15:00',
                        7 => null,
                    ],
                    'phone' => '+90 537 032 1230',
                    'phone1' => '+90 537 032 1230',
                    'phone2' => 'Ubekistan: 1230',
                    'regionId' => 1001,
                    'cityId' => 1001,
                    'open_date' => '2023-02-01',
                    'code' => '90002',
                    'photo' => null,
                    'c_order' => 1,
                    'is_active' => 1,
                    'video_link' => null,
                ];

                $russia = [];
                $russia[0] = [
                    'id' => 1100,
                    'customerId' => null,
                    'is_franchising' => 0,
                    'is_pvz' => 0,
                    'name' => 'BTS MOSKVA CENTRAL',
                    'nickname' => 'BTS MOSKVA CENTRAL',
                    // 'address' => 'Moskva vil. Lyubartsi, Kotelnicheskiy proezd 14',
                    'address' => 'Moskva, Novokosinskaya ko`chasi, ow. 32A, 1-bino "Prialit" savdo markazi',
                    'address_uz' => 'Moskva, Novokosinskaya ko`chasi, ow. 32A, 1-bino "Prialit" savdo markazi',
                    // 'address_ru' => 'обл. Москва Люберцы, Котельнический проезд 14',
                    'address_ru' => 'Москва, ул. Новокосинская, вл. 32А, стр.1 ТЦ "Приалит"',
                    'address_en' => 'Moscow, st. Novokosinskaya, ow. 32A, building 1 Shopping center "Prialit"',
                    'destination_uz' => '"Prialit" savdo markazi',
                    'destination_ru' => 'ТЦ "Приалит"',
                    'destination_en' => 'Shopping center "Prialit"',
                    // 'lat_long' => '55.665236003556586, 37.8889875423287',
                    'lat_long' => '55.742549,37.867394',
                    'working_hours' => [
                        1 => '09:00-18:00',
                        2 => '09:00-18:00',
                        3 => '09:00-18:00',
                        4 => '09:00-18:00',
                        5 => '09:00-18:00',
                        6 => '09:00-15:00',
                        7 => null,
                    ],
                    'phone'  => '+7 999 788 18 18',
                    'phone1' => '+7 901 387 50 05',
                    'phone2' => 'Ubekistan: 1230',
                    'regionId' => 1000,
                    'cityId' => 1000,
                    'open_date' => '2022-07-01',
                    'code' => '79601',
                    'photo' => null,
                    'c_order' => 1,
                    'is_active' => 1,
                    'video_link' => null,
                ];
                $russia[1] = [
                    'id' => 1101,
                    'customerId' => null,
                    'is_franchising' => 0,
                    'is_pvz' => 0,
                    'name' => 'BTS SANKT PETERBURG',
                    'nickname' => 'BTS SANKT PETERBURG',
                    'address' => 'Sankt-Peterburg, Energetikov prospekti, 59Z',
                    'address_uz' => 'Sankt-Peterburg, Energetikov prospekti, 59Z',
                    'address_ru' => 'Санкт-Петербург, проспект Энергетиков, 59З',
                    'address_en' => 'St. Petersburg, Energetikov Avenue, 59Z',
                    'destination_uz' => '',
                    'destination_ru' => '',
                    'destination_en' => '',
                    'lat_long' => '59.974035,30.440129',
                    'working_hours' => [
                        1 => '09:00-18:00',
                        2 => '09:00-18:00',
                        3 => '09:00-18:00',
                        4 => '09:00-18:00',
                        5 => '09:00-18:00',
                        6 => '09:00-15:00',
                        7 => null,
                    ],
                    'phone' => '+7 981 786 44 88',
                    'phone1' => '+7 999 520 17 27',
                    'phone2' => 'Ubekistan: 1230',
                    'regionId' => 1000,
                    'cityId' => 1000,
                    'open_date' => '2023-04-01',
                    'code' => '79602',
                    'photo' => null,
                    'c_order' => 2,
                    'is_active' => 1,
                    'video_link' => null,
                ];
                $russia[2] = [
                    'id' => 1102,
                    'customerId' => null,
                    'is_franchising' => 0,
                    'is_pvz' => 0,
                    'name' => 'BTS SANKT PETERBURG 2',
                    'nickname' => 'BTS SANKT PETERBURG 2',
                    'address' => 'Fontanka daryosi qirg\'og\'i, 97, Sankt-Peterburg',
                    'address_uz' => 'Fontanka daryosi qirg\'og\'i, 97, Sankt-Peterburg',
                    'address_ru' => 'Набережная реки Фонтанки, 97, Санкт-Петербург',
                    'address_en' => 'Fontanka River Embankment, 97, Sankt-Peterburg',
                    'destination_uz' => '',
                    'destination_ru' => '',
                    'destination_en' => '',
                    'lat_long' => '59.924221102390845,30.32154873937846',
                    'working_hours' => [
                        1 => '09:00-18:00',
                        2 => '09:00-18:00',
                        3 => '09:00-18:00',
                        4 => '09:00-18:00',
                        5 => '09:00-18:00',
                        6 => '09:00-15:00',
                        7 => null,
                    ],
                    'phone' =>  '+7 925 766 17 17',
                    'phone1' => 'Ubekistan: 1230',
                    'phone2' => '',
                    'regionId' => 1000,
                    'cityId' => 1000,
                    'open_date' => '2023-11-27',
                    'code' => '79603',
                    'photo' => null,
                    'c_order' => 3,
                    'is_active' => 1,
                    'video_link' => null,
                ];

                array_unshift($branches, $korea[0]);
                array_unshift($branches, $turkey[1]);
                array_unshift($branches, $turkey[0]);
                array_unshift($branches, $russia[2]);
                array_unshift($branches, $russia[1]);
                array_unshift($branches, $russia[0]);
            } else {
                $flag = false;
                if (isset($result['messages']['message'])) {
                    Yii::$app->session->setFlash('error', $result['messages']['message']);
                } else {
                    Yii::$app->session->setFlash('error', $result['messages']);
                }
            }
        } else {
            Yii::$app->session->setFlash('error', $error);
        }

        return $this->render('index', [
            'services' => $services,
            'general'  => $general,
            'offices'  => $offices,
            'sliders'  => $sliders,
            'branches' => $branches,
        ]);
    }

    /**
     * Displays Clients page.
     *
     * @return mixed
     */
    public function actionClients()
    {
        $services = Services::find()->where(['lang' => Lang::getCurrent()])->all();
        $model = new Calculate();
        return $this->render('clients', [
            'services' => $services,
        ]);
    }
    public function actionTarifCard(){
        $url = Url::base(true);
        $document = Document::findLatestRecords()->where(['type'=>'xizmatlarining-tarif-karta'])->one();
        $full_url = $url."/documenty/{$document->type}/{$document->date}/{$document->file}";
        return $this->redirect($full_url);
    }

    /**
     * Displays Office page.
     *
     * @return mixed
     */
    public function actionOfficeOld($id = null)
    {
        $regions = Region::find()->where(['lang' => Lang::getCurrent()])->all();
        $offices = Office::find()->where(['lang' => Lang::getCurrent()])->all();
        if ($id != null){
            $region = Region::findOne($id);
            $has = Office::find()->where(['lang' => Lang::getCurrent(), 'region' => $region->id])->all();
            if (Lang::getCurrent()->id != $region->lang){
                if ($id < 15){
                    $id += 14;
                } else {
                    $id -= 14;
                }
                return $this->redirect(['/site/office', 'id' => $id]);
            }
        } else {
            $region = null;
            $has = true;
        }
        return $this->render('office', [
            'regions' => $regions,
            'region' => $region,
            'offices' => $offices,
            'has' => $has,
        ]);
    }

    public function actionOffice($id = null)
    {
        $flag = true;
        $error = '';
        $dataResult = [];
        $allBranches = [];
        $lang = Yii::$app->language;
        if ($lang == 'uz-UZ') {
            $langs='uz';
        } elseif ($lang == 'ru-RU') {
            $langs='ru';
        } elseif ($lang == 'en-UZ') {
            $langs='en';
        }
        $url = $this->serverUrl;
        // if (is_null($id)) {
        // } else {
        //     $url = $this->serverUrl;
        // }
        $client = new Client([
            'transport' => 'yii\httpclient\CurlTransport'
        ]);
        try {
            $response = $client->createRequest()
                ->setMethod('GET')
                ->setFormat(Client::FORMAT_JSON)
                ->setHeaders([
                    'version' => '1',
                ])
                ->setUrl($url)
                ->send();
        } catch (\Exception $e) {
            $flag = false;
            $error = $e->getMessage();
        }
        if ($flag) {
            $result = json_decode($response->content, true);
            if (is_array($result) and isset($result['code']) and $result['code'] == 200) {
                $flag = true;
                $dataResult = $result['data'];
            } else {
                $flag = false;
                if (isset($result['messages']['message'])) {
                    Yii::$app->session->setFlash('error', $result['messages']['message']);
                } else {
                    Yii::$app->session->setFlash('error', $result['messages']);
                }
            }
        } else {
            Yii::$app->session->setFlash('error', $error);
        }

        $regionBranches = [];
        if ($flag) {
            foreach ($dataResult as $key => $value) {
                if (!is_null($id) and $id == $value['regionId']) {
                    $regionBranches[] = $value;
                }
            }
        }

        $allBranches = $dataResult;
        if (!empty($regionBranches)) {
            $dataResult = $regionBranches;
        }

        $region = null;
        if (!is_null($id)) {
            $region = BtsRegion::findOne(['id' => $id]);
        }

        $regions = BtsRegion::find();
        $lang = Yii::$app->language;
        if ($lang == 'uz-UZ') {
            $regions->orderBy('nameUz ASC');
        } elseif ($lang == 'ru-RU') {
            $regions->orderBy('nameRu ASC');
        } elseif ($lang == 'en-UZ') {
            $regions->orderBy('nameEn ASC');
        }
        $regions = $regions->all();

        $korea = [];
        $korea[0] = [
            'id' => 1300,
            'customerId' => null,
            'is_franchising' => 0,
            'is_pvz' => 0,
            'name' => 'BTS KOREA',
            'nickname' => 'BTS KOREA',
            'address' => 'Janubiy Koreya, Gyeongsangnam-do, Gimhae-si, Seosang-dong 97-1',
            'address_uz' => 'Janubiy Koreya, Gyeongsangnam-do, Gimhae-si, Seosang-dong 97-1',
            'address_ru' => 'Южная Корея, Кёнсан-Намдо, Кимхэ-си, Сосанг-донг,  97-1',
            'address_en' => 'South Korea, Gyeongsangnam-do, Gimhae-si, Seosang-dong 97-1',
            'destination_uz' => 'Gimhae Shijang, Gimhae bozori',
            'destination_ru' => 'Кимхэ Шиджанг, рынок Кимхэ',
            'destination_en' => 'Gimhae Shijang, Gimhae Market',
            'lat_long' => '35.2340604, 128.882603',
            'working_hours' => [
                1 => '09:00-21:00',
                2 => '09:00-21:00',
                3 => '09:00-21:00',
                4 => '09:00-21:00',
                5 => '09:00-21:00',
                6 => null,
                7 => null,
            ],
            'phone' =>  '+8210-2985-8641',
            'phone1' => '+8210-2926-8641',
            'phone2' => 'Ubekistan: 1230',
            'regionId' => 1002,
            'cityId' => 1002,
            'open_date' => '2023-08-01',
            'code' => '82101',
            'photo' => null,
            'c_order' => 1,
            'is_active' => 1,
            'video_link' => null,
        ];
        if ($id == 1002) {
            $regionBranches = $dataResult = $korea;
        }
        array_unshift($allBranches, $korea[0]);
        $regionKorea = new BtsRegion();
        $regionKorea->id = 1002;
        $regionKorea->name = 'Южная Корея';
        $regionKorea->name1 = 'Janubiy Koreya';
        $regionKorea->nameEn = 'South Korea';
        $regionKorea->nameUz = 'Janubiy Koreya';
        $regionKorea->nameRu = 'Южная Корея';
        $regionKorea->nickname = 'KOREA';
        array_unshift($regions, $regionKorea);
        if ($id == 1002) {
            $region = $regionKorea;
        }

        $turkey = [];
        $turkey[0] = [
            'id' => 1200,
            'customerId' => null,
            'is_franchising' => 0,
            'is_pvz' => 0,
            'name' => 'BTS TÜRKİYE CENTRAL',
            'nickname' => 'BTS TÜRKİYE CENTRAL',
            'address' => 'Orucreis, Tekstilkent Plaza, 34235 Esenler/Istanbul',
            'address_uz' => 'Orucreis, Tekstilkent Plaza, 34235 Esenler/Istanbul',
            'address_ru' => 'Orucreis, Текстилькент Плаза, 34235 Эсенлер/Стамбул',
            'address_en' => 'Orucreis, Tekstilkent Plaza, 34235 Esenler/Istanbul',
            'destination_uz' => 'Tekstilkent Metro chiqishi',
            'destination_ru' => 'Выход из метро Текстилькент',
            'destination_en' => 'Tekstilkent Metro exit',
            'lat_long' => '41.06889964177842, 28.864798913439376',
            'working_hours' => [
                1 => '08:00-18:00',
                2 => '08:00-18:00',
                3 => '08:00-18:00',
                4 => '08:00-18:00',
                5 => '08:00-18:00',
                6 => null,
                7 => null,
            ],
            'phone' =>  '+905342007377',
            'phone1' => '+905342007377',
            'phone2' => 'Ubekistan: 1230',
            'regionId' => 1001,
            'cityId' => 1001,
            'open_date' => '2023-08-14',
            'code' => '90001',
            'photo' => null,
            'c_order' => 1,
            'is_active' => 1,
            'video_link' => null,
        ];
        $turkey[1] = [
            'id' => 1201,
            'customerId' => null,
            'is_franchising' => 0,
            'is_pvz' => 0,
            'name' => 'BTS ISTANBUL',
            'nickname' => 'BTS ISTANBUL',
            'address' => 'Istanbul shahar, Fotih tumani, Katip Kasım mahallasi, Langa Hisarı ko\'chasi № 4A',
            'address_uz' => 'Istanbul shahar, Fotih tumani, Katip Kasım mahallasi, Langa Hisarı ko\'chasi № 4A',
            'address_ru' => 'Стамбул Шахар, район Фатих, район Катип Касым, Ланга Хисары ул. № 4А',
            'address_en' => 'Istanbul shahar, Fatih rayoni, Katip Kasım neighborhood, Langa Hisarı st. № 4A',
            'destination_uz' => '',
            'destination_ru' => '',
            'destination_en' => '',
            'lat_long' => '41.005029, 28.954056',
            'working_hours' => [
                1 => '09:00-18:00',
                2 => '09:00-18:00',
                3 => '09:00-18:00',
                4 => '09:00-18:00',
                5 => '09:00-18:00',
                6 => '09:00-15:00',
                7 => null,
            ],
            'phone' => '+90 537 032 1230',
            'phone1' => '+90 537 032 1230',
            'phone2' => 'Ubekistan: 1230',
            'regionId' => 1001,
            'cityId' => 1001,
            'open_date' => '2023-02-01',
            'code' => '90002',
            'photo' => null,
            'c_order' => 1,
            'is_active' => 1,
            'video_link' => null,
        ];
        if ($id == 1001) {
            $regionBranches = $dataResult = $turkey;
        }
        array_unshift($allBranches, $turkey[1]);
        array_unshift($allBranches, $turkey[0]);
        $regionTurkey = new BtsRegion();
        $regionTurkey->id = 1001;
        $regionTurkey->name = 'Республика Турция';
        $regionTurkey->name1 = 'Turkiya Respublikasi';
        $regionTurkey->nameEn = 'Republic of Turkey';
        $regionTurkey->nameUz = 'Turkiya Respublikasi';
        $regionTurkey->nameRu = 'Республика Турция';
        $regionTurkey->nickname = 'TURKEY';
        array_unshift($regions, $regionTurkey);
        if ($id == 1001) {
            $region = $regionTurkey;
        }

        $russia = [];
        $russia[0] = [
            'id' => 1100,
            'customerId' => null,
            'is_franchising' => 0,
            'is_pvz' => 0,
            'name' => 'BTS MOSKVA CENTRAL',
            'nickname' => 'BTS MOSKVA CENTRAL',
            // 'address' => 'Moskva vil. Lyubartsi, Kotelnicheskiy proezd 14',
            'address' => 'Moskva, Novokosinskaya ko`chasi, ow. 32A, 1-bino "Prialit" savdo markazi',
            'address_uz' => 'Moskva, Novokosinskaya ko`chasi, ow. 32A, 1-bino "Prialit" savdo markazi',
            // 'address_ru' => 'обл. Москва Люберцы, Котельнический проезд 14',
            'address_ru' => 'Москва, ул. Новокосинская, вл. 32А, стр.1 ТЦ "Приалит"',
            'address_en' => 'Moscow, st. Novokosinskaya, ow. 32A, building 1 Shopping center "Prialit"',
            'destination_uz' => '"Prialit" savdo markazi',
            'destination_ru' => 'ТЦ "Приалит"',
            'destination_en' => 'Shopping center "Prialit"',
            // 'lat_long' => '55.665236003556586, 37.8889875423287',
            'lat_long' => '55.742549,37.867394',
            'working_hours' => [
                1 => '09:00-18:00',
                2 => '09:00-18:00',
                3 => '09:00-18:00',
                4 => '09:00-18:00',
                5 => '09:00-18:00',
                6 => '09:00-15:00',
                7 => null,
            ],
            'phone'  => '+7 999 788 18 18',
            'phone1' => '+7 901 387 50 05',
            'phone2' => 'Ubekistan: 1230',
            'regionId' => 1000,
            'cityId' => 1000,
            'open_date' => '2022-07-01',
            'code' => '79601',
            'photo' => null,
            'c_order' => 1,
            'is_active' => 1,
            'video_link' => null,
        ];
        $russia[1] = [
            'id' => 1101,
            'customerId' => null,
            'is_franchising' => 0,
            'is_pvz' => 0,
            'name' => 'BTS SANKT PETERBURG',
            'nickname' => 'BTS SANKT PETERBURG',
            'address' => 'Sankt-Peterburg, Energetikov prospekti, 59Z',
            'address_uz' => 'Sankt-Peterburg, Energetikov prospekti, 59Z',
            'address_ru' => 'Санкт-Петербург, проспект Энергетиков, 59З',
            'address_en' => 'St. Petersburg, Energetikov Avenue, 59Z',
            'destination_uz' => '',
            'destination_ru' => '',
            'destination_en' => '',
            'lat_long' => '59.974035,30.440129',
            'working_hours' => [
                1 => '09:00-18:00',
                2 => '09:00-18:00',
                3 => '09:00-18:00',
                4 => '09:00-18:00',
                5 => '09:00-18:00',
                6 => '09:00-15:00',
                7 => null,
            ],
            'phone' => '+7 981 786 44 88',
            'phone1' => '+7 999 520 17 27',
            'phone2' => 'Ubekistan: 1230',
            'regionId' => 1000,
            'cityId' => 1000,
            'open_date' => '2023-04-01',
            'code' => '79602',
            'photo' => null,
            'c_order' => 2,
            'is_active' => 1,
            'video_link' => null,
        ];
        $russia[2] = [
            'id' => 1102,
            'customerId' => null,
            'is_franchising' => 0,
            'is_pvz' => 0,
            'name' => 'BTS SANKT PETERBURG 2',
            'nickname' => 'BTS SANKT PETERBURG 2',
            'address' => 'Fontanka daryosi qirg\'og\'i, 97, Sankt-Peterburg',
            'address_uz' => 'Fontanka daryosi qirg\'og\'i, 97, Sankt-Peterburg',
            'address_ru' => 'Набережная реки Фонтанки, 97, Санкт-Петербург',
            'address_en' => 'Fontanka River Embankment, 97, Sankt-Peterburg',
            'destination_uz' => '',
            'destination_ru' => '',
            'destination_en' => '',
            'lat_long' => '59.924221102390845,30.32154873937846',
            'working_hours' => [
                1 => '09:00-18:00',
                2 => '09:00-18:00',
                3 => '09:00-18:00',
                4 => '09:00-18:00',
                5 => '09:00-18:00',
                6 => '09:00-15:00',
                7 => null,
            ],
            'phone' =>  '+7 925 766 17 17',
            'phone1' => 'Ubekistan: 1230',
            'phone2' => '',
            'regionId' => 1000,
            'cityId' => 1000,
            'open_date' => '2023-11-27',
            'code' => '79603',
            'photo' => null,
            'c_order' => 3,
            'is_active' => 1,
            'video_link' => null,
        ];
        if ($id == 1000) {
            $regionBranches = $dataResult = $russia;
        }
        array_unshift($allBranches, $russia[2]);
        array_unshift($allBranches, $russia[1]);
        array_unshift($allBranches, $russia[0]);
        $regionMoscow = new BtsRegion();
        $regionMoscow->id = 1000;
        $regionMoscow->name = 'Российская Федерация';
        $regionMoscow->name1 = 'Rossiya Federatsiyasi';
        $regionMoscow->nameEn = 'Russian Federation';
        $regionMoscow->nameUz = 'Rossiya Federatsiyasi';
        $regionMoscow->nameRu = 'Российская Федерация';
        $regionMoscow->nickname = 'RUSSIA';
        array_unshift($regions, $regionMoscow);
        if ($id == 1000) {
            $region = $regionMoscow;
        }

        return $this->render('office-new', [
            'allBranches' => $allBranches,
            'dataResult' => $dataResult,
            'regionBranches' => $regionBranches,
            'region' => $region,
            'regions' => $regions,
            'flag' => $flag,
            'id' => $id,
        ]);
    }

    /**
     * Displays Complaint page.
     *
     * @return mixed
     */
    public function actionComplaint($id = null, $barcode = null)
    {
        if (Yii::$app->user->isGuest){
            return $this->redirect(['login']);
        }

        $user = Yii::$app->user;
        $token = $user->identity->bts_token;

        $model = new Meeting();
        if ($id) {
            $str = barcodeToStr($id, false);
            $isReceiver = $str['is_receiver'];
            $id = $str['barcode'];
        }
        if ($barcode) {
            $str = barcodeToStr($barcode, false);
            $isReceiver = $str['is_receiver'];
            $barcode = $str['barcode'];
        }

        if ($model->load(Yii::$app->request->post())) {
            $array = [
                'id' => $id,
                'type' => $model->type,
                'message' => $model->message,
                'name' => $model->name,
                'phone' => $model->phone,
                'isApiSite' => 'yes',
            ];

            $flag = true;
            $error = '';
            $url  = $this->serverUrl;
            $client = new Client([
                'transport' => 'yii\httpclient\CurlTransport'
            ]);
            try {
                $response = $client->createRequest()
                    ->setMethod('POST')
                    ->setFormat(Client::FORMAT_JSON)
                    ->setHeaders([
                        'version' => '1',
                        'Authorization' => 'Bearer ' . $token
                    ])
                    ->setUrl($url)
                    ->setData($array)
                    ->send();
            } catch (\Exception $e) {
                $flag = false;
                $error = $e->getMessage();
                Yii::$app->session->setFlash('error', $error);
            }
            if ($flag) {
                $result = json_decode($response->content, true);
                if (is_array($result) and isset($result['code']) and $result['code'] == 200) {
                    $res = $result['data'];
                    $model = new Meeting();
                    Yii::$app->session->setFlash('success', '№ ' . $res['number'] . '. ' . Yii::t('app', 'Thank you for contacting'));
                } else {
                    $flag = false;
                    if (isset($result['messages']['message'])) {
                        Yii::$app->session->setFlash('error', $result['messages']['message']);
                    } else {
                        Yii::$app->session->setFlash('error', $result['messages']);
                    }
                }
            } else {
                Yii::$app->session->setFlash('error', $error);
            }
        }

        $lang = Yii::$app->language;
        if ($lang == 'uz-UZ') {
            $language = 'uz';
        } elseif ($lang == 'ru-RU') {
            $language = 'ru';
        } elseif ($lang == 'en-UZ') {
            $language = 'en';
        }

        $flag = true;
        $error = '';
        $url  = $this->serverUrl;
        $meetingCategory = [];
        $client = new Client([
            'transport' => 'yii\httpclient\CurlTransport'
        ]);
        try {
            $response = $client->createRequest()
                ->setMethod('GET')
                ->setFormat(Client::FORMAT_JSON)
                ->setHeaders([
                    'version' => '1',
                    'language' => $language
                ])
                ->setUrl($url)
                ->send();
        } catch (\Exception $e) {
            $flag = false;
            $error = $e->getMessage();
        }
        if ($flag) {
            $result = json_decode($response->content, true);
            if (is_array($result) and isset($result['code']) and $result['code'] == 200) {
                $meetingCategory = $result['data'];
                $meetingCategory = ArrayHelper::map($meetingCategory, 'id', 'name');
            } else {
                $flag = false;
                if (isset($result['messages']['message'])) {
                    $error = $result['messages']['message'];
                } else {
                    $error = $result['messages'];
                }
            }
        }
        if (!$flag) {
            Yii::$app->user->logout();
            Yii::$app->session->setFlash('error', $error);
            return $this->redirect(['login']);
        }

        $flag = true;
        $error = '';
        $url  = $this->serverUrl;
        $userProfile = [];
        // $data = [
        //     'login' => $model->username,
        //     'password' => $model->password
        // ];
        $client = new Client([
            'transport' => 'yii\httpclient\CurlTransport'
        ]);
        try {
            $response = $client->createRequest()
                ->setMethod('GET')
                ->setFormat(Client::FORMAT_JSON)
                ->setHeaders([
                    'version' => '1',
                    'Authorization' => 'Bearer ' . $token
                ])
                ->setUrl($url)
                // ->setData($data)
                ->send();
        } catch (\Exception $e) {
            $flag = false;
            $error = $e->getMessage();
        }
        if ($flag) {
            $result = json_decode($response->content, true);
            if (is_array($result) and isset($result['code']) and $result['code'] == 200) {
                $userProfile = $result['data'];
            } else {
                $flag = false;
                if (isset($result['messages']['message'])) {
                    $error = $result['messages']['message'];
                } else {
                    $error = $result['messages'];
                }
            }
        }

        if (!$flag) {
            Yii::$app->user->logout();
            Yii::$app->session->setFlash('error', $error);
            return $this->redirect(['login']);
        }

        $flag = true;
        $error = '';
        $url  = $this->serverUrl;
        $meetings = [];
        $client = new Client([
            'transport' => 'yii\httpclient\CurlTransport'
        ]);
        try {
            $response = $client->createRequest()
                ->setMethod('GET')
                ->setFormat(Client::FORMAT_JSON)
                ->setHeaders([
                    'version' => '1',
                    'Authorization' => 'Bearer ' . $token
                ])
                ->setUrl($url)
                ->send();
        } catch (\Exception $e) {
            $flag = false;
            $error = $e->getMessage();
        }
        if ($flag) {
            $result = json_decode($response->content, true);
            if (is_array($result) and isset($result['code']) and $result['code'] == 200) {
                $meetings = $result['data'];
            } else {
                $flag = false;
                if (isset($result['messages']['message'])) {
                    $error = $result['messages']['message'];
                } else {
                    $error = $result['messages'];
                }
            }
        }
        if (!$flag) {
            Yii::$app->user->logout();
            Yii::$app->session->setFlash('error', $error);
            return $this->redirect(['login']);
        }

        return $this->render('complaint', [
            'barcode'         => $barcode,
            'model'           => $model,
            'meetingCategory' => $meetingCategory,
            'userProfile'     => $userProfile,
            'meetings'        => $meetings,
        ]);
    }

    public function actionNewComplaint()
    {
        if (Yii::$app->user->isGuest){
            return $this->redirect(['login']);
        }

        $user = Yii::$app->user;
        $token = $user->identity->bts_token;

        $model = new Meeting();

        $lang = Yii::$app->language;
        if ($lang == 'uz-UZ') {
            $language = 'uz';
        } elseif ($lang == 'ru-RU') {
            $language = 'ru';
        } elseif ($lang == 'en-UZ') {
            $language = 'en';
        }

        $flag = true;
        $error = '';
        $url  = $this->serverUrl;
        $meetingCategory = [];
        $client = new Client([
            'transport' => 'yii\httpclient\CurlTransport'
        ]);
        try {
            $response = $client->createRequest()
                ->setMethod('GET')
                ->setFormat(Client::FORMAT_JSON)
                ->setHeaders([
                    'version' => '1',
                    'language' => $language
                ])
                ->setUrl($url)
                ->send();
        } catch (\Exception $e) {
            $flag = false;
            $error = $e->getMessage();
        }
        if ($flag) {
            $result = json_decode($response->content, true);
            if (is_array($result) and isset($result['code']) and $result['code'] == 200) {
                $meetingCategory = $result['data'];
                $meetingCategory = ArrayHelper::map($meetingCategory, 'id', 'name');
            } else {
                $flag = false;
                if (isset($result['messages']['message'])) {
                    $error = $result['messages']['message'];
                } else {
                    $error = $result['messages'];
                }
            }
        }
        if (!$flag) {
            Yii::$app->session->setFlash('error', $error);
        }

        $flag = true;
        $error = '';
        $url  = $this->serverUrl;
        $userProfile = [];
        // $data = [
        //     'login' => $model->username,
        //     'password' => $model->password
        // ];
        $client = new Client([
            'transport' => 'yii\httpclient\CurlTransport'
        ]);
        try {
            $response = $client->createRequest()
                ->setMethod('GET')
                ->setFormat(Client::FORMAT_JSON)
                ->setHeaders([
                    'version' => '1',
                    'Authorization' => 'Bearer ' . $token
                ])
                ->setUrl($url)
                // ->setData($data)
                ->send();
        } catch (\Exception $e) {
            $flag = false;
            $error = $e->getMessage();
        }
        if ($flag) {
            $result = json_decode($response->content, true);
            if (is_array($result) and isset($result['code']) and $result['code'] == 200) {
                $userProfile = $result['data'];
            } else {
                $flag = false;
                if (isset($result['messages']['message'])) {
                    $error = $result['messages']['message'];
                } else {
                    $error = $result['messages'];
                }
            }
        }

        if (!$flag) {
            Yii::$app->session->setFlash('error', $error);
        }

        return $this->renderAjax('_form_complaint', [
            'model' => $model,
            'meetingCategory' => $meetingCategory,
            'userProfile' => $userProfile,
        ]);
    }

    /**
     * Displays Calculate page.
     *
     * @return mixed
     */
    public function actionCalculate()
    {
        $services = Services::find()->where(['lang' => Lang::getCurrent()])->all();
        $model = new Calculate();
        $region = BtsRegion::find();
        $lang = Yii::$app->language;
        if ($lang == 'uz-UZ') {
            $region->orderBy('nameUz ASC');
        } elseif ($lang == 'ru-RU') {
            $region->orderBy('nameRu ASC');
        } elseif ($lang == 'en-UZ') {
            $region->orderBy('nameEn ASC');
        }
        $region = $region->all();
        $branchId = null;
        $branchName = '';
        $branchAddress = '';

        if ($model->load(Yii::$app->request->post())) {
            $array = [
                'bringBackWaybill' => $model->bringBackWaybill,
                'senderRegionId' => $model->senderRegionId,
                'senderCityId' => $model->senderCityId,
                'senderDelivery' => $model->senderDelivery,
                'receiverRegionId' => $model->receiverRegionId,
                'receiverCityId' => $model->receiverCityId,
                'receiverDelivery' => $model->receiverDelivery,
                'weight' => $model->weight,
                'x' => $model->x,
                'y' => $model->y,
                'z' => $model->z,
                'volume' => 0,
            ];
            if ($model->x and $model->y and $model->z) {
                $array['volume'] = (1 * $model->x * 1 * $model->y * 1 * $model->z);
            }

            $flag = true;
            $error = '';
            $url  = $this->serverUrl;
            $client = new Client([
                'transport' => 'yii\httpclient\CurlTransport'
            ]);
            try {
                $response = $client->createRequest()
                    ->setMethod('POST')
                    ->setFormat(Client::FORMAT_JSON)
                    ->setHeaders(['version' => '1'])
                    ->setUrl($url)
                    ->setData($array)
                    ->send();
            } catch (\Exception $e) {
                $flag = false;
                $error = $e->getMessage();
                Yii::$app->session->setFlash('error', $error);
            }
            if ($flag) {
                $result = json_decode($response->content, true);
                if (is_array($result) and isset($result['code']) and $result['code'] == 200) {
                    $res = $result['data'];
                    // actionGetBranchAddress
                    $receiverBranches = $this->actionGetReceiverBranch(
                        $model->receiverRegionId,
                        $model->receiverCityId,
                        $model->receiverDelivery,
                        null,
                        true
                    );
                    $branchId = null;
                    $branchName = '';
                    $branchAddress = '';
                    if (is_array($receiverBranches)) {
                        $branchId = array_key_first($receiverBranches);
                        $branchName = isset($receiverBranches[$branchId]) ? $receiverBranches[$branchId] : '';
                    }
                    if ($branchId) {
                        $branchAddress = $this->actionGetBranchAddress($branchId);
                    }
                    $text = Yii::t('app', 'summa') . ' ' . $res['summaryPrice'] . ' ' . Yii::t('app', 'so`m');
                    Yii::$app->session->setFlash('success', $text);
                } else {
                    $flag = false;
                    if (isset($result['messages']['message'])) {
                        Yii::$app->session->setFlash('error', $result['messages']['message']);
                    } else {
                        Yii::$app->session->setFlash('error', $result['messages']);
                    }
                }
            } else {
                Yii::$app->session->setFlash('error', $error);
            }
        }
        $senderCities = [];
        if ($model->senderRegionId) {
            $senderCities = BtsCity::find()->where(['regionId' => $model->senderRegionId]);
            if ($lang == 'uz-UZ') {
                $senderCities->orderBy('nameUz ASC');
            } elseif ($lang == 'ru-RU') {
                $senderCities->orderBy('nameRu ASC');
            } elseif ($lang == 'en-UZ') {
                $senderCities->orderBy('nameEn ASC');
            }
            $senderCities = $senderCities->all();

            if ($lang == 'uz-UZ') {
                $senderCities = ArrayHelper::map($senderCities, 'id', 'nameUz');
            } elseif ($lang == 'ru-RU') {
                $senderCities = ArrayHelper::map($senderCities, 'id', 'nameRu');
            } elseif ($lang == 'en-UZ') {
                $senderCities = ArrayHelper::map($senderCities, 'id', 'nameEn');
            }
        }
        $receiverCities = [];
        if ($model->receiverRegionId) {
            $receiverCities = BtsCity::find()->where(['regionId' => $model->receiverRegionId]);
            if ($lang == 'uz-UZ') {
                $receiverCities->orderBy('nameUz ASC');
            } elseif ($lang == 'ru-RU') {
                $receiverCities->orderBy('nameRu ASC');
            } elseif ($lang == 'en-UZ') {
                $receiverCities->orderBy('nameEn ASC');
            }
            $receiverCities = $receiverCities->all();

            if ($lang == 'uz-UZ') {
                $receiverCities = ArrayHelper::map($receiverCities, 'id', 'nameUz');
            } elseif ($lang == 'ru-RU') {
                $receiverCities = ArrayHelper::map($receiverCities, 'id', 'nameRu');
            } elseif ($lang == 'en-UZ') {
                $receiverCities = ArrayHelper::map($receiverCities, 'id', 'nameEn');
            }
        }

        return $this->render('calculate', [
            'services' => $services,
            'region' => $region,
            'model' => $model,
            'senderCities' => $senderCities,
            'receiverCities' => $receiverCities,
            'branchId' => $branchId,
            'branchName' => $branchName,
            'branchAddress' => $branchAddress,
        ]);
    }

    /**
     * Displays Contract page.
     *
     * @return mixed
     */
    public function actionContract()
    {
        $model = new Contract();

        $services = Services::find()->where(['lang' => Lang::getCurrent()])->all();
        $sendFlag = 'no';
        $flag = true;
        $message = '';

        if ($model->load(Yii::$app->request->post())) {
            $servicesId = ArrayHelper::map($services, 'id', 'name');
            $servicesName = '';
            foreach ($model->services as $key => $serviceId) {
                $servicesName .= (isset($servicesId[$serviceId]) ? $servicesId[$serviceId] : '') . ', ';
            }
            $servicesName = trim($servicesName, ', ');
            $message = "<b>Shartnoma tuzish uchun Yangi Foydalanuvchi!</b>\n
Familya: {$model->surname}
Ism: {$model->name}
Otasining ismi: {$model->patronymic}
Telefon: {$model->phone}
Kompaniya nomi: {$model->companyname}
Lavozimi: {$model->position}
Qaysi shahardan: {$model->city}
Manzili: {$model->address}
Qaysi xizmat turidan foydalanmoqchi: {$servicesName}
Yukning kutilayotgan og’irligi: {$model->weight}
Yukning kutilayotgan hajmi: {$model->volume}
Yuk xarakeristikasi tog’risida qisqacha ma’lumot: {$model->shortInfo}";

            $client = new \yii\httpclient\Client();
            try {
                $response = $client->createRequest()
                ->setMethod('POST')
                ->setUrl($this->telegramUrl.'?&parse_mode=html')
                ->setData(['text' => $message, 'chat_id' => $this->telegramChatId])
                ->send();
            } catch (\Exception $e) {
                $flag = false;
                $sendFlag = 'no';
                $error = $e->getMessage();
            }
            if ($flag) {
                $result = json_decode($response->content, true);
                if (is_array($result) and isset($result['ok']) and $result['ok']) {
                    $flag = true;
                    $sendFlag = 'yes';
                } else {
                    $flag = false;
                    $sendFlag = 'no';
                }
            }
        }

        if (!$flag) {
            Yii::$app->session->setFlash('error', Yii::t('app', 'Error'));
        }

        if ($sendFlag == 'yes') {
            $model = new Contract();
            Yii::$app->session->setFlash('success', (Yii::t('app', 'accepted') . ', ' . Yii::t('app', 'will_connect')));
            $url  = $this->serverUrl;
            $text = [
                'customer_id' => -1,
                'message' => $message,
                'chat_id' => $this->telegramChatId
            ];
            $client = new \yii\httpclient\Client();
            $response = $client->createRequest()
            ->setMethod('POST')
            ->setUrl($url)
            ->setData($text)
            ->send();
        }

        return $this->render('contract', [
            'model' => $model,
            'services' => $services,
            'sendFlag' => $sendFlag,
        ]);
    }

    /**
     * Displays Condition page.
     *
     * @return mixed
     */
   public function actionCondition()
   {
       $conditions = Condition::find()->where(['lang' => Lang::getCurrent()])->all();
       return $this->render('condition', [
           'conditions' => $conditions,
       ]);
   }

    /**
     * Displays Partner page.
     *
     * @return mixed
     */
    public function actionPartner()
    {
        $model = new Franchising();
        $sendFlag = 'no';
        $flag = true;
        $text = '';
        if ($model->load(Yii::$app->request->post())) {
            $text = "<b>Franshiza uchun Yangi Foydalanuvchi!</b>\n
Ism: {$model->name}
Telefon: {$model->phone}";

            $client = new \yii\httpclient\Client();
            try {
                $response = $client->createRequest()
                ->setMethod('POST')
                ->setUrl($this->telegramUrl.'?&parse_mode=html')
                ->setData(['text' => $text, 'chat_id' => $this->chatIdSardor])
                ->send();
            } catch (\Exception $e) {
                $flag = false;
                $sendFlag = 'no';
                $error = $e->getMessage();
            }
            if ($flag) {
                $result = json_decode($response->content, true);
                if (is_array($result) and isset($result['ok']) and $result['ok']) {
                    $flag = true;
                    $sendFlag = 'yes';
                } else {
                    $flag = false;
                    $sendFlag = 'no';
                }
            }
        }

        if (!$flag) {
            Yii::$app->session->setFlash('error', Yii::t('app', 'Error'));
        }

        if ($sendFlag == 'yes') {
            $model = new Franchising();
            Yii::$app->session->setFlash('success', (Yii::t('app', 'accepted') . ', ' . Yii::t('app', 'will_connect')));
            $url  = $this->serverUrl;
            $text = [
                'customer_id' => -100,
                'message' => $text,
                'chat_id' => $this->telegramChatId
            ];
            $client = new \yii\httpclient\Client();
            $response = $client->createRequest()
            ->setMethod('POST')
            ->setUrl($url)
            ->setData($text)
            ->send();
        }

        return $this->render('partner', [
            'model' => $model
        ]);
    }


    /**
     * Displays Projects page.
     *
     * @return mixed
     */
    public function actionProjects()
    {
        $projects = Project::find()->where(['lang' => Lang::getCurrent()])->all();
        return $this->render('projects', [
            'projects' => $projects
        ]);
    }

    /**
     * Displays News page.
     *
     * @return mixed
     */
    public function actionNews()
    {
        $query = News::find()->where(['lang' => Lang::getCurrent()]);
        $pagination = new Pagination(['totalCount' => $query->count(), 'pageSize'=>9]);
        $news = News::find()->where(['lang' => Lang::getCurrent()])->offset($pagination->offset)->limit($pagination->limit)->orderBy('id DESC')->all();
        return $this->render('news', [
            'news' => $news,
            'pagination' => $pagination,
        ]);
    }

    public function actionNewsView($id)
    {
        $model = News::findOne($id);
        if ($model){
            if ($model->lang != Lang::getCurrent()->id){
                return $this->redirect(['news']);
            }
        } else {
            return $this->redirect(['news']);
        }

        return $this->render('news-view', [
            'model' => $model
        ]);
    }

    /**
     * Displays Review page.
     *
     * @return mixed
     */
    public function actionReview()
    {
        $reviews = Review::find()->where(['lang' => Lang::getCurrent()])->all();
        return $this->render('review', [
            'reviews' => $reviews,
        ]);
    }

    /**
     * Displays Vacancy page.
     *
     * @return mixed
     */
    public function actionVacancy()
    {
        $vacancies = Vacancy::find()->where(['lang' => Lang::getCurrent()])->all();
        return $this->render('vacancy', [
            'vacancies' => $vacancies,
        ]);
    }

    /**
     * Displays Privancy page.
     *
     * @return mixed
     */
    public function actionPrivancy()
    {
        $lang =  Lang::getCurrent();
        $privancy = PrivancyPolicy::find()->where(['lang' => Lang::getCurrent()])->one();
        $documents = Document::findLatestRecords()->where(['lang'=>$lang['url']])->all();
//        vd($documents);
        return $this->render('privancy', [
            'privancy' => $privancy,
            'documents' => $documents,
            'lang' => Lang::getCurrent()
        ]);
    }


    /**
     * Displays Services page.
     *
     * @return mixed
     */
    public function actionServices()
    {
        $service = Services::find()->where(['lang' => Lang::getCurrent()])->one();
        return $this->redirect(['service', 'id' => $service->id]);
    }

    /**
     * Displays one Service page.
     *
     * @return mixed
     */
    public function actionService($id)
    {
        $idToString = [
            1 => 'express-pochta',
            2 => 'kompleks-logistika',
            3 => 'kuryer-xizmati',
            4 => 'xalqaro-yetkazish',
            5 => 'sklad-xizmati',
            6 => 'e-commerce',
            7 => 'individual-yuk-tashish',
            8 => 'ekspres-pochta',
            9 => 'kompleksnaya-logistika',
            10 => 'kuryerskaya-slujba',
            12 => 'skladskie-uslugi',
            13 => 'ecommerskaya',
            22 => 'mejdunarodnaya_dostavka',
            23 => 'individualnaya_perevozka_gruzov',
        ];

        if (isset($idToString[$id])) {
            return $this->redirect(['/' . $idToString[$id]]);
        }

        if ($id == 'express-pochta') {
            $id = 1;
        } elseif ($id == 'kompleks-logistika') {
            $id = 2;
        } elseif ($id == 'kuryer-xizmati') {
            $id = 3;
        } elseif ($id == 'xalqaro-yetkazish') {
            $id = 4;
        } elseif ($id == 'sklad-xizmati') {
            $id = 5;
        } elseif ($id == 'e-commerce') {
            $id = 6;
        } elseif ($id == 'individual-yuk-tashish') {
            $id = 7;
        } elseif ($id == 'ekspres-pochta') {
            $id = 8;
        } elseif ($id == 'kompleksnaya-logistika') {
            $id = 9;
        } elseif ($id == 'kuryerskaya-slujba') {
            $id = 10;
        } elseif ($id == 'skladskie-uslugi') {
            $id = 12;
        } elseif ($id == 'ecommerskaya') {
            $id = 13;
        } elseif ($id == 'mejdunarodnaya_dostavka') {
            $id = 22;
        } elseif ($id == 'individualnaya_perevozka_gruzov') {
            $id = 23;
        }

        $model = Services::findOne($id);
        if ($model){
            if ($model->lang != Lang::getCurrent()->id){
                return $this->redirect(['services']);
            }
        } else {
            return $this->redirect(['services']);
        }

        $services = Services::find()->where(['lang' => Lang::getCurrent()])->all();

        $message = new ServicesMessage();
        $sendFlag = 'no';
        $flag = true;
        $text = '';
        if ($message->load(Yii::$app->request->post())) {
            $text = "<b>Shartnoma tuzish uchun Yangi Foydalanuvchi!</b>\n
Хizmat turi: {$message->service}
Ism: {$message->name}
Telefon: {$message->phone}";

            $client = new \yii\httpclient\Client();
            try {
                $response = $client->createRequest()
                ->setMethod('POST')
                ->setUrl($this->telegramUrl.'?&parse_mode=html')
                ->setData(['text' => $text, 'chat_id' => $this->telegramChatId])
                ->send();
            } catch (\Exception $e) {
                $flag = false;
                $sendFlag = 'no';
                $error = $e->getMessage();
            }
            if ($flag) {
                $result = json_decode($response->content, true);
                if (is_array($result) and isset($result['ok']) and $result['ok']) {
                    $flag = true;
                    $sendFlag = 'yes';
                } else {
                    $flag = false;
                    $sendFlag = 'no';
                }
            }
        }

        if (!$flag) {
            Yii::$app->session->setFlash('error', Yii::t('app', 'Error'));
        }

        if ($sendFlag == 'yes') {
            $message = new ServicesMessage();
            Yii::$app->session->setFlash('success', (Yii::t('app', 'accepted') . ', ' . Yii::t('app', 'will_connect')));
            $url  = $this->serverUrl;
            $text = [
                'customer_id' => -1,
                'message' => $text,
                'chat_id' => $this->telegramChatId
            ];
            $client = new \yii\httpclient\Client();
            $response = $client->createRequest()
            ->setMethod('POST')
            ->setUrl($url)
            ->setData($text)
            ->send();
        }

        return $this->render('services', [
            'model' => $model,
            'services' => $services,
            'message' => $message,
            'id' => $id,
        ]);
    }

    /**
     * Displays Faq page.
     *
     * @return mixed
     */
    public function actionFaq()
    {
        $faqs = Faq::find()->where(['lang' => Lang::getCurrent()])->all();
        return $this->render('faq', [
            'faqs' => $faqs,
        ]);
    }

    public function actionAdminLogin()
    {
        die('Kirish mumkin emas');
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->redirect(['profile']);
        }

        $model = new Login();
        if ($model->load(Yii::$app->request->post()) and $model->validate()) {
            $userId = $model->userSave();
            $flag = true;
            $error = '';
            $url  = $this->serverUrl;
            $data = [
                'phone' => $model->phone
            ];
            $client = new Client([
                'transport' => 'yii\httpclient\CurlTransport'
            ]);
            try {
                $response = $client->createRequest()
                    ->setMethod('POST')
                    ->setFormat(Client::FORMAT_JSON)
                    ->setHeaders(['version' => '1'])
                    ->setUrl($url)
                    ->setData($data)
                    ->send();
            } catch (\Exception $e) {
                $flag = false;
                $error = $e->getMessage();
                Yii::$app->session->setFlash('error', $error);
            }
            if ($flag) {
                $result = json_decode($response->content, true);
                if (is_array($result) and isset($result['code']) and $result['code'] == 200) {
                    $param = base64_encode($userId);
                    $param = str_replace('=', '_', $param);
                    $url = Url::to(['site/check-sms', 'param' => $param]);
                    return $this->redirect($url);
                } else {
                    $flag = false;
                    if (isset($result['messages']['message'])) {
                        Yii::$app->session->setFlash('error', $result['messages']['message']);
                    } else {
                        Yii::$app->session->setFlash('error', $result['messages']);
                    }
                }
            } else {
                Yii::$app->session->setFlash('error', $error);
            }
        }

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionCheckSms($param)
    {
        $id = base64_decode($param);
        $session = Yii::$app->session;
        $model = new VerifyForm();
        $user = User::findOne(['id' => $id]);
        if (!$user) {
            Yii::$app->session->setFlash('error', 'Foydalanuvchi topilmadi!!!');
            return $this->redirect(['/site/login']);
        }
        if ($model->load(Yii::$app->request->post()) and $model->validate()) {
            $flag = true;
            $error = '';
            $url  = $this->serverUrl;
            $data = [
                'phone' => $user->phone,
                'code'  => $model->number
            ];
            $client = new Client([
                'transport' => 'yii\httpclient\CurlTransport'
            ]);
            try {
                $response = $client->createRequest()
                    ->setMethod('POST')
                    ->setFormat(Client::FORMAT_JSON)
                    ->setHeaders(['version' => '1'])
                    ->setUrl($url)
                    ->setData($data)
                    ->send();
            } catch (\Exception $e) {
                $flag = false;
                $error = $e->getMessage();
                Yii::$app->session->setFlash('error', $error);
            }
            if ($flag) {
                $result = json_decode($response->content, true);
                if (is_array($result) and isset($result['code']) and $result['code'] == 200) {
                    $user->status = User::STATUS_ACTIVE;
                    $user->bts_token = $result['data']['token'];
                    $user->save(false);
                    Yii::$app->user->login($user, 3600 * 24 * 30);
                    return $this->redirect(['/site/profile']);
                } else {
                    $flag = false;
                    if (isset($result['messages']['message'])) {
                        Yii::$app->session->setFlash('error', $result['messages']['message']);
                    } else {
                        Yii::$app->session->setFlash('error', $result['messages']);
                    }
                }
            } else {
                Yii::$app->session->setFlash('error', $error);
            }
        }

        return $this->render('verify', [
            'model' => $model,
        ]);
    }

    public function actionLoginOld()
    {
        die('Kirish mumkin emas');
        if (!Yii::$app->user->isGuest) {
            return $this->redirect(['profile']);
        }

        $model = new LoginForm();

        if ($model->load(Yii::$app->request->post())) {
            $flag = true;
            $error = '';
            $url  = $this->serverUrl;
            $data = [
                'login' => $model->username,
                'password' => $model->password
            ];
            $client = new Client([
                'transport' => 'yii\httpclient\CurlTransport'
            ]);
            try {
                $response = $client->createRequest()
                    ->setMethod('POST')
                    ->setFormat(Client::FORMAT_JSON)
                    ->setHeaders(['version' => '1'])
                    ->setUrl($url)
                    ->setData($data)
                    ->send();
            } catch (\Exception $e) {
                $flag = false;
                $error = $e->getMessage();
                Yii::$app->session->setFlash('error', $error);
            }
            if ($flag) {
                $result = json_decode($response->content, true);
                if (is_array($result) and isset($result['code']) and $result['code'] == 200) {
                    $flag = $this->loginVerification($result['data']['token'], $data);
                    if ($flag) {
                        if ($model->login()) {
                            return $this->redirect(['profile']);
                        }
                    }
                } else {
                    $flag = false;
                    if (isset($result['messages']['message'])) {
                        Yii::$app->session->setFlash('error', $result['messages']['message']);
                    } else {
                        Yii::$app->session->setFlash('error', $result['messages']);
                    }
                }
            } else {
                Yii::$app->session->setFlash('error', $error);
            }
        }

        $model->password = '';

        return $this->render('login-old', [
            'model' => $model,
        ]);
    }

    protected function loginVerification($token, $data)
    {
        $user = User::find()->where(['username' => $data['login']])->one();
        if (!$user) {
            $user = new User();
        }
        $user->username = $data['login'];
        $user->email = $data['login'] . '@domen.bts';
        $user->status = User::STATUS_ACTIVE;
        $user->bts_token = $token;
        $user->setPassword($data['password']);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();
        if ($user->save()) {
            return true;
        } else {
            return false;
        }
    }




    public function actionSignup()
    {
        vd('Kirish mumkin emas');
        if (!Yii::$app->user->isGuest){
            return $this->goHome();
        }

        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) and $model->validate()) {

            $flag = true;
            $error = '';
            $url  = $this->serverUrl;
            $data = [
                'login' => $model->username,
                'password' => $model->password,
                'firstname' => $model->name,
                'phone' => $model->phone
            ];
            $client = new Client([
                'transport' => 'yii\httpclient\CurlTransport'
            ]);
            try {
                $response = $client->createRequest()
                    ->setMethod('POST')
                    ->setFormat(Client::FORMAT_JSON)
                    ->setHeaders(['version' => '1'])
                    ->setUrl($url)
                    ->setData($data)
                    ->send();
            } catch (\Exception $e) {
                $flag = false;
                $error = $e->getMessage();
                Yii::$app->session->setFlash('error', $error);
            }
            if ($flag) {
                $result = json_decode($response->content, true);
                if (is_array($result) and isset($result['code']) and $result['code'] == 200) {
                    if ($result['data']['isSuccess']) {
                        $flag = true;

                        $user = new User();
                        $user->username = $model->username;
                        $user->email = $model->username . '@domen.bts';
                        $user->status = User::STATUS_INACTIVE;
                        // $user->bts_token = $token;
                        $user->setPassword($model->password);
                        $user->generateAuthKey();
                        $user->generateEmailVerificationToken();
                        if ($user->save()) {
                            return $this->redirect(['/site/send-sms', 'id' => $user->id]);
                        } else {
                            $error = $user->errors;
                            $flag = false;
                            Yii::$app->session->setFlash('error', $error);
                        }
                    }
                } else {
                    $flag = false;
                    if (isset($result['messages']['message'])) {
                        Yii::$app->session->setFlash('error', $result['messages']['message']);
                    } else {
                        Yii::$app->session->setFlash('error', $result['messages']);
                    }
                }
            } else {
                $flag = false;
                Yii::$app->session->setFlash('error', $error);
            }
        }
        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    public function actionSendSms($id)
    {
        $session = Yii::$app->session;
        $model = new VerifyForm();
        $user = User::findOne(['id' => $id]);
        if (!$user) {
            Yii::$app->session->setFlash('error', 'Foydalanuvchi topilmadi!!!');
            return $this->redirect(['/site/signup']);
        }
        if ($model->load(Yii::$app->request->post())) {
            $flag = true;
            $error = '';
            $url  = $this->serverUrl;
            $userPhone = $session->get('userPhone');
            $data = [
                'login' => $user->username,
                'phone' => $userPhone,
                'code'  => $model->number
            ];
            $client = new Client([
                'transport' => 'yii\httpclient\CurlTransport'
            ]);
            try {
                $response = $client->createRequest()
                    ->setMethod('POST')
                    ->setFormat(Client::FORMAT_JSON)
                    ->setHeaders([
                        'version' => '1'
                    ])
                    ->setUrl($url)
                    ->setData($data)
                    ->send();
            } catch (\Exception $e) {
                $flag = false;
                $error = $e->getMessage();
                Yii::$app->session->setFlash('error', $error);
            }
            if ($flag) {
                $result = json_decode($response->content, true);
                if (is_array($result) and isset($result['code']) and $result['code'] == 200) {
                    $flag = $this->signupVerification($result['data']['token'], $user->id);
                    if ($flag) {
                        Yii::$app->user->login($user, 3600 * 24 * 30);
                        return $this->redirect(['/site/profile']);
                    }
                } else {
                    $flag = false;
                    if (isset($result['messages']['message'])) {
                        $error = $result['messages']['message'];
                        Yii::$app->session->setFlash('error', $error);
                    } else {
                        $error = $result['messages'];
                        Yii::$app->session->setFlash('error', $error);
                    }
                }
            }
        }

        $flag = true;
        $error = '';
        $url  = $this->serverUrl;
        $userPhone = null;
        $data = [
            'login' => $user->username
        ];
        $client = new Client([
            'transport' => 'yii\httpclient\CurlTransport'
        ]);
        try {
            $response = $client->createRequest()
                ->setMethod('POST')
                ->setFormat(Client::FORMAT_JSON)
                ->setHeaders([
                    'version' => '1'
                ])
                ->setUrl($url)
                ->setData($data)
                ->send();
        } catch (\Exception $e) {
            $flag = false;
            $error = $e->getMessage();
            Yii::$app->session->setFlash('error', $error);
        }
        if ($flag) {
            $result = json_decode($response->content, true);
            if (is_array($result) and isset($result['code']) and $result['code'] == 200) {
                $flag = true;
                $userPhone = $result['data']['phone'];
                $session->set('userPhone', $userPhone);
            } else {
                $flag = false;
                if (isset($result['messages']['message'])) {
                    $error = $result['messages']['message'];
                    Yii::$app->session->setFlash('error', $error);
                } else {
                    $error = $result['messages'];
                    Yii::$app->session->setFlash('error', $error);
                }
            }
        }

        if ($userPhone) {
            $flag = true;
            $error = '';
            $url  = $this->serverUrl;
            $userProfile = [];
            $data = [
                'login' => $user->username,
                'phone' => $userPhone
            ];
            $client = new Client([
                'transport' => 'yii\httpclient\CurlTransport'
            ]);
            try {
                $response = $client->createRequest()
                    ->setMethod('POST')
                    ->setFormat(Client::FORMAT_JSON)
                    ->setHeaders([
                        'version' => '1'
                    ])
                    ->setUrl($url)
                    ->setData($data)
                    ->send();
            } catch (\Exception $e) {
                $flag = false;
                $error = $e->getMessage();
                Yii::$app->session->setFlash('error', $error);
            }
            if ($flag) {
                $result = json_decode($response->content, true);
                if (is_array($result) and isset($result['code']) and $result['code'] == 200) {
                    if ($result['data']['isSuccess']) {
                        $flag = true;
                    }
                } else {
                    $flag = false;
                    if (isset($result['messages']['message'])) {
                        $error = $result['messages']['message'];
                        Yii::$app->session->setFlash('error', $error);
                    } else {
                        $error = $result['messages'];
                        Yii::$app->session->setFlash('error', $error);
                    }
                }
            }
        } else {
            Yii::$app->session->setFlash('error', 'Foydalanuvchi topilmadi!!!');
            return $this->redirect(['/site/signup']);
        }

        if (!$flag) {
            $error = $result['messages'];
            Yii::$app->session->setFlash('error', $error);
            return $this->redirect(['/site/signup']);
        }

        return $this->render('verify', [
            'model' => $model,
        ]);
    }

    protected function signupVerification($token, $id)
    {
        $user = User::findOne(['id' => $id]);
        if (!$user) {
            Yii::$app->session->setFlash('error', 'Foydalanuvchi topilmadi!!!');
            return $this->redirect(['/site/signup']);
        }
        $user->status = User::STATUS_ACTIVE;
        $user->bts_token = $token;
        if ($user->save()) {
            return true;
        } else {
            return false;
        }
    }

    public function actionVerify()
    {
        $model = new VerifyForm();
        if ($model->load(Yii::$app->request->post())) {
            $model->number = Yii::$app->request->post()['VerifyForm']['number'];
            $user = $model->verify($id);
            if (is_int($user)){
                Yii::$app->user->login(User::findIdentity($user), 3600 * 24 * 30);
                return $this->redirect(['/site/profile']);
            } else {
                if (is_array($user)){
                    foreach ($user as $err){
                        Yii::$app->session->setFlash('error', $err);
                    }
                } else {
                    Yii::$app->session->setFlash('error', $user);
                }
            }
        }

        return $this->render('verify', [
            'model' => $model,
        ]);
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionBtsLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }

    public function actionForgotPassword()
    {
        $model = new ForgotPasswordForm();
        if ($model->load(Yii::$app->request->post())) {
            $flag = true;
            $error = '';
            $url  = $this->serverUrl;
            $data = [
                'login' => $model->login
            ];
            $client = new Client([
                'transport' => 'yii\httpclient\CurlTransport'
            ]);
            try {
                $response = $client->createRequest()
                    ->setMethod('POST')
                    ->setFormat(Client::FORMAT_JSON)
                    ->setHeaders([
                        'version' => '1'
                    ])
                    ->setUrl($url)
                    ->setData($data)
                    ->send();
            } catch (\Exception $e) {
                $flag = false;
                $error = $e->getMessage();
                Yii::$app->session->setFlash('error', $error);
            }
            if ($flag) {
                $result = json_decode($response->content, true);
                if (is_array($result) and isset($result['code']) and $result['code'] == 200) {
                    return $this->redirect(['/site/verify-phone-number', 'login' => $model->login, 'phoneMask' => $result['data']['phoneMask']]);
                } else {
                    $flag = false;
                    if (isset($result['messages']['message'])) {
                        $error = $result['messages']['message'];
                        Yii::$app->session->setFlash('error', $error);
                    } else {
                        $error = $result['messages'];
                        Yii::$app->session->setFlash('error', $error);
                    }
                }
            }
        }
        return $this->render('forgot-password', [
            'model' => $model,
        ]);
    }

    public function actionVerifyPhoneNumber($login, $phoneMask, $flag = null)
    {
        if ($flag ==  'yes') {
            $flag = true;
            $error = '';
            $url  = $this->serverUrl;
            $data = [
                'login' => $login,
                'phoneFlag' => $flag
            ];
            $client = new Client([
                'transport' => 'yii\httpclient\CurlTransport'
            ]);
            try {
                $response = $client->createRequest()
                    ->setMethod('POST')
                    ->setFormat(Client::FORMAT_JSON)
                    ->setHeaders([
                        'version' => '1'
                    ])
                    ->setUrl($url)
                    ->setData($data)
                    ->send();
            } catch (\Exception $e) {
                $flag = false;
                $error = $e->getMessage();
                Yii::$app->session->setFlash('error', $error);
            }
            if ($flag) {
                $result = json_decode($response->content, true);
                if (is_array($result) and isset($result['code']) and $result['code'] == 200) {
                    Yii::$app->session->setFlash('success', Yii::t('app', 'An SMS code has been sent to your number'));
                    return $this->redirect([
                        '/site/update-password',
                        'login' => $result['data']['login'],
                        'phone' => $result['data']['phone'],
                        'phoneMask' => $phoneMask
                    ]);
                } else {
                    $flag = false;
                    if (isset($result['messages']['message'])) {
                        $error = $result['messages']['message'];
                        Yii::$app->session->setFlash('error', $error);
                    } else {
                        $error = $result['messages'];
                        Yii::$app->session->setFlash('error', $error);
                    }
                }
            }
        }
        if ($flag == 'no') {
            return $this->redirect(['forgot-password']);
        }
        return $this->render('verify-phone-number', [
            'login' => $login,
            'phoneMask' => $phoneMask,
            'flag' => $flag,
        ]);
    }

    public function actionUpdatePassword($login, $phone, $phoneMask)
    {
        $model = new BtsUpdatePassword();
        if ($model->load(Yii::$app->request->post())) {




            $flag = true;
            $error = '';
            $url  = $this->serverUrl;
            $data = [
                'login' => $login,
                'phone' => $phone,
                'code' => $model->code,
                'password' => $model->password,
            ];
            $client = new Client([
                'transport' => 'yii\httpclient\CurlTransport'
            ]);
            try {
                $response = $client->createRequest()
                    ->setMethod('POST')
                    ->setFormat(Client::FORMAT_JSON)
                    ->setHeaders([
                        'version' => '1'
                    ])
                    ->setUrl($url)
                    ->setData($data)
                    ->send();
            } catch (\Exception $e) {
                $flag = false;
                $error = $e->getMessage();
                Yii::$app->session->setFlash('error', $error);
            }
            if ($flag) {
                $result = json_decode($response->content, true);
                if (is_array($result) and isset($result['code']) and $result['code'] == 200) {
                    $flag = $this->loginVerification($result['data']['token'], $data);
                    if ($flag) {
                        $user = User::findOne(['username' => $login]);
                        Yii::$app->user->login($user, 3600 * 24 * 30);
                        return $this->redirect(['/site/profile']);
                    }
                } else {
                    $flag = false;
                    if (isset($result['messages']['message'])) {
                        $error = $result['messages']['message'];
                        Yii::$app->session->setFlash('error', $error);
                    } else {
                        $error = $result['messages'];
                        Yii::$app->session->setFlash('error', $error);
                    }
                }
            }
        }
        return $this->render('update-password', [
            'model' => $model,
            'login' => $login,
            'phone' => $phone,
            'phoneMask' => $phoneMask
        ]);
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new Meeting();

        if ($model->load(Yii::$app->request->post())) {
            $array = [
                'type' => $model->type,
                'message' => $model->message,
                'name' => $model->name,
                'phone' => $model->phone,
                'isApiSite' => 'yes',
            ];

            $flag = true;
            $error = '';
            $url  = $this->serverUrl;
            $client = new Client([
                'transport' => 'yii\httpclient\CurlTransport'
            ]);
            try {
                $response = $client->createRequest()
                    ->setMethod('POST')
                    ->setFormat(Client::FORMAT_JSON)
                    ->setHeaders(['version' => '1'])
                    ->setUrl($url)
                    ->setData($array)
                    ->send();
            } catch (\Exception $e) {
                $flag = false;
                $error = $e->getMessage();
                Yii::$app->session->setFlash('error', $error);
            }
            if ($flag) {
                $result = json_decode($response->content, true);
                if (is_array($result) and isset($result['code']) and $result['code'] == 200) {
                    $res = $result['data'];
                    $model = new Meeting();
                    Yii::$app->session->setFlash('success', Yii::t('app', 'Thank you for contacting'));
                } else {
                    $flag = false;
                    if (isset($result['messages']['message'])) {
                        Yii::$app->session->setFlash('error', $result['messages']['message']);
                    } else {
                        Yii::$app->session->setFlash('error', $result['messages']);
                    }
                }
            } else {
                Yii::$app->session->setFlash('error', $error);
            }
        }

        $lang = Yii::$app->language;
        if ($lang == 'uz-UZ') {
            $language = 'uz';
        } elseif ($lang == 'ru-RU') {
            $language = 'ru';
        } elseif ($lang == 'en-UZ') {
            $language = 'en';
        }

        $flag = true;
        $error = '';
        $url  = $this->serverUrl;
        $meetingCategory = [];
        $client = new Client([
            'transport' => 'yii\httpclient\CurlTransport'
        ]);
        try {
            $response = $client->createRequest()
                ->setMethod('GET')
                ->setFormat(Client::FORMAT_JSON)
                ->setHeaders([
                    'version' => '1',
                    'language' => $language
                ])
                ->setUrl($url)
                ->send();
        } catch (\Exception $e) {
            $flag = false;
            $error = $e->getMessage();
        }
        if ($flag) {
            $result = json_decode($response->content, true);
            if (is_array($result) and isset($result['code']) and $result['code'] == 200) {
                $meetingCategory = $result['data'];
                $meetingCategory = ArrayHelper::map($meetingCategory, 'id', 'name');
            } else {
                $flag = false;
                if (isset($result['messages']['message'])) {
                    $error = $result['messages']['message'];
                } else {
                    $error = $result['messages'];
                }
            }
        }
        if (!$flag) {
            Yii::$app->session->setFlash('error', $error);
        }

        return $this->render('contact', [
            'model' => $model,
            'meetingCategory' => $meetingCategory,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        $teams = Team::find()->where(['lang' => Lang::getCurrent()])->all();
        return $this->render('about', [
            'teams' => $teams,
        ]);
    }

    /**
     * Displays inmail page.
     *
     * @return mixed
     */
    public function actionInmail($regionIds = null, $isSender = 'no', $lang = 'uz', $serverPaginationUrl = null)
    {
        if (Yii::$app->user->isGuest){
            return $this->redirect(['login']);
        }
        $user = Yii::$app->user;
        $token = $user->identity->bts_token;
        // $profile = Profile::findOne(['user_id' => 5]);

        $flag = true;
        $error = '';
        $url  = $this->serverUrl;
        $userProfile = [];
        // $data = [
        //     'login' => $model->username,
        //     'password' => $model->password
        // ];
        $client = new Client([
            'transport' => 'yii\httpclient\CurlTransport'
        ]);
        try {
            $response = $client->createRequest()
                ->setMethod('GET')
                ->setFormat(Client::FORMAT_JSON)
                ->setHeaders([
                    'version' => '1',
                    'Authorization' => 'Bearer ' . $token
                ])
                ->setUrl($url)
                // ->setData($data)
                ->send();
        } catch (\Exception $e) {
            $flag = false;
            $error = $e->getMessage();
        }
        if ($flag) {
            $result = json_decode($response->content, true);
            if (is_array($result) and isset($result['code']) and $result['code'] == 200) {
                $userProfile = $result['data'];
            } else {
                $flag = false;
                if (isset($result['messages']['message'])) {
                    $error = $result['messages']['message'];
                } else {
                    $error = $result['messages'];
                }
            }
        }
        if (!$flag) {
            Yii::$app->user->logout();
            Yii::$app->session->setFlash('error', $error);
            return $this->redirect(['login']);
        }

        $flag = true;
        $error = '';
        $url  = $this->serverUrl;
        if ($serverPaginationUrl) {
            $url = $serverPaginationUrl;
        }
        $dataHistory = [];
        $data = [
            'isSender' => $isSender,
            'regionIds' => $regionIds,
        ];
        $client = new Client([
            'transport' => 'yii\httpclient\CurlTransport'
        ]);
        try {
            $response = $client->createRequest()
                ->setMethod('POST')
                ->setFormat(Client::FORMAT_JSON)
                ->setHeaders([
                    'version' => '1',
                    'Authorization' => 'Bearer ' . $token
                ])
                ->setUrl($url)
                ->setData($data)
                ->send();
        } catch (\Exception $e) {
            $flag = false;
            $error = $e->getMessage();
        }
        if ($flag) {
            $result = json_decode($response->content, true);
            if (is_array($result) and isset($result['code']) and $result['code'] == 200) {
                $dataHistory = $result['data'];
            } else {
                $flag = false;
                if (isset($result['messages']['message'])) {
                    $error = $result['messages']['message'];
                } else {
                    $error = $result['messages'];
                }
            }
        }
        if (!$flag) {
            Yii::$app->user->logout();
            Yii::$app->session->setFlash('error', $error);
            return $this->redirect(['login']);
        }


        return $this->render('inmail', [
            'user' => $user,
            'userProfile' => $userProfile,
            'dataHistory' => $dataHistory,
        ]);
    }

    /**
     * Displays outmail.
     *
     * @return mixed
     */
    public function actionOutmail($regionIds = null, $isSender = 'yes', $lang = 'uz', $serverPaginationUrl = null)
    {
        if (Yii::$app->user->isGuest){
            return $this->redirect(['login']);
        }
        $user = Yii::$app->user;
        $token = $user->identity->bts_token;
        // $profile = Profile::findOne(['user_id' => 5]);

        $flag = true;
        $error = '';
        $url  = $this->serverUrl;
        $userProfile = [];
        // $data = [
        //     'login' => $model->username,
        //     'password' => $model->password
        // ];
        $client = new Client([
            'transport' => 'yii\httpclient\CurlTransport'
        ]);
        try {
            $response = $client->createRequest()
                ->setMethod('GET')
                ->setFormat(Client::FORMAT_JSON)
                ->setHeaders([
                    'version' => '1',
                    'Authorization' => 'Bearer ' . $token
                ])
                ->setUrl($url)
                // ->setData($data)
                ->send();
        } catch (\Exception $e) {
            $flag = false;
            $error = $e->getMessage();
        }
        if ($flag) {
            $result = json_decode($response->content, true);
            if (is_array($result) and isset($result['code']) and $result['code'] == 200) {
                $userProfile = $result['data'];
            } else {
                $flag = false;
                if (isset($result['messages']['message'])) {
                    $error = $result['messages']['message'];
                } else {
                    $error = $result['messages'];
                }
            }
        }
        if (!$flag) {
            Yii::$app->user->logout();
            Yii::$app->session->setFlash('error', $error);
            return $this->redirect(['login']);
        }

        $flag = true;
        $error = '';
        $url  = $this->serverUrl;
        if ($serverPaginationUrl) {
            $url = $serverPaginationUrl;
        }
        $dataHistory = [];
        $data = [
            'isSender' => $isSender,
            'regionIds' => $regionIds,
        ];
        $client = new Client([
            'transport' => 'yii\httpclient\CurlTransport'
        ]);
        try {
            $response = $client->createRequest()
                ->setMethod('POST')
                ->setFormat(Client::FORMAT_JSON)
                ->setHeaders([
                    'version' => '1',
                    'Authorization' => 'Bearer ' . $token
                ])
                ->setUrl($url)
                ->setData($data)
                ->send();
        } catch (\Exception $e) {
            $flag = false;
            $error = $e->getMessage();
        }
        if ($flag) {
            $result = json_decode($response->content, true);
            if (is_array($result) and isset($result['code']) and $result['code'] == 200) {
                $dataHistory = $result['data'];
            } else {
                $flag = false;
                if (isset($result['messages']['message'])) {
                    $error = $result['messages']['message'];
                } else {
                    $error = $result['messages'];
                }
            }
        }
        if (!$flag) {
            Yii::$app->user->logout();
            Yii::$app->session->setFlash('error', $error);
            return $this->redirect(['login']);
        }

        return $this->render('outmail', [
            'user' => $user,
            'userProfile' => $userProfile,
            'dataHistory' => $dataHistory,
        ]);
    }

    public function actionTracking($id)
    {
        if (Yii::$app->user->isGuest){
            return $this->redirect(['login']);
        }
        $user = Yii::$app->user;
        $token = $user->identity->bts_token;

        $lang = Yii::$app->language;
        $lang = explode('-', $lang);
        $lang = isset($lang[0]) ? $lang[0] : 'uz';

        $flag = true;
        $error = '';
        $url  = $this->serverUrl;
        $dataTracking = [];
        $client = new Client([
            'transport' => 'yii\httpclient\CurlTransport'
        ]);
        try {
            $response = $client->createRequest()
                ->setMethod('GET')
                ->setFormat(Client::FORMAT_JSON)
                ->setHeaders([
                    'version' => '1',
                    'Authorization' => 'Bearer ' . $token,
                    'language' => $lang,
                ])
                ->setUrl($url)
                ->send();
        } catch (\Exception $e) {
            $flag = false;
            $error = $e->getMessage();
        }
        if ($flag) {
            $result = json_decode($response->content, true);
            if (is_array($result) and isset($result['code']) and $result['code'] == 200) {
                $dataTracking = $result['data'];
            } else {
                $flag = false;
                if (isset($result['messages']['message'])) {
                    $error = $result['messages']['message'];
                } else {
                    $error = $result['messages'];
                }
            }
        }
        $result = $this->renderPartial('tracking', [
            'dataTracking' => $dataTracking,
        ]);

        return $result;
    }

    public function actionDownload($file, $flagWaybill = 'no', $flagReport = 'no')
    {
        if (Yii::$app->user->isGuest){
            $filePath = Yii::getAlias('@webroot') . '/btsimages/temp';
        } else {
            $user = Yii::$app->user;
            $token = $user->identity->bts_token;
            $filePath = Yii::getAlias('@webroot') . '/btsimages/' . $user->identity->id;
        }
        $url = base64_decode($file);
        if (!is_dir($filePath)) {
            FileHelper::createDirectory($filePath, 0777, true);
        }

        $fileName = (time()) . '.png';
        if ($flagWaybill == 'yes') {
            $fileName = 'PhotoWaybill.png';
        }
        if ($flagReport == 'yes') {
            $fileName = 'PhotoReport.png';
        }

        $flag = false;
        if (file_put_contents(($filePath . '/' . $fileName), file_get_contents($url)))
        {
            $flag = true;
            if (file_exists(($filePath . '/' . $fileName))) {
                $flag = true;
                Yii::$app->response->sendFile(($filePath . '/' . $fileName), $fileName);
            }
        }
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    // public function actionSignup()
    // {
    //     if (!Yii::$app->user->isGuest){
    //         return $this->goHome();
    //     }
    //     $model = new SignupForm();
    //     if ($model->load(Yii::$app->request->post())) {
    //         $user = $model->signup();
    //         if (is_int($user)){
    //             return $this->redirect(['/site/verify', 'id' => $user]);
    //         } else {
    //             if (is_array($user)){
    //                 foreach ($user as $err){
    //                     Yii::$app->session->setFlash('error', $err);
    //                 }
    //             } else {
    //                 Yii::$app->session->setFlash('error', $user);
    //             }
    //         }
    //     }

    //     return $this->render('signup', [
    //         'model' => $model,
    //     ]);
    // }

    public function actionProfile()
    {
        if (Yii::$app->user->isGuest){
            return $this->redirect(['login']);
        }
        $user = Yii::$app->user;
        $token = $user->identity->bts_token;
        // $token = '7a2bdf7aa44f3861290ee5e515a4c3633547a6c2';
        // $profile = Profile::findOne(['user_id' => 5]);

        $flag = true;
        $error = '';
        $url  = $this->serverUrl;
        $userProfile = [];
        // $data = [
        //     'login' => $model->username,
        //     'password' => $model->password
        // ];
        $client = new Client([
            'transport' => 'yii\httpclient\CurlTransport'
        ]);
        try {
            $response = $client->createRequest()
                ->setMethod('GET')
                ->setFormat(Client::FORMAT_JSON)
                ->setHeaders([
                    'version' => '1',
                    'Authorization' => 'Bearer ' . $token
                ])
                ->setUrl($url)
                // ->setData($data)
                ->send();
        } catch (\Exception $e) {
            $flag = false;
            $error = $e->getMessage();
        }
        if ($flag) {
            $result = json_decode($response->content, true);
            if (is_array($result) and isset($result['code']) and $result['code'] == 200) {
                $userProfile = $result['data'];
            } else {
                $flag = false;
                if (isset($result['messages']['message'])) {
                    $error = $result['messages']['message'];
                } else {
                    $error = $result['messages'];
                }
            }
        }
        if (!$flag) {
            Yii::$app->user->logout();
            Yii::$app->session->setFlash('error', $error);
            return $this->redirect(['login']);

        }
        $region = BtsRegion::findOne(['id' => $userProfile['regionId']]);
        $city = BtsCity::findOne(['id' => $userProfile['cityId']]);

        return $this->render('profile', [
            'user' => $user,
            'userProfile' => $userProfile,
            'region' => $region,
            'city' => $city,
        ]);
    }

    public function actionPayments($serverPaginationUrl = null)
    {
        if (Yii::$app->user->isGuest){
            return $this->redirect(['login']);
        }
        $user = Yii::$app->user;
        $token = $user->identity->bts_token;

        // Payments

        $flag = true;
        $error = '';
        $url  = $this->serverUrl;
        if ($serverPaginationUrl) {
            $url = $serverPaginationUrl;
        }
        $payments = [];
        // $data = [
        //     'login' => $model->username,
        //     'password' => $model->password
        // ];
        $client = new Client([
            'transport' => 'yii\httpclient\CurlTransport'
        ]);
        try {
            $response = $client->createRequest()
                ->setMethod('GET')
                ->setFormat(Client::FORMAT_JSON)
                ->setHeaders([
                    'version' => '1',
                    'Authorization' => 'Bearer ' . $token
                ])
                ->setUrl($url)
                // ->setData($data)
                ->send();
        } catch (\Exception $e) {
            $flag = false;
            $error = $e->getMessage();
        }
        if ($flag) {
            $result = json_decode($response->content, true);
            if (is_array($result) and isset($result['code']) and $result['code'] == 200) {
                $payments = $result['data'];
            } else {
                $flag = false;
                if (isset($result['messages']['message'])) {
                    $error = $result['messages']['message'];
                } else {
                    $error = $result['messages'];
                }
            }
        }

        return $this->render('payments', [
            'payments' => $payments,
        ]);
    }

    public function actionGetReceipt($id)
    {
        $user = Yii::$app->user;
        $token = $user->identity->bts_token;
        $flag = true;
        $error = '';
        $url  = $this->serverUrl;
        $receipt = [];
        // $data = [
        //     'login' => $model->username,
        //     'password' => $model->password
        // ];
        $client = new Client([
            'transport' => 'yii\httpclient\CurlTransport'
        ]);
        try {
            $response = $client->createRequest()
                ->setMethod('GET')
                ->setFormat(Client::FORMAT_JSON)
                ->setHeaders([
                    'version' => '1',
                    'Authorization' => 'Bearer ' . $token
                ])
                ->setUrl($url)
                // ->setData($data)
                ->send();
        } catch (\Exception $e) {
            $flag = false;
            $error = $e->getMessage();
        }
        if ($flag) {
            $result = json_decode($response->content, true);
            if (is_array($result) and isset($result['code']) and $result['code'] == 200) {
                $receipt = $result['data'];
            } else {
                $flag = false;
                if (isset($result['messages']['message'])) {
                    $error = $result['messages']['message'];
                } else {
                    $error = $result['messages'];
                }
            }
        }

        if (empty($receipt)) {
            return 'Check topilmadi';
        }

        return $this->renderAjax('receipt', [
            'receipt' => $receipt
        ]);
    }

    public function actionReceipt($id)
    {
        // $id = 4130;
        // $string = barcodeToStr($id.random_int(100, 999));
        // vd($string);
        $this->layout = 'print';

        $number = barcodeToStr($id, false);
        $id = $number['barcode'] ?: 0;
        $id = substr($id, 0, -3);

        // $user = Yii::$app->user;
        // $token = $user->identity->bts_token;
        $flag = true;
        $error = '';
        $url  = $this->serverUrl;
        $receipt = [];
        // $data = [
        //     'login' => $model->username,
        //     'password' => $model->password
        // ];
        $client = new Client([
            'transport' => 'yii\httpclient\CurlTransport'
        ]);
        try {
            $response = $client->createRequest()
                ->setMethod('GET')
                ->setFormat(Client::FORMAT_JSON)
                ->setHeaders([
                    'version' => '1',
                    // 'Authorization' => 'Bearer ' . $token
                ])
                ->setUrl($url)
                // ->setData($data)
                ->send();
        } catch (\Exception $e) {
            $flag = false;
            $error = $e->getMessage();
        }
        if ($flag) {
            $result = json_decode($response->content, true);
            if (is_array($result) and isset($result['code']) and $result['code'] == 200) {
                $receipt = $result['data'];
            } else {
                $flag = false;
                if (isset($result['messages']['message'])) {
                    $error = $result['messages']['message'];
                } else {
                    $error = $result['messages'];
                }
            }
        }

        if (empty($receipt)) {
            return 'Check topilmadi';
        }

        return $this->render('receipt', [
            'receipt' => $receipt
        ]);
    }

    public function actionOfficeFindByCode($c)
    {
        $flag = true;
        $error = '';
        $dataResult = null;
        $url = $this->serverUrl;
        // if (is_null($id)) {
        // } else {
        //     $url = $this->serverUrl;
        // }
        $client = new Client([
            'transport' => 'yii\httpclient\CurlTransport'
        ]);
        try {
            $response = $client->createRequest()
                ->setMethod('GET')
                ->setFormat(Client::FORMAT_JSON)
                ->setHeaders([
                    'version' => '1'
                ])
                ->setUrl($url)
                ->send();
        } catch (\Exception $e) {
            $flag = false;
            $error = $e->getMessage();
        }
        if ($flag) {
            $result = json_decode($response->content, true);
            if (is_array($result) and isset($result['code']) and $result['code'] == 200) {
                $flag = true;
                $dataResult = $result['data'];
            } else {
                $flag = false;
                if (isset($result['messages']['message'])) {
                    $error = $result['messages']['message'];
                } else {
                    $error = $result['messages'];
                }
            }
        }

        if (!$flag) {
            Yii::$app->session->setFlash('error', $error);
        }

        return $this->render('office-find-by-code', [
            'model' => $dataResult
        ]);
    }

    public function actionUpdateProfile()
    {
        if (Yii::$app->user->isGuest){
            return $this->redirect(['login']);
        }
        $user = Yii::$app->user;
        $token = $user->identity->bts_token;

        $flag = true;
        $error = '';
        $url  = $this->serverUrl;
        $userProfile = [];
        // $data = [
        //     'login' => $model->username,
        //     'password' => $model->password
        // ];
        $client = new Client([
            'transport' => 'yii\httpclient\CurlTransport'
        ]);
        try {
            $response = $client->createRequest()
                ->setMethod('GET')
                ->setFormat(Client::FORMAT_JSON)
                ->setHeaders([
                    'version' => '1',
                    'Authorization' => 'Bearer ' . $token
                ])
                ->setUrl($url)
                // ->setData($data)
                ->send();
        } catch (\Exception $e) {
            $flag = false;
            $error = $e->getMessage();
        }
        if ($flag) {
            $result = json_decode($response->content, true);
            if (is_array($result) and isset($result['code']) and $result['code'] == 200) {
                $userProfile = $result['data'];
            } else {
                $flag = false;
                if (isset($result['messages']['message'])) {
                    $error = $result['messages']['message'];
                } else {
                    $error = $result['messages'];
                }
            }
        }
        if (!$flag) {
            Yii::$app->user->logout();
            Yii::$app->session->setFlash('error', $error);
            return $this->redirect(['login']);
        }

        $model = new UpdateProfile();
        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                $post = Yii::$app->request->post();
                $post = $post['UpdateProfile'];
                $post['birthdate'] = date('Y-m-d', strtotime($post['birthdate']));

                $flag = true;
                $error = '';
                $url  = $this->serverUrl;
                $userProfile = [];
                $client = new Client([
                    'transport' => 'yii\httpclient\CurlTransport'
                ]);
                try {
                    $response = $client->createRequest()
                        ->setMethod('POST')
                        ->setFormat(Client::FORMAT_JSON)
                        ->setHeaders([
                            'version' => '1',
                            'Authorization' => 'Bearer ' . $token
                        ])
                        ->setUrl($url)
                        ->setData($post)
                        ->send();
                } catch (\Exception $e) {
                    $flag = false;
                    $error = $e->getMessage();
                }
                if ($flag) {
                    $result = json_decode($response->content, true);
                    if (is_array($result) and isset($result['code']) and $result['code'] == 200) {
                        $flag = true;
                        $userProfile = $result['data'];
                    } else {
                        $flag = false;
                        if (isset($result['messages']['message'])) {
                            $error = $result['messages']['message'];
                        } else {
                            $error = $result['messages'];
                        }
                    }
                }
                if (!$flag) {
                    Yii::$app->user->logout();
                    Yii::$app->session->setFlash('error', $error);
                    return $this->redirect(['/site/profile']);
                } else {
                    Yii::$app->session->setFlash('success', Yii::t('app', 'success'));
                    return $this->redirect(['/site/profile']);
                }
            }
        } else {
            $model->load(['UpdateProfile' => $userProfile]);
        }
        if ($model->birthdate) {
            $model->birthdate = date('d.m.Y', strtotime($model->birthdate));
        }

        $lang = Yii::$app->language;

        $region = BtsRegion::find();
        $lang = Yii::$app->language;
        if ($lang == 'uz-UZ') {
            $region->orderBy('nameUz ASC');
        } elseif ($lang == 'ru-RU') {
            $region->orderBy('nameRu ASC');
        } elseif ($lang == 'en-UZ') {
            $region->orderBy('nameEn ASC');
        }
        $region = $region->all();

        if ($lang == 'uz-UZ') {
            $regions = ArrayHelper::map($region, 'id', 'nameUz');
        } elseif ($lang == 'ru-RU') {
            $regions = ArrayHelper::map($region, 'id', 'nameRu');
        } elseif ($lang == 'en-UZ') {
            $regions = ArrayHelper::map($region, 'id', 'nameEn');
        }

        $cities = [];
        if ($model->regionId) {
            $cities = BtsCity::find()->where(['regionId' => $model->regionId]);
            if ($lang == 'uz-UZ') {
                $cities->orderBy('nameUz ASC');
            } elseif ($lang == 'ru-RU') {
                $cities->orderBy('nameRu ASC');
            } elseif ($lang == 'en-UZ') {
                $cities->orderBy('nameEn ASC');
            }
            $cities = $cities->all();

            if ($lang == 'uz-UZ') {
                $cities = ArrayHelper::map($cities, 'id', 'nameUz');
            } elseif ($lang == 'ru-RU') {
                $cities = ArrayHelper::map($cities, 'id', 'nameRu');
            } elseif ($lang == 'en-UZ') {
                $cities = ArrayHelper::map($cities, 'id', 'nameEn');
            }
        }

        return $this->render('update-profile', [
            'user' => $user,
            'userProfile' => $userProfile,
            'model' => $model,
            'regions' => $regions,
            'cities' => $cities,
        ]);
    }

    public function actionGetCities($regionId)
    {
        $cities = BtsCity::find()->where(['regionId' => $regionId]);
        $lang = Yii::$app->language;
        if ($lang == 'uz-UZ') {
            $cities->orderBy('nameUz ASC');
        } elseif ($lang == 'ru-RU') {
            $cities->orderBy('nameRu ASC');
        } elseif ($lang == 'en-UZ') {
            $cities->orderBy('nameEn ASC');
        }
        $cities = $cities->all();

        if ($lang == 'uz-UZ') {
            $cities = ArrayHelper::map($cities, 'id', 'nameUz');
        } elseif ($lang == 'ru-RU') {
            $cities = ArrayHelper::map($cities, 'id', 'nameRu');
        } elseif ($lang == 'en-UZ') {
            $cities = ArrayHelper::map($cities, 'id', 'nameEn');
        }
        $html = '<option value="">---</option>';
        foreach ($cities as $id => $city) {
            $flag = true;
            if ($city == '---') {
                $flag = false;
            } elseif (is_null($city)) {
                $flag = false;
            }
            if ($flag) {
                $html .= '<option value="' . $id . '">' . $city . '</option>';
            } else {
                unset($cities[$id]);
            }
        }
        return $html;
    }

    public function actionGetReceiverBranch($regionId, $cityId, $receiverDelivery, $receiverBranchId = null, $arrayFlag = false)
    {
        $lang = Yii::$app->language;
        $array = [
            'receiverRegionId' => $regionId,
            'receiverDelivery' => $receiverDelivery,
            'cityId'           => $cityId,
            'receiverBranchId' => $receiverBranchId
        ];

        $flag = true;
        $error = '';
        $url  = $this->serverUrl;
        $client = new Client([
            'transport' => 'yii\httpclient\CurlTransport'
        ]);
        try {
            $response = $client->createRequest()
                ->setMethod('POST')
                ->setFormat(Client::FORMAT_JSON)
                ->setHeaders([
                    'version' => '1',
                    'language' => $lang,
                ])
                ->setUrl($url)
                ->setData($array)
                ->send();
        } catch (\Exception $e) {
            $flag = false;
            $error = $e->getMessage();
        }
        if ($flag) {
            $result = json_decode($response->content, true);
            if (is_array($result) and isset($result['code']) and $result['code'] == 200) {
                $res = $result['data'];
            } else {
                $flag = false;
                if (isset($result['messages']['message'])) {
                    $error = $result['messages']['message'];
                } else {
                    $error = $result['messages'];
                }
            }
        }

        $html = '';
        $resultArray = [];
        if ($flag) {
            foreach ($res as $id => $branch) {
                if ($branch != '---') {
                    if ($arrayFlag) {
                        $resultArray[$id] = $branch;
                    } else {
                        if ($branch['id'] == 17) {
                            continue;
                        }
                        $selected = '';
                        if ($branch['id'] == $receiverBranchId) {
                            $selected = ' selected';
                        }
                        $address = htmlspecialchars($branch['address_uz'], ENT_QUOTES);
                        $html .= '<option value="' . $branch['id'] . '"' . $selected .' data-regionid="' . $branch['regionId'] . '" data-cityid="' . $branch['cityId'] . '" data-address="' . $address . '" data-code="' . $branch['code'] . '">' . $branch['name'] . '</option>';
                    }
                }
            }
        }
        if ($arrayFlag) {
            return $resultArray;
        } else {
            return $html;
        }
    }

    public function actionGetBranchAddress($branchId)
    {
        $lang = Yii::$app->language;
        $flag = true;
        $error = '';
        $url  = $this->serverUrl;
        $client = new Client([
            'transport' => 'yii\httpclient\CurlTransport'
        ]);
        try {
            $response = $client->createRequest()
                ->setMethod('GET')
                ->setFormat(Client::FORMAT_JSON)
                ->setHeaders([
                    'version' => '1',
                    'language' => $lang,
                ])
                ->setUrl($url)
                ->send();
        } catch (\Exception $e) {
            $flag = false;
            $error = $e->getMessage();
        }
        if ($flag) {
            $result = json_decode($response->content, true);
            if (is_array($result) and isset($result['code']) and $result['code'] == 200) {
                $res = trim($result['data']);
            } else {
                $flag = false;
                if (isset($result['messages']['message'])) {
                    $error = $result['messages']['message'];
                } else {
                    $error = $result['messages'];
                }
            }
        }

        $html = '';
        if ($flag) {
            $html = $res;
        }
        return $html;
    }

    public function actionGetFullMessage($address)
    {
        $swalShowText = Yii::t('app', 'Dear user, your mail will be delivered to {address}.', [
            'address' => $address,
        ]);
        return $swalShowText;
    }

    public function actionNew($term = null)
    {
        if (Yii::$app->user->isGuest) {
            Yii::$app->session->setFlash('error', Yii::t('app', 'Please login'));
            return $this->redirect(['login']);
        }
        $user = Yii::$app->user;
        $token = $user->identity->bts_token;

        $flag = true;
        $error = '';
        $url  = $this->serverUrl;
        $userProfile = [];
        // $data = [
        //     'login' => $model->username,
        //     'password' => $model->password
        // ];
        $client = new Client([
            'transport' => 'yii\httpclient\CurlTransport'
        ]);
        try {
            $response = $client->createRequest()
                ->setMethod('GET')
                ->setFormat(Client::FORMAT_JSON)
                ->setHeaders([
                    'version' => '1',
                    'Authorization' => 'Bearer ' . $token
                ])
                ->setUrl($url)
                // ->setData($data)
                ->send();
        } catch (\Exception $e) {
            $flag = false;
            $error = $e->getMessage();
        }
        if ($flag) {
            $result = json_decode($response->content, true);
            if (is_array($result) and isset($result['code']) and $result['code'] == 200) {
                $userProfile = $result['data'];
            } else {
                $flag = false;
                if (isset($result['messages']['message'])) {
                    $error = $result['messages']['message'];
                } else {
                    $error = $result['messages'];
                }
            }
        }
        if (!$flag) {
            Yii::$app->user->logout();
            Yii::$app->session->setFlash('error', $error);
            return $this->redirect(['login']);
        }

        $userName = $userProfile['name2'] . ' ' . $userProfile['name'] . ' ' . $userProfile['name1'];

        if ($term) {
            $str = barcodeToStr($term, false);
            $isReceiver = $str['is_receiver'];
            $id = $str['barcode'];
            $waybill = $this->actionGetWaybill($id);

            $model                             = new Waybill();

            $model->id                         = $waybill['id'];
            $model->barcode                    = $waybill['barcode'];
            // $model->isContract              = $waybill['id'];
            // $model->customerId              = $waybill['id'];
            $model->sendDate                   = $waybill['sendDate'];

            $model->postWidth                  = $waybill['post']['width'];
            $model->postLength                 = $waybill['post']['length'];
            $model->postDepth                  = $waybill['post']['depth'];
            $model->postPackageId              = $waybill['post']['packageId'];
            $model->postPackageName            = $waybill['post']['packageName'];
            $model->postPostTypeId             = $waybill['post']['postTypeId'];
            $model->postPostTypeName           = $waybill['post']['postTypeOther'];
            $model->postPostTypeOther          = $waybill['post']['postTypeName'];
            $model->postWeight                 = $waybill['post']['weight'];

            $model->receiverId                 = $waybill['receiver']['id'];
            $model->receiverName               = $waybill['receiver']['name'];
            $model->receiverPhone              = $waybill['receiver']['phone'];
            $model->receiverDelivery           = $waybill['receiver']['delivery'] ? 1 : 0;
            $model->receiverAvatar             = $waybill['receiver']['avatar'];
            $model->receiverAddressRegionId    = $waybill['receiver']['address']['region']['id'];
            $model->receiverAddressCityId      = $waybill['receiver']['address']['city']['id'];
            // $model->receiverAddressMfy      = $waybill['receiver']['address'][''];
            $model->receiverAddressStreet      = $waybill['receiver']['address']['street'];
            $model->receiverAddressHome        = $waybill['receiver']['address']['home'];
            $model->receiverAddressApartment   = $waybill['receiver']['address']['apartment'];
            $model->receiverAddressDestination = $waybill['receiver']['address']['destination'];
            $model->receiverBranchId           = $waybill['receiver']['branchId'];

            $model->senderId                   = $waybill['sender']['id'];
            $model->senderName                 = $waybill['sender']['name'];
            $model->senderPhone                = $waybill['sender']['phone'];
            $model->senderDelivery             = $waybill['sender']['delivery'] ? 1 : 0;
            $model->senderAvatar               = $waybill['sender']['avatar'];
            $model->senderAddressRegionId      = $waybill['sender']['address']['region']['id'];
            $model->senderAddressCityId        = $waybill['sender']['address']['city']['id'];
            $model->senderAddressStreet        = $waybill['sender']['address']['street'];
            $model->senderAddressHome          = $waybill['sender']['address']['home'];
            $model->senderAddressApartment     = $waybill['sender']['address']['apartment'];
            $model->senderAddressDestination   = $waybill['sender']['address']['destination'];
        } else {
            $model                           = new Waybill();
            $model->sendDate                 = date('d.m.Y');
            $model->senderId                 = $userProfile['id'];
            $model->senderName               = $userProfile['name'];
            $model->senderPhone              = $userProfile['phone'];
            $model->senderDelivery           = 1;
            $model->senderAddressRegionId    = $userProfile['regionId'];
            $model->senderAddressCityId      = $userProfile['cityId'];
            $model->senderAddressStreet      = $userProfile['street'];
            $model->senderAddressHome        = $userProfile['houseNumber'];
            $model->senderAddressApartment   = $userProfile['apartmentNumber'];
            $model->senderAddressDestination = $userProfile['landmark'];
            $model->receiverDelivery         = 1;
        }

        // $regions = ArrayHelper::map(BtsRegion::find()->orderBy('name1 ASC')->all(), 'id', 'name1');

        $region = BtsRegion::find();
        $lang = Yii::$app->language;
        if ($lang == 'uz-UZ') {
            $region->orderBy('nameUz ASC');
        } elseif ($lang == 'ru-RU') {
            $region->orderBy('nameRu ASC');
        } elseif ($lang == 'en-UZ') {
            $region->orderBy('nameEn ASC');
        }
        $region = $region->all();

        if ($lang == 'uz-UZ') {
            $regions = ArrayHelper::map($region, 'id', 'nameUz');
        } elseif ($lang == 'ru-RU') {
            $regions = ArrayHelper::map($region, 'id', 'nameRu');
        } elseif ($lang == 'en-UZ') {
            $regions = ArrayHelper::map($region, 'id', 'nameEn');
        }

        $senderCities = [];
        if ($model->senderAddressRegionId) {
            $cities = BtsCity::find()->where(['regionId' => $model->senderAddressRegionId]);
            if ($lang == 'uz-UZ') {
                $cities->orderBy('nameUz ASC');
            } elseif ($lang == 'ru-RU') {
                $cities->orderBy('nameRu ASC');
            } elseif ($lang == 'en-UZ') {
                $cities->orderBy('nameEn ASC');
            }
            $cities = $cities->all();

            if ($lang == 'uz-UZ') {
                $cities = ArrayHelper::map($cities, 'id', 'nameUz');
            } elseif ($lang == 'ru-RU') {
                $cities = ArrayHelper::map($cities, 'id', 'nameRu');
            } elseif ($lang == 'en-UZ') {
                $cities = ArrayHelper::map($cities, 'id', 'nameEn');
            }
            $senderCities = $cities;
            foreach ($senderCities as $key => $value) {
                if (is_null($value)) {
                    unset($senderCities[$key]);
                }
            }
        }

        $receiverCities = [];
        if ($model->receiverAddressRegionId) {
            $cities = BtsCity::find()->where(['regionId' => $model->receiverAddressRegionId]);
            if ($lang == 'uz-UZ') {
                $cities->orderBy('nameUz ASC');
            } elseif ($lang == 'ru-RU') {
                $cities->orderBy('nameRu ASC');
            } elseif ($lang == 'en-UZ') {
                $cities->orderBy('nameEn ASC');
            }
            $cities = $cities->all();

            if ($lang == 'uz-UZ') {
                $cities = ArrayHelper::map($cities, 'id', 'nameUz');
            } elseif ($lang == 'ru-RU') {
                $cities = ArrayHelper::map($cities, 'id', 'nameRu');
            } elseif ($lang == 'en-UZ') {
                $cities = ArrayHelper::map($cities, 'id', 'nameEn');
            }
            $receiverCities = $cities;
            foreach ($receiverCities as $key => $value) {
                if (is_null($value)) {
                    unset($receiverCities[$key]);
                }
            }
        }

        $receiverBranches = [];
        if ($model->receiverAddressRegionId and $model->receiverAddressCityId and $model->receiverDelivery == 0) {
            $receiverBranches = $this->actionGetReceiverBranch(
                $model->receiverAddressRegionId,
                $model->receiverAddressCityId,
                $model->receiverDelivery,
                $model->receiverBranchId,
                true
            );
        }

        $postTypes = $this->actionGetPostTypes();

        $url  = $this->serverUrl;
        $userApp = [];
        $client = new Client([
            'transport' => 'yii\httpclient\CurlTransport'
        ]);
        try {
            $response = $client->createRequest()
                ->setMethod('GET')
                ->setFormat(Client::FORMAT_JSON)
                ->setHeaders([
                    'version' => '1',
                    'Authorization' => 'Bearer ' . $token
                ])
                ->setUrl($url)
                ->send();
        } catch (\Exception $e) {}
        if ($flag) {
            $result = json_decode($response->content, true);
            if (is_array($result) and isset($result['code']) and $result['code'] == 200) {
                $userApp = $result['data'];
            }
        }

        return $this->render('new', [
            'user' => $user,
            'model' => $model,
            'regions' => $regions,
            'senderCities' => $senderCities,
            'receiverCities' => $receiverCities,
            'postTypes' => $postTypes,
            'userApp' => $userApp,
            'userName' => $userName,
            'receiverBranches' => $receiverBranches,
            'term' => $term,
        ]);
    }

    public function actionGetWaybill($id)
    {
        $user = Yii::$app->user;
        $token = $user->identity->bts_token;

        $flag = true;
        $error = '';
        $url  = $this->serverUrl;
        $resData = null;
        $client = new Client([
            'transport' => 'yii\httpclient\CurlTransport'
        ]);
        try {
            $response = $client->createRequest()
                ->setMethod('GET')
                ->setFormat(Client::FORMAT_JSON)
                ->setHeaders([
                    'version' => '1',
                    'Authorization' => 'Bearer ' . $token
                ])
                ->setUrl($url)
                ->send();
        } catch (\Exception $e) {
            $flag = false;
            $error = $e->getMessage();
        }
        if ($flag) {
            $result = json_decode($response->content, true);
            if (is_array($result) and isset($result['code']) and $result['code'] == 200) {
                $resData = $result['data'];
            } else {
                $flag = false;
                if (isset($result['messages']['message'])) {
                    $error = $result['messages']['message'];
                } else {
                    $error = $result['messages'];
                }
            }
        }

        if (!$flag) {
            Yii::$app->session->setFlash('error', $error);
            return $this->redirect(['new']);
        }

        return $resData;
    }

    public function actionGetCustomers()
    {
        if (Yii::$app->user->isGuest){
            return $this->redirect(['login']);
        }
        $user = Yii::$app->user;
        $token = $user->identity->bts_token;

        $flag = true;
        $error = '';
        $url  = $this->serverUrl;
        $resData = null;
        $client = new Client([
            'transport' => 'yii\httpclient\CurlTransport'
        ]);
        try {
            $response = $client->createRequest()
                ->setMethod('GET')
                ->setFormat(Client::FORMAT_JSON)
                ->setHeaders([
                    'version' => '1',
                    'Authorization' => 'Bearer ' . $token
                ])
                ->setUrl($url)
                ->send();
        } catch (\Exception $e) {
            $flag = false;
            $error = $e->getMessage();
        }
        if ($flag) {
            $result = json_decode($response->content, true);
            if (is_array($result) and isset($result['code']) and $result['code'] == 200) {
                $flag = true;
                $resData = $result['data'];
            } else {
                $flag = false;
                if (isset($result['messages']['message'])) {
                    $error = $result['messages']['message'];
                } else {
                    $error = $result['messages'];
                }
            }
        }
        if ($flag) {
            if (empty($resData)) {
                return 'no-contract';
            } else {
                $html = '';
                foreach ($resData as $key => $value) {
                    $html .= '<option value="' . $value['id'] . '" ' . ((!$value['state']) ? 'disabled' : '') . '>' . $value['name'] . ' (ИНН: ' . $value['tin'] . ') - Баланс: ' . $value['limit'] . '</option>';
                }
                return $html;
            }
        } else {
            return 'error';
        }
    }

    public function actionGetPostTypes()
    {
        if (Yii::$app->user->isGuest){
            return $this->redirect(['login']);
        }
        $user = Yii::$app->user;
        $token = $user->identity->bts_token;

        $lang = Yii::$app->language;
        $language = 'uz';
        $name = 'name';
        if ($lang == 'uz-UZ') {
            $language = 'uz';
            $name = 'name';
        } elseif ($lang == 'ru-RU') {
            $language = 'ru';
            $name = 'nameRu';
        } elseif ($lang == 'en-UZ') {
            $language = 'en';
            $name = 'nameEn';
        }

        $flag = true;
        $error = '';
        $url  = $this->serverUrl;
        $resData = [];
        $client = new Client([
            'transport' => 'yii\httpclient\CurlTransport'
        ]);
        try {
            $response = $client->createRequest()
                ->setMethod('GET')
                ->setFormat(Client::FORMAT_JSON)
                ->setHeaders([
                    'version' => '1',
                    'Authorization' => 'Bearer ' . $token,
                    'language' => $language,
                ])
                ->setUrl($url)
                ->send();
        } catch (\Exception $e) {
            $flag = false;
            $error = $e->getMessage();
        }
        if ($flag) {
            $result = json_decode($response->content, true);
            if (is_array($result) and isset($result['code']) and $result['code'] == 200) {
                $resData = $result['data'];
                $resData = ArrayHelper::map($resData, 'id', $name);
            } else {
                $flag = false;
                if (isset($result['messages']['message'])) {
                    $error = $result['messages']['message'];
                } else {
                    $error = $result['messages'];
                }
            }
        }

        return $resData;
    }

    public function actionGetIndividuals($query = null, $phone = null)
    {
        if (Yii::$app->user->isGuest){
            return $this->redirect(['login']);
        }
        $user = Yii::$app->user;
        $token = $user->identity->bts_token;

        $flag = true;
        $error = '';
        if ($phone) {
            $url  = $this->serverUrl;
        } elseif ($query) {
            $url  = $this->serverUrl;
        }else {
            $url  = $this->serverUrl;
        }
        $resData = [];
        $client = new Client([
            'transport' => 'yii\httpclient\CurlTransport'
        ]);
        try {
            $response = $client->createRequest()
                ->setMethod('GET')
                ->setFormat(Client::FORMAT_JSON)
                ->setHeaders([
                    'version' => '1',
                    'Authorization' => 'Bearer ' . $token
                ])
                ->setUrl($url)
                ->send();
        } catch (\Exception $e) {
            $flag = false;
            $error = $e->getMessage();
        }
        if ($flag) {
            $result = json_decode($response->content, true);
            if (is_array($result) and isset($result['code']) and $result['code'] == 200) {
                $resData = (isset($result['data']['individualHelp'])) ? $result['data']['individualHelp'] : [];
            } else {
                $flag = false;
                if (isset($result['messages']['message'])) {
                    $error = $result['messages']['message'];
                } else {
                    $error = $result['messages'];
                }
            }
        }

        // $regions = ArrayHelper::map(BtsRegion::find()->orderBy('name1 ASC')->all(), 'id', 'name1');

        $region = BtsRegion::find();
        $lang = Yii::$app->language;
        if ($lang == 'uz-UZ') {
            $region->orderBy('nameUz ASC');
        } elseif ($lang == 'ru-RU') {
            $region->orderBy('nameRu ASC');
        } elseif ($lang == 'en-UZ') {
            $region->orderBy('nameEn ASC');
        }
        $region = $region->all();

        if ($lang == 'uz-UZ') {
            $regions = ArrayHelper::map($region, 'id', 'nameUz');
        } elseif ($lang == 'ru-RU') {
            $regions = ArrayHelper::map($region, 'id', 'nameRu');
        } elseif ($lang == 'en-UZ') {
            $regions = ArrayHelper::map($region, 'id', 'nameEn');
        }

        // $cities = ArrayHelper::map(BtsCity::find()->orderBy('name1 ASC')->all(), 'id', 'name1');

        $cities = BtsCity::find();
        if ($lang == 'uz-UZ') {
            $cities->orderBy('nameUz ASC');
        } elseif ($lang == 'ru-RU') {
            $cities->orderBy('nameRu ASC');
        } elseif ($lang == 'en-UZ') {
            $cities->orderBy('nameEn ASC');
        }
        $cities = $cities->all();

        if ($lang == 'uz-UZ') {
            $cities = ArrayHelper::map($cities, 'id', 'nameUz');
        } elseif ($lang == 'ru-RU') {
            $cities = ArrayHelper::map($cities, 'id', 'nameRu');
        } elseif ($lang == 'en-UZ') {
            $cities = ArrayHelper::map($cities, 'id', 'nameEn');
        }


        return $this->renderPartial('get-individuals', [
            'resData' => $resData,
            'regions' => $regions,
            'cities' => $cities,
        ]);
    }

    public function actionDataToJson()
    {
        $post = Yii::$app->request->post();
        if (isset($post['data'])) {
            $data = $post['data'];
            $data = json_decode(base64_decode($data), true);
            return json_encode($data);
        }
        return 'no-data';
    }

    public function actionSubmitWaybill($paymentId = null, $flagCustomer = null)
    {
        if (Yii::$app->user->isGuest){
            return $this->redirect(['login']);
        }
        $user = Yii::$app->user;
        $token = $user->identity->bts_token;

        $model = new Waybill();
        $model->load(Yii::$app->request->post());
        if ($model->receiverDelivery == 0) {
            $model->receiverAddressStreet = $model->receiverBranchAddress;
            $model->receiverAddressHome = '-';
        }
        $validate = ActiveForm::validate($model);
        $array = [];
        $customerId = null;
        if (empty($validate)) {
            if ($model->customerId) {
                $customerId = $model->customerId;
            }
            $array['sendDate'] = $model->sendDate;
            $array['id'] = $model->id;
            $array['barcode'] = $model->barcode;
            $array['isContract'] = ($model->isContract) ? true : false;
            $array['customerId'] = $model->customerId;

            $array['post']['width'] = $model->postWidth;
            $array['post']['length'] = $model->postLength;
            $array['post']['depth'] = $model->postDepth;
            $array['post']['postTypeId'] = $model->postPostTypeId;
            $array['post']['postTypeName'] = $model->postPostTypeName;
            $array['post']['postTypeOther'] = $model->postPostTypeOther;
            $array['post']['weight'] = $model->postWeight;

            $array['receiver']['receiverId'] = $model->receiverId;
            $array['receiver']['name'] = $model->receiverName;
            $array['receiver']['phone'] = '+' . str_replace(')', '', str_replace('(', '', str_replace(' ', '', str_replace('-', '', str_replace('+', '', $model->receiverPhone)))));
            $array['receiver']['delivery'] = ($model->receiverDelivery) ? true : false;
            $array['receiver']['address']['region']['id'] = $model->receiverAddressRegionId;
            $array['receiver']['address']['city']['id'] = $model->receiverAddressCityId;
            $array['receiver']['address']['mahalla'] = $model->receiverAddressMfy;
            $array['receiver']['address']['street'] = $model->receiverAddressStreet;
            $array['receiver']['address']['home'] = $model->receiverAddressHome;
            $array['receiver']['address']['apartment'] = $model->receiverAddressApartment;
            $array['receiver']['address']['destination'] = $model->receiverAddressDestination;
            $array['receiver']['branchId'] = $model->receiverBranchId;

            $array['sender']['senderId'] = $model->senderId;
            $array['sender']['name'] = $model->senderName;
            $array['sender']['phone'] = '+' . str_replace(')', '', str_replace('(', '', str_replace(' ', '', str_replace('-', '', str_replace('+', '', $model->senderPhone)))));
            $array['sender']['delivery'] = ($model->senderDelivery) ? true : false;
            $array['sender']['address']['region']['id'] = $model->senderAddressRegionId;
            $array['sender']['address']['city']['id'] = $model->senderAddressCityId;
            $array['sender']['address']['street'] = $model->senderAddressStreet;
            $array['sender']['address']['home'] = $model->senderAddressHome;
            $array['sender']['address']['apartment'] = $model->senderAddressApartment;
            $array['sender']['address']['destination'] = $model->senderAddressDestination;
            $array['sender']['is_api'] = 3;

            if ($paymentId or $flagCustomer) {
                $flag = true;
                $resHtml = '';
                $error = '';
                if ($flagCustomer) {
                    $url  = $this->serverUrl;
                } else {
                    $url  = $this->serverUrl;
                }
                $resData = [];
                $client = new Client([
                    'transport' => 'yii\httpclient\CurlTransport'
                ]);
                try {
                    $response = $client->createRequest()
                        ->setMethod('POST')
                        ->setFormat(Client::FORMAT_JSON)
                        ->setHeaders([
                            'version' => '1',
                            'Authorization' => 'Bearer ' . $token
                        ])
                        ->setUrl($url)
                        ->setData($array)
                        ->send();
                } catch (\Exception $e) {
                    $flag = false;
                    $error = $e->getMessage();
                }
                if ($flag) {
                    $result = json_decode($response->content, true);
                    if (is_array($result) and isset($result['code']) and $result['code'] == 200) {
                        $resData = $result['data'];
                        if ($flagCustomer) {
                            return '';
                        } else {
                            if ($resData['url']) {
                                return $resData['url'];
                            } else {
                                return '';
                            }
                        }
                    } else {
                        $flag = false;
                        if (isset($result['messages']['message'])) {
                            $error = $result['messages']['message'];
                        } else {
                            $error = $result['messages'];
                        }
                    }
                }
            } else {
                $flag = true;
                $resHtml = '';
                $error = '';
                if ($customerId) {
                    $url  = $this->serverUrl;
                } else {
                    $url  = $this->serverUrl;
                }
                $resData = [];
                $client = new Client([
                    'transport' => 'yii\httpclient\CurlTransport'
                ]);
                try {
                    $response = $client->createRequest()
                        ->setMethod('POST')
                        ->setFormat(Client::FORMAT_JSON)
                        ->setHeaders([
                            'version' => '1',
                            'Authorization' => 'Bearer ' . $token
                        ])
                        ->setUrl($url)
                        ->setData($array)
                        ->send();
                } catch (\Exception $e) {
                    $flag = false;
                    $error = $e->getMessage();
                }
                if ($flag) {
                    $result = json_decode($response->content, true);
                    if (is_array($result) and isset($result['code']) and $result['code'] == 200) {
                        $resData = $result['data'];
                        $resHtml = $this->renderPartial('get-payments', [
                            'array' => $resData,
                            'customerId' => $customerId
                        ]);
                        return $resHtml;
                    } else {
                        $flag = false;
                        if (isset($result['messages']['message'])) {
                            $error = $result['messages']['message'];
                        } else {
                            $error = $result['messages'];
                        }
                    }
                }
            }

            return $error;
        } else {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return $validate;
        }
    }

    public function actionView($term)
    {
        if (Yii::$app->user->isGuest){
            return $this->redirect(['login']);
        }
        $str = barcodeToStr($term, false);
        $isReceiver = $str['is_receiver'];
        $term = $str['barcode'];

        $user = Yii::$app->user;
        $token = $user->identity->bts_token;

        $flag = true;
        $error = '';
        $url  = $this->serverUrl;
        $resData = null;
        $client = new Client([
            'transport' => 'yii\httpclient\CurlTransport'
        ]);
        try {
            $response = $client->createRequest()
                ->setMethod('GET')
                ->setFormat(Client::FORMAT_JSON)
                ->setHeaders([
                    'version' => '1',
                    'Authorization' => 'Bearer ' . $token
                ])
                ->setUrl($url)
                ->send();
        } catch (\Exception $e) {
            $flag = false;
            $error = $e->getMessage();
        }
        if ($flag) {
            $result = json_decode($response->content, true);
            if (is_array($result) and isset($result['code']) and $result['code'] == 200) {
                $resData = $result['data'];
            } else {
                $flag = false;
                if (isset($result['messages']['message'])) {
                    $error = $result['messages']['message'];
                } else {
                    $error = $result['messages'];
                }
            }
        }

        if (!$flag) {
            Yii::$app->session->setFlash('error', $error);
            return $this->redirect(['new']);
        }



        $flag = true;
        $error = '';
        $url  = $this->serverUrl;
        $branches = null;
        $client = new Client([
            'transport' => 'yii\httpclient\CurlTransport'
        ]);
        try {
            $response = $client->createRequest()
                ->setMethod('GET')
                ->setFormat(Client::FORMAT_JSON)
                ->setHeaders([
                    'version' => '1',
                    'Authorization' => 'Bearer ' . $token
                ])
                ->setUrl($url)
                ->send();
        } catch (\Exception $e) {
            $flag = false;
            $error = $e->getMessage();
        }
        if ($flag) {
            $result = json_decode($response->content, true);
            if (is_array($result) and isset($result['code']) and $result['code'] == 200) {
                $branches = $result['data'];
            } else {
                $flag = false;
                if (isset($result['messages']['message'])) {
                    $error = $result['messages']['message'];
                } else {
                    $error = $result['messages'];
                }
            }
        }

        if (!$flag) {
            Yii::$app->session->setFlash('error', $error);
            return $this->redirect(['new']);
        }

        $branchesId = [];
        foreach ($branches as $key => $value) {
            $branchesId[$value['id']] = $value['name'] . ' - ' . $value['nickname'];
        }

        // $regions = ArrayHelper::map(BtsRegion::find()->orderBy('name1 ASC')->all(), 'id', 'name1');

        $region = BtsRegion::find();
        $lang = Yii::$app->language;
        if ($lang == 'uz-UZ') {
            $region->orderBy('nameUz ASC');
        } elseif ($lang == 'ru-RU') {
            $region->orderBy('nameRu ASC');
        } elseif ($lang == 'en-UZ') {
            $region->orderBy('nameEn ASC');
        }
        $region = $region->all();

        if ($lang == 'uz-UZ') {
            $regions = ArrayHelper::map($region, 'id', 'nameUz');
        } elseif ($lang == 'ru-RU') {
            $regions = ArrayHelper::map($region, 'id', 'nameRu');
        } elseif ($lang == 'en-UZ') {
            $regions = ArrayHelper::map($region, 'id', 'nameEn');
        }

        // $cities = ArrayHelper::map(BtsCity::find()->orderBy('name1 ASC')->all(), 'id', 'name1');

        $cities = BtsCity::find();
        if ($lang == 'uz-UZ') {
            $cities->orderBy('nameUz ASC');
        } elseif ($lang == 'ru-RU') {
            $cities->orderBy('nameRu ASC');
        } elseif ($lang == 'en-UZ') {
            $cities->orderBy('nameEn ASC');
        }
        $cities = $cities->all();

        if ($lang == 'uz-UZ') {
            $cities = ArrayHelper::map($cities, 'id', 'nameUz');
        } elseif ($lang == 'ru-RU') {
            $cities = ArrayHelper::map($cities, 'id', 'nameRu');
        } elseif ($lang == 'en-UZ') {
            $cities = ArrayHelper::map($cities, 'id', 'nameEn');
        }

        return $this->render('view', [
            'resData' => $resData,
            'branchesId' => $branchesId,
            'regions' => $regions,
            'cities' => $cities,
        ]);
    }

    public function actionDelete($id)
    {
        if (Yii::$app->user->isGuest){
            return $this->redirect(['login']);
        }
        $user = Yii::$app->user;
        $token = $user->identity->bts_token;

        $flag = true;
        $error = '';
        $url  = $this->serverUrl;
        $client = new Client([
            'transport' => 'yii\httpclient\CurlTransport'
        ]);
        try {
            $response = $client->createRequest()
                ->setMethod('GET')
                ->setFormat(Client::FORMAT_JSON)
                ->setHeaders([
                    'version' => '1',
                    'Authorization' => 'Bearer ' . $token
                ])
                ->setUrl($url)
                ->send();
        } catch (\Exception $e) {
            $flag = false;
            $error = $e->getMessage();
            Yii::$app->session->setFlash('error', $error);
        }
        if ($flag) {
            $result = json_decode($response->content, true);
            if (is_array($result) and isset($result['code']) and $result['code'] == 200) {
                $message = $result['data']['message'];
                Yii::$app->session->setFlash('success', $message);
            } else {
                $flag = false;
                if (isset($result['messages']['message'])) {
                    Yii::$app->session->setFlash('error', $result['messages']['message']);
                } else {
                    Yii::$app->session->setFlash('error', $result['messages']);
                }
            }
        } else {
            Yii::$app->session->setFlash('error', $error);
        }

        return '';
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            }

            Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /**
     * Resend verification email
     *
     * @return mixed
     */
    public function actionResendVerificationEmail()
    {
        $model = new ResendVerificationEmailForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            }
            Yii::$app->session->setFlash('error', 'Sorry, we are unable to resend verification email for the provided email address.');
        }

        return $this->render('resendVerificationEmail', [
            'model' => $model
        ]);
    }

    public function actionProfileLogin($isDelete = null)
    {
        if (!Yii::$app->user->isGuest) {
            Yii::$app->user->logout();
        }

        if ($isDelete == 'yes') {
            Yii::$app->session->setFlash('error', Yii::t('app', 'account_deleted'));
            return $this->redirect(['/site/profile-login']);
        }

        $this->layout = 'apple-login';
        $model = new Login();
        if ($model->load(Yii::$app->request->post())) {
            $userId = $model->userSave();
            $flag = true;
            $error = '';
            $url  = $this->serverUrl;
            $data = [
                'phone' => $model->phone
            ];
            $client = new Client([
                'transport' => 'yii\httpclient\CurlTransport'
            ]);
            try {
                $response = $client->createRequest()
                    ->setMethod('POST')
                    ->setFormat(Client::FORMAT_JSON)
                    ->setHeaders(['version' => '1'])
                    ->setUrl($url)
                    ->setData($data)
                    ->send();
            } catch (\Exception $e) {
                $flag = false;
                $error = $e->getMessage();
                Yii::$app->session->setFlash('error', $error);
            }
            if ($flag) {
                $result = json_decode($response->content, true);
                if (is_array($result) and isset($result['code']) and $result['code'] == 200) {
                    return $this->redirect(['/site/profile-check-sms', 'id' => $userId]);
                } else {
                    $flag = false;
                    if (isset($result['messages']['message'])) {
                        Yii::$app->session->setFlash('error', $result['messages']['message']);
                    } else {
                        Yii::$app->session->setFlash('error', $result['messages']);
                    }
                }
            } else {
                Yii::$app->session->setFlash('error', $error);
            }
        }

        return $this->render('apple-login', [
            'model' => $model,
        ]);
    }

    public function actionProfileCheckSms($id)
    {
        $this->layout = 'apple-login';
        $model = new VerifyForm();
        $user = User::findOne(['id' => $id]);
        if (!$user) {
            Yii::$app->session->setFlash('error', 'Foydalanuvchi topilmadi!!!');
            return $this->redirect(['/site/profile-login']);
        }
        if ($model->load(Yii::$app->request->post())) {
            $flag = true;
            $error = '';
            $url  = $this->serverUrl;
            $data = [
                'phone' => $user->phone,
                'code'  => $model->number
            ];
            $client = new Client([
                'transport' => 'yii\httpclient\CurlTransport'
            ]);
            try {
                $response = $client->createRequest()
                    ->setMethod('POST')
                    ->setFormat(Client::FORMAT_JSON)
                    ->setHeaders(['version' => '1'])
                    ->setUrl($url)
                    ->setData($data)
                    ->send();
            } catch (\Exception $e) {
                $flag = false;
                $error = $e->getMessage();
                Yii::$app->session->setFlash('error', $error);
            }
            if ($flag) {
                $result = json_decode($response->content, true);
                if (is_array($result) and isset($result['code']) and $result['code'] == 200) {
                    $user->status = User::STATUS_ACTIVE;
                    $user->bts_token = $result['data']['token'];
                    $user->save(false);
                    Yii::$app->user->login($user, 3600 * 24 * 30);
                    return $this->redirect(['/site/profile-delete']);
                } else {
                    $flag = false;
                    if (isset($result['messages']['message'])) {
                        Yii::$app->session->setFlash('error', $result['messages']['message']);
                    } else {
                        Yii::$app->session->setFlash('error', $result['messages']);
                    }
                }
            } else {
                Yii::$app->session->setFlash('error', $error);
            }
        }
        return $this->render('verify', [
            'model' => $model,
        ]);
    }

    public function actionProfileDelete()
    {
        $this->layout = 'apple-login';
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['/site/profile-login']);
        }
        $user = Yii::$app->user->identity;

        return $this->render('apple-delete', [
            'user' => $user,
        ]);
    }

    public function actionDeleteConfirm()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['/site/profile-login']);
        }

        $user = Yii::$app->user;
        $token = $user->identity->bts_token;

        $flag = true;
        $error = '';
        $url  = $this->serverUrl;
        $userProfile = [];
        // $data = [
        //     'login' => $model->username,
        //     'password' => $model->password
        // ];
        $client = new Client([
            'transport' => 'yii\httpclient\CurlTransport'
        ]);
        try {
            $response = $client->createRequest()
                ->setMethod('GET')
                ->setFormat(Client::FORMAT_JSON)
                ->setHeaders([
                    'version' => '1',
                    'Authorization' => 'Bearer ' . $token
                ])
                ->setUrl($url)
                // ->setData($data)
                ->send();
        } catch (\Exception $e) {
            $flag = false;
            $error = $e->getMessage();
        }
        if ($flag) {
            $result = json_decode($response->content, true);
            if (is_array($result) and isset($result['code']) and $result['code'] == 200) {
                $flag = true;
            } else {
                $flag = false;
                if (isset($result['messages']['message'])) {
                    $error = $result['messages']['message'];
                } else {
                    $error = $result['messages'];
                }
            }
        }
        if ($flag) {
            Yii::$app->user->logout();
            Yii::$app->session->setFlash('error', Yii::t('app', 'account_deleted'));
            return $this->redirect(['/site/delete-finish']);
        } else {
            Yii::$app->user->logout();
            Yii::$app->session->setFlash('error', $error);
            return $this->redirect(['/site/delete-finish']);
        }
    }

    public function actionDeleteFinish()
    {
        $this->layout = 'apple-login';
        return $this->render('delete-finish');
    }
}
