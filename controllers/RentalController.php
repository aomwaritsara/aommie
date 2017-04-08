<?php

namespace app\controllers;

use Yii;
use app\models\Room;
use app\models\Rental;
use app\models\Booking;
use app\models\RentalSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\base\Model;
use yii\db\Query;

/**
 * RentalController implements the CRUD actions for Rental model.
 */
class RentalController extends Controller
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
     * Lists all Rental models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RentalSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Rental model.
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
     * Creates a new Rental model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Rental();
        $model2 =new Room();
       // $model3 =new Booking();

         
      if ($model->load(Yii::$app->request->post())  ) {
        if (Booking::find()->where(['Cus_Id' => $model->Cus_Id])->one()) {
            //if (Booking::find()->where(['Deposit' => $model->Deposit])->one()) {
                    $model->save();
                    $model2 = Room::find()->where(['Apart_Id' => $model->Apart_Id,'Room_Id' => $model->Room_Id])->one();
                     // Yii::log('start calculating average revenue');
                     $model2->Status = $model->Status;
                     $model2->save();
                    //ลบ model bookking ++++ 
                     if($model3 = Booking::find()->where(['Apart_Id' => $model->Apart_Id,'Room_Id' => $model->Room_Id,'Cus_Id' => $model->Cus_Id])->one()){
                     // $model->Deposit=$model3->Deposit;
                    // $model3->save();
                        if( $model3->Status ='3'){
                     $model3->Status ='0';
                     $model3->save();
                        (new Query)
                 ->createCommand()
                ->delete('booking', ['Status' => '0'])
                ->execute(); 
                        $model3->save();
                    }
                }
              //  echo "yes";
                     $this->redirect(['printrent/index', 'Apart_Id' => $model->Apart_Id, 'Room_Id' => $model->Room_Id, 'Cus_Id' => $model->Cus_Id]);
           // }
            // else
            // {
            //     echo "money";
            // }
        }
        else
        {
            echo "รหัสประจำตัวประชาชนไม่ถูกต้อง กรุณาตรวจสอบอีกครั้ง";
        }
        
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Rental model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $Apart_Id
     * @param string $Room_Id
     * @param string $Cus_Id
     * @return mixed
     */
    public function actionUpdate($Apart_Id, $Room_Id, $Cus_Id)
    {
        $model = $this->findModel($Apart_Id, $Room_Id, $Cus_Id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Apart_Id' => $model->Apart_Id, 'Room_Id' => $model->Room_Id, 'Cus_Id' => $model->Cus_Id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Rental model.
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
     * Finds the Rental model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $Apart_Id
     * @param string $Room_Id
     * @param string $Cus_Id
     * @return Rental the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($Apart_Id, $Room_Id, $Cus_Id)
    {
        if (($model = Rental::findOne(['Apart_Id' => $Apart_Id, 'Room_Id' => $Room_Id, 'Cus_Id' => $Cus_Id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
