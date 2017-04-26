<?php

namespace app\controllers;

use Yii;
use app\models\Payment;
use app\models\PaymentSearch;
use yii\web\Controller;
use yii\web\Session;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use app\models\History;
use app\models\Rental;
use app\models\Apartment;
use app\models\Roomtype;
use app\models\Customer;
use app\models\Service;
use app\models\Serviceofrental;


/**
 * PaymentController implements the CRUD actions for Payment model.
 */
class PaymentController extends Controller
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
     * Lists all Payment models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PaymentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'payment_alert'=>'0',
           
        ]);
    }

    /**
     * Displays a single Payment model.
     * @param integer $Apart_Id
     * @param string $Room_Id
     * @param string $Cus_Id
     * @return mixed
     */
    public function actionView($Apart_Id, $Room_Id, $Cus_Id, $StartDate)
    {
        $rental = Rental::find()->where(['Apart_Id' => $Apart_Id, 'Room_Id' => $Room_Id, 'Cus_Id' => $Cus_Id, 'StartDate' => $StartDate])->one();
        $date = $rental->DateFrom;

        $model = History::find()->where(['Apart_Id' => $Apart_Id, 'Room_Id' => $Room_Id, 'Cus_Id' => $Cus_Id, 'DateFrom' => $date])->one();

        // echo "<pre>";
        // echo print_r($model);
        // echo "</pre>";
        
        return $this->render('view', [
            'model' => $model,
        ]);
    }

     protected function findModel2($Apart_Id, $Room_Id, $Cus_Id, $StartDate)
    {
        if (($model = History::findOne(['Apart_Id' => $Apart_Id, 'Room_Id' => $Room_Id, 'Cus_Id' => $Cus_Id,'DateFrom' => $CheckDate])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Creates a new Payment model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($Apart_Id, $Room_Id, $Cus_Id)
    {
        $session = new Session;
        $session->open();

        $model = new History();

        $getRental = Rental::find()->where(['Apart_Id' => $Apart_Id, 'Room_Id' => $Room_Id, 'Cus_Id' => $Cus_Id])->one();
        $getApartment = Apartment::findone($getRental->Apart_Id);
        $getRoom = Roomtype::find()->where(['Apart_Id' => $Apart_Id, 'Room_Id' => $Room_Id])->one();
        $getCus = Customer::findone($getRental->Cus_Id);



        if(Yii::$app->request->isPost){
            
            $model->load(Yii::$app->request->post());

            $model->Apart_Id = $getApartment->Apart_Id;
            $model->Room_Id = $getRoom->Room_Id;
            $model->Cus_Id = $getCus->Cus_Id;

            $model->CheckDate=date('Y-m-d H:i:s');
            $getRental->DateFrom = $model->CheckDate;
            $date = strtotime($getRental->DateFrom);
            $date = strtotime("+30 day", $date);
            $date = date('Y-m-d H:i:s', $date);
            $getRental->DateTo = $date;
            
            $model->DateFrom = $getRental->DateFrom;
            $model->PaymentStatus = '0';
            $getRental->save();
     
            switch ($model->SoR_Id) {

                case '0':
                    $select_service = 1;
                    $service_name = 'Internet';
                    break;
                case '1':
                    $select_service = 1;
                    $service_name = 'TV';
                    break;
                case '2':
                    $select_service = 1;
                    $service_name = 'ตู้เย็น';    
                    break;
                case '3':
                    $select_service = 2;
                    $service_name1 = 'Internet';
                    $service_name2 = 'TV';
                    break;
                case '4':
                    $select_service = 2;
                    $service_name1 = 'Internet';
                    $service_name2 = 'ตู้เย็น';
                    break;
                case '5':
                    $select_service = 2;
                    $service_name1 = 'TV';
                    $service_name2 = 'ตู้เย็น';
                    break;
                case '6':
                    $select_service = 3;
                    $service_name1 = 'Internet';
                    $service_name2 = 'TV';
                    $service_name3 = 'ตู้เย็น';
                    break;

                default:
                    $model->SoR_Id = NULL;
                    $select_service = 0;
                    break;
            }

            for ($num_service = 0; $num_service < 7 ; $num_service++) { 
                if ($model->SoR_Id == $num_service && $select_service == 1) { ////1111111111111111
                    $getservice = Service::find()->where(['Name' => $service_name])->one();
                    $serviceofrental = new Serviceofrental();

                    $query = "SUBSTR(SoR_Id FROM 1 FOR 2), CAST(SUBSTR(SoR_Id FROM 3) AS UNSIGNED), SUBSTR(SoR_Id FROM 3)";
                    $SR_id = Serviceofrental::find()->orderBy($query)->all();
                    $SRrow = 0;
                    foreach ($SR_id as $key => $sr_value) {
                        $SRrow++;               
                    }
                    if ($SRrow != 0) {
                        $string = $sr_value->SoR_Id; 
                        $SR = substr($string, -5, 2); //return SR
                        $number = substr($string, 2); //return number
                        $number++;
                        $new_id = $SR.$number;
                    }
                        
                    if ($SRrow == 0) { // no row
                        $serviceofrental->SoR_Id = "SR1";
                    }else{
                        if (isset($new_id)) {
                            $serviceofrental->SoR_Id = $new_id;
                        }else{
                            $serviceofrental->SoR_Id = "SR1"; // when more SR1
                        }  
                    }
                    $serviceofrental->Apart_Id = $model->Apart_Id;
                    $serviceofrental->Room_Id = $model->Room_Id;
                    $serviceofrental->Cus_Id = $model->Cus_Id;
                    $serviceofrental->Service_Id = $getservice->Service_Id;
                    $serviceofrental->save(false);

                }
                else if ($model->SoR_Id == $num_service && $select_service == 2) { ///////2222222222222222
                    $getservice_mult = Service::find()->where(['Name' => $service_name1])->orWhere(['Name' => $service_name2])->all();

                    $query = "SUBSTR(SoR_Id FROM 1 FOR 2), CAST(SUBSTR(SoR_Id FROM 3) AS UNSIGNED), SUBSTR(SoR_Id FROM 3)";
                    $SR_id = Serviceofrental::find()->orderBy($query)->all();
                    $SRrow = 0;
                    foreach ($SR_id as $key => $sr_value) {
                        $SRrow++;            
                    }
                    if ($SRrow != 0) {
                        $string = $sr_value->SoR_Id; 
                        $SR = substr($string, -5, 2); //return SR
                        $number = substr($string, 2); //return number
                        $number++;
                        $new_id = $SR.$number;
                    }

                    foreach ($getservice_mult as $key => $value) {
                        $serviceofrental = new Serviceofrental();
                        if ($SRrow == 0) { // no row
                            $serviceofrental->SoR_Id = "SR1";
                        }else{
                            if (isset($new_id)) {
                                $serviceofrental->SoR_Id = $new_id;
                            }else{
                                $serviceofrental->SoR_Id = "SR1"; // when more SR1
                            }  
                        }
                        $serviceofrental->Apart_Id = $model->Apart_Id;
                        $serviceofrental->Room_Id = $model->Room_Id;
                        $serviceofrental->Cus_Id = $model->Cus_Id;
                        $serviceofrental->Service_Id = $value->Service_Id;
                        $serviceofrental->save(false);
                        $SRrow++;
                    }
                }
                else if ($model->SoR_Id == $num_service && $select_service == 3) { ////33333333333333333333
                    $getservice_mult = Service::find()->where(['Name' => $service_name1])->orWhere(['Name' => $service_name2])->orWhere(['Name' => $service_name3])->all();

                    $query = "SUBSTR(SoR_Id FROM 1 FOR 2), CAST(SUBSTR(SoR_Id FROM 3) AS UNSIGNED), SUBSTR(SoR_Id FROM 3)";
                    $SR_id = Serviceofrental::find()->orderBy($query)->all();
                    $SRrow = 0;
                    foreach ($SR_id as $key => $sr_value) {
                        $SRrow++;                
                    }
                    if ($SRrow != 0) {
                        $string = $sr_value->SoR_Id; 
                        $SR = substr($string, -5, 2); //return SR
                        $number = substr($string, 2); //return number
                        $number++;
                        $new_id = $SR.$number;
                    }

                    foreach ($getservice_mult as $key => $value) {
                        $serviceofrental = new Serviceofrental();
                        if ($SRrow == 0) { // no row
                            $serviceofrental->SoR_Id = "SR1";
                        }else{
                            if (isset($new_id)) {
                                $serviceofrental->SoR_Id = $new_id;
                            }else{
                                $serviceofrental->SoR_Id = "SR1"; // when more SR1
                            }
                        }
                        $serviceofrental->Apart_Id = $model->Apart_Id;
                        $serviceofrental->Room_Id = $model->Room_Id;
                        $serviceofrental->Cus_Id = $model->Cus_Id;
                        $serviceofrental->Service_Id = $value->Service_Id;
                        $serviceofrental->save(false);
                        $SRrow++;
                    }
                }
            }

            if ($model->SoR_Id != NULL) {
                $model->SoR_Id = $serviceofrental->SoR_Id;
            }
            
            /////////////////////////////////////////////
            $thisRoomtype = Roomtype::find()->where(['Apart_Id' => $model->Apart_Id, 'Room_Id' => $model->Room_Id])->one();
            $elec_used = $model->Elec_Used * $thisRoomtype->Eletricity;
            $model->Elec_Used = $elec_used;
            ////////////////////////////////////////////

            if ($model->SoR_Id != NULL) {
                $thisServiceRental = Serviceofrental::find()->where(['SoR_Id' => $serviceofrental->SoR_Id])->all();
                $cost_of_service = 0;
                foreach ($thisServiceRental as $key => $value) {
                    $thisService = Service::find()->where(['Service_Id' => $value->Service_Id])->one();
                    $cost_of_service += $thisService->Price;
                }
                $model->Cost = $cost_of_service;
            }
            else
            {   
                $model->Cost = 0;
            }
                
            $total_price = $thisRoomtype->Price + $model->Elec_Used + $model->Water_Used + $model->Cost;
            $model->TotalPrice = $total_price;
 
            
            if ($model->save()) {
                
                return $this->redirect(['index' ]);
            }

            
        }




        return $this->render('create', [
            'model' => $model,
            'getRental' => $getRental,
            'getApartment' => $getApartment,
            'getRoom' => $getRoom,
            'getCus' => $getCus,
        ]);
        
    }

    /**
     * Updates an existing Payment model.
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
        //  $getApartment = Apartment::find()->where(['Staff_Id' => $session['staff_id']])->one();
         $model = $this->findModel2($Apart_Id, $Room_Id, $Cus_Id);
        //  $getRoom = Roomtype::find()->where(['Apart_Id' => $Apart_Id, 'Room_Id' => $Room_Id])->one();
        // $getCus = Customer::findone($getRental->Cus_Id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Apart_Id' => $model->Apart_Id, 'Room_Id' => $model->Room_Id, 'Cus_Id' => $model->Cus_Id]);
        } else {
            return $this->render('update', [
                'model' => $model,
             'getApartment' => $getApartment,
             //   'getRoom' => $getRoom,
             // 'getCus' => $getCus,
            ]);
        }
    }

    /**
     * Deletes an existing Payment model.
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

    /**
     * Finds the Payment model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $Apart_Id
     * @param string $Room_Id
     * @param string $Cus_Id
     * @return Payment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($Apart_Id, $Room_Id, $Cus_Id)
    {
        if (($model = Payment::findOne(['Apart_Id' => $Apart_Id, 'Room_Id' => $Room_Id, 'Cus_Id' => $Cus_Id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
   
}
