<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use \app\modules\user\models\search\UserSearch;
use app\modules\user\models\User;

class SiteController extends Controller {

    public function actionSaluda($get = "Tutorial Yii") {
        $mensaje = "Hola Mundo";
        $numeros = [1, 2, 3, 4, 5, 6];
        return $this->render("saluda", [
                    "saluda" => $mensaje,
                    "numero" => $numeros,
                    "get" => $get,
        ]);
    }

    public function behaviors() {
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

    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex() {
        return $this->render('index');
    }

    public function actionLogin() {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
                    'model' => $model,
        ]);
    }

    public function actionLogout() {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact() {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
                    'model' => $model,
        ]);
    }

    public function actionAbout() {
        return $this->render('about');
    }

    public function actionCaptura() {
        
         $patr = Yii::$app->getRequest()->getQueryParam('pat');

        if ($patr) {
              $patrocinador = User::find()->where(["username" => $patr]);
              
              if ($patrocinador->one())
              $datos=['patr'=> $patrocinador->one()->getDisplayName()];
            else {
               $datos=['patr'=>''];
            }
            
        }else {
               $datos=['patr'=>''];
            }
            

        return $this->render('captura',$datos);
    }

}
