<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Child;
use app\models\Person;
use yii\web\UploadedFile;

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
        $person = Person::find()->all();
        return $this->render('home',['person'=> $person]);
    }

    public function actionCreate(){
        $person = new Person();
        $formData = yii::$app->request->post();
        if($person->load($formData)){
            $person->image = UploadedFile::getInstance($person,'image');
            $image_name = $person->firstname.rand(1,4000).'.'.$person->image->extension;
            $image_path = 'uploads/person/'.$image_name;
            $person->image->saveAs($image_path);
            $person->image = $image_path;
            if($person->save()){
                Yii::$app->getSession()->setFlash('message','Record Created Successfully.'); 
                return $this->redirect(['index', 'id'=> $person->id]);
            }else{
                Yii::$app->getSession()->setFlash('message','Failed to Post.'); 
            }
        }
        return $this->render('create',['person' => $person]);
    }

    public function actionView($id){
     //   echo $id;
        $person = Person::findOne($id);
        return $this->render('view',['person'=> $person]);
    }

    public function actionUpdate($id){
        $person = Person::findOne($id);
        if($person->load(yii::$app->request->post())){
            $person->image = UploadedFile::getInstance($person,'image');
            $image_name = $person->firstname.rand(1,4000).'.'.$person->image->extension;
            $image_path = 'uploads/person/'.$image_name;
            $person->image->saveAs($image_path);
            $person->image = $image_path;
            $person->save();
            Yii::$app->getSession()->setFlash('message','Record Updated Successfully.'); 
            return $this->redirect(['index']);
        }else{
            return $this->render('update',['person'=> $person]);
        }
    }

    public function actionDelete($id){
        $person = Person::findOne($id)->delete();
        if($person){
            Yii::$app->getSession()->setFlash('message','Record Deleted Successfully.'); 
            return $this->redirect(['index']);     
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
     * Displays contact page.
     *
     * @return Response|string
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
}
