<?php

namespace app\controllers;

use Yii;
use app\models\Room;
use app\models\Booking;
use app\models\Deposit;
use app\models\BookingSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\base\Model;
use yii\db\Query;
use yii\helpers\ArrayHelper;
use yii\web\Session;
use app\models\Apartment;
use kartik\datetime\DateTimePicker;
/**
 * BookingController implements the CRUD actions for Booking model.
 */
class BookingController extends Controller
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
     * Lists all Booking models.
     * @return mixed
     */
    public function actionIndex()
    {

        $searchModel = new BookingSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Booking model.
     * @param integer $Apart_Id
     * @param string $Room_Id
     * @param string $Cus_Id
     * @return mixed
     */
    public function actionView($Apart_Id, $Room_Id, $Cus_Id)
    {
        return $this->render('view', [
            'model' => $this->findModel($Apart_Id, $Room_Id, $Cus_Id),
        ]);
    }

    /**
     * Creates a new Booking model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
     public function actionCreate()
    {
        $session = new Session;
        $session->open();

        $model = new Booking();
        $model2 = new Room();
        $model3 = new Deposit();

        $apartment = Apartment::find()->where(['Staff_Id' => $session['staff_id']])->one();

   
    // $getApart = Apartment::findOne($model2->Apart_Id);
        if ($model->load(Yii::$app->request->post())  ){
            $model->Apart_Id = $apartment->Apart_Id;
              $model->Datestatus =date('Y-m-d h:i:s');
              $model->Status = '3';
              $model->save();
             $model2 = Room::find()->where(['Apart_Id' => $model->Apart_Id,'Room_Id' => $model->Room_Id])->one();
             
            // $getApart = Apartment::findOne($model2->Apart_Id);//เอาApartid ส่งไป_form
              
             $model2->Status = $model->Status;
             $model2->save();
            
             $model3->Apart_Id = $model->Apart_Id;
             $model3->Room_Id = $model->Room_Id;
             $model3->Cus_Id = $model->Cus_Id;
             $model3->Date = $model->Booking_Date;
             $model3->Price = $model->Deposit;
             $model3->Status = '1';
            
            $model3->save();
            return $this->redirect(['view', 'Apart_Id' => $model->Apart_Id, 'Room_Id' => $model->Room_Id, 'Cus_Id' => $model->Cus_Id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'apartment' => $apartment,
                 
                
            ]);
        }
    }

    /**
     * Updates an existing Booking model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $Apart_Id
     * @param string $Room_Id
     * @param string $Cus_Id
     * @return mixed
     */
    public function actionUpdate($Apart_Id, $Room_Id, $Cus_Id)
    {
        $session = new Session;
        $session->open();

  $apartment = Apartment::find()->where(['Staff_Id' => $session['staff_id']])->one();

  
        $model = $this->findModel($Apart_Id, $Room_Id, $Cus_Id);
        $model3= $this->findModel3($model->Apart_Id,$model->Room_Id,$model->Cus_Id);


       if ($model->load(Yii::$app->request->post())  ){
          $model->Apart_Id = $apartment->Apart_Id;
          $model->Datestatus =date('Y-m-d h:i:s');
              $model->save();
        $model3 = Deposit::find()->where(['Room_Id' => $model->Room_Id])->one();
        $model3->Price = $model->Deposit;
          $model3->save();
        

            return $this->redirect(['view', 'Apart_Id' => $model->Apart_Id, 'Room_Id' => $model->Room_Id, 'Cus_Id' => $model->Cus_Id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'model3' => $model3,
                'apartment' => $apartment,

            ]);
        }
    }
           
     
    protected function findModel2($Apart_Id,$Room_Id)
{
    if (($model = Room::findOne($Apart_Id,$Room_Id)) !== null) {
        return $model;
    } else {
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
protected function findModel3($Apart_Id,$Room_Id)
{
    if (($model = Deposit::findOne(['Apart_Id' => $Apart_Id, 'Room_Id' => $Room_Id])) !== null)
    {
        return $model;
    } else {
        throw new NotFoundHttpException('The requested page does not exist.');
    }
} 


    /**
     * Deletes an existing Booking model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $Apart_Id
     * @param string $Room_Id
     * @param string $Cus_Id
     * @return mixed
     */
    public function actionDelete($Apart_Id, $Room_Id, $Cus_Id)
    {
        $this->findModel($Apart_Id, $Room_Id, $Cus_Id)->delete();

        return $this->redirect(['index']);
    }

    public function actionChangeb($Apart_Id, $Room_Id, $Cus_Id)
    {
         $model2 = new Room();
        $booking = $this->findModel($Apart_Id, $Room_Id, $Cus_Id);
         $model2 = Room::find()->where(['Apart_Id' => $booking->Apart_Id,'Room_Id' => $booking->Room_Id])->one();
        
        if($booking->Status == '3')//สถานะที่ส่งมาจากroomถ้าถูกจองห้อง
        {
            $booking->Status = '1';//เซตให้เป็น 1 เพื่อจะส่งไปRoom
             $booking->Datestatus =date('Y-m-d h:i:s');
            $booking->save();
            (new Query)
         ->createCommand()
        ->delete('booking', ['Status' => '1'])
        ->execute(); 
               
              $model2->Status = '1';
             $model2->save();
           
        }
         return $this->redirect(['index']);
        // else
        // // {
        // //     // $booking->Status = '1';//ถ้ายกเลิก
        // //     // $booking->save();

        // //     // $model2->Status = $booking->Status;
        // //     //  $model2->save();
         
        // //     // return $this->redirect(['index']);
        // // }
       

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
    protected function findModel($Apart_Id, $Room_Id, $Cus_Id)
    {
        if (($model = Booking::findOne(['Apart_Id' => $Apart_Id, 'Room_Id' => $Room_Id, 'Cus_Id' => $Cus_Id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
