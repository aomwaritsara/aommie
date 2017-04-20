<?php

namespace app\controllers;

use Yii;
use app\models\Staff;
use app\models\StaffSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Session;
/**
 * StaffController implements the CRUD actions for Staff model.
 */
class StaffController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Staff models.
     * @return mixed
     */
    public function actionIndex()
    {

        $searchModel = new StaffSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

$session = new Session;
        $session->open();
          if ($session['type'] == '0') {
           $this->layout = 'templateAdmin';
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Staff model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        $session = new Session;
        $session->open();
          if ($session['type'] == '0') {
           $this->layout = 'templateAdmin';
        }
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Staff model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $session = new Session;
        $session->open();
          if ($session['type'] == '0') {
           $this->layout = 'templateAdmin';
        }
        $model = new Staff();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->PasswordString = $model->Password;
            $model->Password = md5($model->Password);
            $model->save();
            return $this->redirect(['view', 'id' => $model->Staff_Id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Staff model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $session = new Session;
        $session->open();
          if ($session['type'] == '0') {
           $this->layout = 'templateAdmin';
        }
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->Staff_Id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Staff model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
             $session = new Session;
        $session->open();
          if ($session['type'] == '0') {
           $this->layout = 'templateAdmin';
        }
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    public function actionCencel($id)
    {
         $session = new Session;
        $session->open();

        if ($session['type'] == '0') {
           $this->layout = 'templateAdmin';
        }

        $Staff = $this->findModel($id);
       
        
        if($Staff->Status == '1')//สถานะที่ส่งมาจากroomถ้าถูกจองห้อง
        {
            $Staff->Status = '0';//เซตให้เป็น 1 เพื่อจะส่งไปRoom
            $Staff->save();
            
        }  //return $this->redirect(['index']);
         
        elseif ($Staff->Status == '0')//สถานะที่ส่งมาจากroomถ้าถูกจองห้อง
        {
            $Staff->Status = '1';//เซตให้เป็น 1 เพื่อจะส่งไปRoom
            $Staff->save();
            
        }  return $this->redirect(['index']);
    //    
    }

    /**
     * Finds the Staff model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Staff the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
         $session = new Session;
        $session->open();
          if ($session['type'] == '0') {
           $this->layout = 'templateAdmin';
        }

        if (($model = Staff::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
