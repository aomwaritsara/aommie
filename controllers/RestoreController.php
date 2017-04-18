<?php

namespace app\controllers;

use Yii;
use app\models\Restore;
use app\models\RestoreSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Rental;
use app\models\Room;
use kartik\mpdf\Pdf;

/**
 * RestoreController implements the CRUD actions for Restore model.
 */
class RestoreController extends Controller
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
     * Lists all Restore models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RestoreSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Restore model.
     * @param integer $Apart_Id
     * @param string $Room_Id
     * @param string $Cus_Id
     * @param string $StartDate
     * @return mixed
     */
    public function actionChanger($Apart_Id, $Room_Id, $Cus_Id, $StartDate)
    {
        //$model2 = new Room();
        $restore= $this->findModel($Apart_Id, $Room_Id, $Cus_Id,$StartDate);
        
        if($restore->Status == '2')
        {
            $restore->Status = '1';
            $restore->DateTo = date('Y/m/d H:m:s');
            $restore->save();
            $model2 = Room::find()->where(['Apart_Id' => $Apart_Id,'Room_Id' => $Room_Id])->one();
            $model2->Status = '1';
            $model2->save();
          
            return $this->redirect(['index']);
        }
        else
        {
            $restore->Status = '2';
            $restore->save();
            $model2 = Room::find()->where(['Apart_Id' => $Apart_Id,'Room_Id' => $Room_Id])->one();
            $model2->Status = '2';
            return $this->redirect(['index']);
        }
    }

    public function actionPrintRestore($Apart_Id, $Room_Id, $Cus_Id, $StartDate)
    {
        $model = Restore::find()->where(['Apart_Id' => $Apart_Id, 'Room_Id' => $Room_Id, 'Cus_Id' => $Cus_Id,'StartDate' => $StartDate])->all();

        /*foreach ($model as $check =>$value) {
                $rental = History::find('Elec_Used')->where(['Apart_Id' => $value->Apart_Id])->andWhere(['Apart_Id' => $value->Apart_Id])->andWhere(['Cus_Id' => $value->Cus_Id])->one();
        }*/
          
        // $Payment= History::find('Elec_Used')->where(['Apart_Id' => $model->Apart_Id])->all();
                $Date = date('Y:m:d');
        $content = $this->renderPartial('_preview', [
            'model' => $model,
        ]);

        $pdf = new Pdf([
                'mode' => Pdf::MODE_UTF8,
                // A4 paper format
                'format' => Pdf::FORMAT_A4,
                // portrait orientation
                'orientation' => Pdf::ORIENT_PORTRAIT,
                // // stream to browser inline
                'destination' => Pdf::DEST_DOWNLOAD,
                'filename' => 'ใบเสร็จการคืนห้องพัก :'.$Room_Id .'วันที่' .$Date,
                // your html content input
                'content' => $content,
                // format content from your own css file if needed or use the
                // enhanced bootstrap css built by Krajee for mPDF formatting
                'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
                // any css to be embedded if required
                'cssInline' => '.kv-heading-1{font-size:24px}', 
                //'cssFile' => 'web/css/pdf.css',
                // any css to be embedded if required
                //'cssInline' => '.bd{border:1.5px solid; text-align: center;} .ar{text-align:right} .imgbd{border:1px solid}',

                // set mPDF properties on the fly
                'options' => ['title' => 'ใบเสร็จการคืนห้องพัก'],
                // call mPDF methods on the fly
                'methods' => [
                    //'SetHeader'=>[''],
                    //'SetFooter'=>['{PAGENO}'],
                ]
            ]);
        
            // return the pdf output as per the destination setting
            return $pdf->render();
    }

    /**
     * Finds the Restore model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $Apart_Id
     * @param string $Room_Id
     * @param string $Cus_Id
     * @return Restore the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($Apart_Id, $Room_Id, $Cus_Id, $StartDate)
    {
        return $this->render('view', [
            'model' => $this->findModel($Apart_Id, $Room_Id, $Cus_Id, $StartDate),
        ]);
    }

    /**
     * Creates a new Restore model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Restore();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Apart_Id' => $model->Apart_Id, 'Room_Id' => $model->Room_Id, 'Cus_Id' => $model->Cus_Id, 'StartDate' => $model->StartDate]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Restore model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $Apart_Id
     * @param string $Room_Id
     * @param string $Cus_Id
     * @param string $StartDate
     * @return mixed
     */
    public function actionUpdate($Apart_Id, $Room_Id, $Cus_Id, $StartDate)
    {
        $model = $this->findModel($Apart_Id, $Room_Id, $Cus_Id, $StartDate);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Apart_Id' => $model->Apart_Id, 'Room_Id' => $model->Room_Id, 'Cus_Id' => $model->Cus_Id, 'StartDate' => $model->StartDate]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Restore model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $Apart_Id
     * @param string $Room_Id
     * @param string $Cus_Id
     * @param string $StartDate
     * @return mixed
     */
    public function actionDelete($Apart_Id, $Room_Id, $Cus_Id, $StartDate)
    {
        $this->findModel($Apart_Id, $Room_Id, $Cus_Id, $StartDate)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Restore model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $Apart_Id
     * @param string $Room_Id
     * @param string $Cus_Id
     * @param string $StartDate
     * @return Restore the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($Apart_Id, $Room_Id, $Cus_Id, $StartDate)
    {
        if (($model = Restore::findOne(['Apart_Id' => $Apart_Id, 'Room_Id' => $Room_Id, 'Cus_Id' => $Cus_Id, 'StartDate' => $StartDate])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
