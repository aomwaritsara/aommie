<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\web\Session;
use app\models\Staff;
use app\models\FormPassword;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
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
     * @inheritdoc
     */
    public function actions()
    {
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

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    // {
    //     $session = new Session;
    //     $session->open();
    //    // $this->layout = 'login-layout';

    //     if ($session['type'] == '0') {
    //        $this->layout = 'templateAdmin';
    //     }

    //     if ($session['type'] == '1') {
    //        $this->layout = 'template';
    //     }

    //     return $this->render('index');
    // }
    {
        $this->layout = 'login-layout';

        $session = new Session;
        $session->open();

        if (isset($session['member_name'])) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            $session['member_name'] = $model->getName();
            $session['staff_id'] = $model->getId();
            $session['type'] = $model->getType();
            
            if ($session['type'] == '1') {
                  return $this->redirect(['show-room/index']);
       
            }
            else if ($session['type'] == '0') {
                return $this->redirect(['apartment/index']);
            }
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        $this->layout = 'login-layout';

        $session = new Session;
        $session->open();

        if (isset($session['member_name'])) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            $session['member_name'] = $model->getName();
            $session['staff_id'] = $model->getId();
            $session['type'] = $model->getType();
            
            if ($session['type'] == '1') {
                  return $this->redirect(['show-room/index']);
       
            }
            else if ($session['type'] == '0') {
                return $this->redirect(['apartment/index']);
            }
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionGologout()
    {
        //$this->layout = 'site_main';
        $this->layout = 'login-layout';
        $session = new Session;
        $session->open();

         unset($session['member_name']);
         unset($session['staff_id']);
         unset($session['type']);

       // $session->close();

        $model = new LoginForm();

         //$this->layout = 'main';
         return $this->redirect(['site/login']);
       
       // $this ->layout ='main';
       //  return $this ->render('login');

    }

    public function actionProfile()
    {
        $session = new Session;
        $session->open();
        if ($session['type'] == '0') {
           $this->layout = 'templateAdmin';
        }

        $model = Staff::findone($session['staff_id']);

        return $this->render('profile', ['model' => $model]);

    }

    public function actionPassword()
    {
        $session = new Session;
        $session->open();
        if ($session['type'] == '0') {
           $this->layout = 'templateAdmin';
        }

        $model = Staff::findone($session['staff_id']);
        $current = new FormPassword();

        $currentPassword = $model->Password;

        if (Yii::$app->request->isPost) {
            
            $model->load(Yii::$app->request->post());
            $current->load(Yii::$app->request->post());
            if(md5($current->password) == $currentPassword)
            {
                $model->Password = md5($model->Password);
                
                $model->save();
                return $this->redirect(['booking/index']);
            }
        }

        return $this->render('password', ['model' => $model, 'current' => $current]);

    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionTemplate()
    {
        $this ->layout ='template';
        return $this ->render('template');
    }
}