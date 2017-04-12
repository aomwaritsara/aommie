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
use app\models\Customer;
/**
 * BookingController implements the CRUD actions for Booking model.


 //เพิ่มbooking date ทุก action
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
    public function actionView($Apart_Id, $Room_Id, $Cus_Id,$Booking_Date)
    {
        return $this->render('view', [
            'model' => $this->findModel($Apart_Id, $Room_Id, $Cus_Id,$Booking_Date),
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
        $Cus = new Customer();

        $apartment = Apartment::find()->where(['Staff_Id' => $session['staff_id']])->one();
       
      // $Cus =Customer::find()->All();
 // var_dump($Cus) ;
 
    // $getApart = Apartment::findOne($model2->Apart_Id); '5555555555555'
      if ($model->load(Yii::$app->request->post())  ){
            // $booking ='5555555555555';
            // echo $model->Cus_Id;
             if (Customer::find()->where(['Cus_Id' => $model->Cus_Id])->one()){
          
                $model->Apart_Id = $apartment->Apart_Id;
                  $model->Datestatus =date('Y-m-d H:i:s');
                  $model->Status = '3';
                     $model->save();

                 $model2 = Room::find()->where(['Apart_Id' => $model->Apart_Id,'Room_Id' => $model->Room_Id])->one();
                 
                // $getApart = Apartment::findOne($model2->Apart_Id);//เอาApartid ส่งไป_form
               
                 $model2->Status = $model->Status;
                 $model2->save();
                
                 // $model3->Apart_Id = $model->Apart_Id;
                 // $model3->Room_Id = $model->Room_Id;
                 // $model3->Cus_Id = $model->Cus_Id;
                 // $model3->Date = $model->Booking_Date;
                 // $model3->Price = $model->Deposit;
                 // $model3->Status = '1';
                
                //$model3->save(); 

                // echo "yes";
                       return $this->redirect(['view', 'Apart_Id' => $model->Apart_Id, 'Room_Id' => $model->Room_Id, 'Cus_Id' => $model->Cus_Id,'Booking_Date' => $model->Booking_Date]);
            }
            else return "รหัสประจำตัวไม่ถูกต้อง กรุณากรอกใหม่อีกครั้ง";
      
      }
            
 else {
            return $this->render('create', [
                'model' => $model,
                'apartment' => $apartment,
                 //'Cus'  =>  $Cus,
                
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
    public function actionUpdate($Apart_Id, $Room_Id, $Cus_Id,$Booking_Date)
    {
        $session = new Session;
        $session->open();

  $apartment = Apartment::find()->where(['Staff_Id' => $session['staff_id']])->one();

  
        $model = $this->findModel($Apart_Id, $Room_Id, $Cus_Id,$Booking_Date);
       // $model3= $this->findModel3($model->Apart_Id,$model->Room_Id,$model->Cus_Id);


      if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Apart_Id' => $model->Apart_Id, 'Room_Id' => $model->Room_Id, 'Cus_Id' => $model->Cus_Id,'$Booking_Date' => $model->$Booking_Date]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'apartment' => $apartment,
               // 'model' =>  $model3,
            ]);
        }
    }
        //         $model = $this->findModel($Apart_Id, $Room_Id, $Cus_Id,$StartDate);

        // if ($model->load(Yii::$app->request->post()) && $model->save()) {
        //     return $this->redirect(['view', 'Apart_Id' => $model->Apart_Id, 'Room_Id' => $model->Room_Id, 'Cus_Id' => $model->Cus_Id,'StartDate' => $model->StartDate]);
        // } else {
        //     return $this->render('update', [
        //         'model' => $model,
        //     ]);
        // }
     
    protected function findModel2($Apart_Id,$Room_Id)
{
    if (($model = Room::findOne($Apart_Id,$Room_Id)) !== null) {
        return $model;
    } else {
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
protected function findModel3($Apart_Id,$Room_Id,$Cus_Id)
{
    if (($model = Deposit::findOne(['Apart_Id' => $Apart_Id, 'Room_Id' => $Room_Id,'Cus_Id' => $Cus_Id])) !== null)
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
    public function actionDelete($Apart_Id, $Room_Id, $Cus_Id,$Booking_Date)
    {
        $this->findModel($Apart_Id, $Room_Id, $Cus_Id)->delete();

        return $this->redirect(['index']);
    }

    public function actionChangeb($Apart_Id, $Room_Id, $Cus_Id,$Booking_Date)
    {
         $model2 = new Room();
         $model3 = new Deposit();
        $booking = $this->findModel($Apart_Id, $Room_Id, $Cus_Id,$Booking_Date);
         $model2 = Room::find()->where(['Apart_Id' => $booking->Apart_Id,'Room_Id' => $booking->Room_Id])->one();
        
        if($booking->Status == '3')//สถานะที่ส่งมาจากroomถ้าถูกจองห้อง
        {

             $model3->Apart_Id = $booking->Apart_Id;
                 $model3->Room_Id = $booking->Room_Id;
                 $model3->Cus_Id = $booking->Cus_Id;
                 $model3->Date = $booking->Booking_Date;
                 $model3->Price = $booking->Deposit;
                 $model3->Status = '1';
                
                $model3->save(); 


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
    protected function findModel($Apart_Id, $Room_Id, $Cus_Id,$Booking_Date)
    {
        if (($model = Booking::findOne(['Apart_Id' => $Apart_Id, 'Room_Id' => $Room_Id, 'Cus_Id' => $Cus_Id, 'Booking_Date' => $Booking_Date])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
