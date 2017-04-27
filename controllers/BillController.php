<?php

namespace app\controllers;

use Yii;
use app\models\Bill;
use app\models\BillSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Customer;


/**
 * BillController implements the CRUD actions for Bill model.
 */
class BillController extends Controller
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
     * Lists all Bill models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BillSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Bill model.
     * @param integer $Apart_Id
     * @param string $Room_Id
     * @param string $Cus_Id
     * @param string $DateFrom
     * @return mixed
     */
    public function actionView($Apart_Id, $Room_Id, $Cus_Id, $DateFrom)
    {
        return $this->render('view', [
            'model' => $this->findModel($Apart_Id, $Room_Id, $Cus_Id, $DateFrom),
        ]);
    }

    /**
     * Creates a new Bill model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Bill();
        //$Cus = new Customer();
         

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //$Cus =  Customer::find()->where(['Cus_Id' => $model->Cus_Id])->one();
            return $this->redirect(['view', 'Apart_Id' => $model->Apart_Id, 'Room_Id' => $model->Room_Id, 'Cus_Id' => $model->Cus_Id, 'DateFrom' => $model->DateFrom]);
        } else {
            return $this->render('create', [
                'model' => $model,
                //'Cus'  =>  $Cus
            ]);
        }
    }

public function actionChange($Apart_Id, $Room_Id, $Cus_Id, $DateFrom)
    {
        $bill = $this->findModel($Apart_Id, $Room_Id, $Cus_Id,$DateFrom);
        
        if($bill->PaymentStatus == '1')
        {
            $bill->PaymentStatus = '0';
            $bill->save();
            
            return $this->redirect(['index']);
        }
        else
        {
            $bill->PaymentStatus = '1';
            $bill->save();
            return $this->redirect(['index']);
        }
    }

    /**
     * Updates an existing Bill model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $Apart_Id
     * @param string $Room_Id
     * @param string $Cus_Id
     * @param string $DateFrom
     * @return mixed
     */
    public function actionUpdate($Apart_Id, $Room_Id, $Cus_Id, $DateFrom)
    {
        $model = $this->findModel($Apart_Id, $Room_Id, $Cus_Id, $DateFrom);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Apart_Id' => $model->Apart_Id, 'Room_Id' => $model->Room_Id, 'Cus_Id' => $model->Cus_Id, 'DateFrom' => $model->DateFrom]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Bill model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $Apart_Id
     * @param string $Room_Id
     * @param string $Cus_Id
     * @param string $DateFrom
     * @return mixed
     */
    public function actionDelete($Apart_Id, $Room_Id, $Cus_Id, $DateFrom)
    {
        $this->findModel($Apart_Id, $Room_Id, $Cus_Id, $DateFrom)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Bill model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $Apart_Id
     * @param string $Room_Id
     * @param string $Cus_Id
     * @param string $DateFrom
     * @return Bill the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($Apart_Id, $Room_Id, $Cus_Id, $DateFrom)
    {
        if (($model = Bill::findOne(['Apart_Id' => $Apart_Id, 'Room_Id' => $Room_Id, 'Cus_Id' => $Cus_Id, 'DateFrom' => $DateFrom])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
