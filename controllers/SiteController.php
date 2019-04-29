<?php

namespace app\controllers;

use app\models\Subscribe;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Product;
use app\models\Category;
use yii\helpers\Html;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
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
     * {@inheritdoc}
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
    {
        $products = new Product();
        $cats = new Category();
        $products = $products->getEightPrd();
        $cats = $cats->getCategories();

        return $this->render('index', compact('products', 'cats'));
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {

        $model = new ContactForm();
        //если ajax
        if (Yii::$app->request->isAjax) {

            if ($model->load(Yii::$app->request->post()) && $model->contact()) {
                Yii::$app->session->setFlash('contactFormSubmitted');
                return "Ваше обращение успешно отправленно!";

            }
            $result = [];
            foreach ($model->getErrors() as $attr => $errors){
                $result[Html::getInputId($model, $attr)] = $errors;
            }
            return $this->asJson(['validation' => $result]);



            //если вдруг не ajax
        } else{
            if ($model->load(Yii::$app->request->post()) && $model->contact()) {
                Yii::$app->session->setFlash('contactFormSubmitted');

                return "Ваше обращение успешно отправленно!";

                //return $this->refresh();
            }
            return $this->render('contact', compact('model', 'cats'));
        }


    }


    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
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

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionCategory()
    {
        return $this->render('category');
    }

    public function actionSubscribe($email)
    {
        $sub = new Subscribe();
        $sub->newSubscribe($email);
    }

    public function actionSubscribeCheck()
    {

    }
}
