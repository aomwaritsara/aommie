<?php

namespace app\controllers;

use Yii;
use app\models\Apartment;
use app\models\ApartmentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Session;
/**
 * ApartmentController implements the CRUD actions for Apartment model.
 */
class ApartmentController extends Controller
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
     * Lists all Apartment models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ApartmentSearch();
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
     * Displays a single Apartment model.
     * @param integer $id
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
     * Creates a new Apartment model.
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
        $model = new Apartment();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->Apart_Id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Apartment model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
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
            return $this->redirect(['view', 'id' => $model->Apart_Id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Apartment model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
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

        $Apartment = $this->findModel($id);
       
        
        if($Apartment->Status == '1')//สถานะที่ส่งมาจากroomถ้าถูกจองห้อง
        {
            $Apartment->Status = '0';//เซตให้เป็น 1 เพื่อจะส่งไปRoom
            $Apartment->save();
            
        }  //return $this->redirect(['index']);
         
        elseif ($Apartment->Status == '0')//สถานะที่ส่งมาจากroomถ้าถูกจองห้อง
        {
            $Apartment->Status = '1';//เซตให้เป็น 1 เพื่อจะส่งไปRoom
            $Apartment->save();
            
        }  return $this->redirect(['index']);
    //    
    }

    /**
     * Finds the Booking model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $Apart_Id
     * @param string $Room_Id
     * @param string $Cus_Id
     * @return Booking the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */

    /**
     * Finds the Apartment model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Apartment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        $session = new Session;
        $session->open();

        if ($session['type'] == '0') {
           $this->layout = 'templateAdmin';
        }
        if (($model = Apartment::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
