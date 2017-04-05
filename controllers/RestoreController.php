<?php

namespace app\controllers;

use Yii;
use app\models\Restore;
use app\models\RestoreSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Room;
use kartik\datetime\DateTimePicker;
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
     * @return mixed
     */
    public function actionView($Apart_Id, $Room_Id, $Cus_Id)
    {
        return $this->render('view', [
            'model' => $this->findModel($Apart_Id, $Room_Id, $Cus_Id),
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
            return $this->redirect(['view', 'Apart_Id' => $model->Apart_Id, 'Room_Id' => $model->Room_Id, 'Cus_Id' => $model->Cus_Id]);
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
     * Deletes an existing Restore model.
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
     * Finds the Restore model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $Apart_Id
     * @param string $Room_Id
     * @param string $Cus_Id
     * @return Restore the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($Apart_Id, $Room_Id, $Cus_Id)
    {
        if (($model = Restore::findOne(['Apart_Id' => $Apart_Id, 'Room_Id' => $Room_Id, 'Cus_Id' => $Cus_Id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    public function actionChanger($Apart_Id, $Room_Id, $Cus_Id)
    {
        //$model2 = new Room();
        $restore= $this->findModel($Apart_Id, $Room_Id, $Cus_Id);

        
        if($restore->Status == '2')
        {
            $restore->DateTo = date('Y-m-d h:i:s');
             $restore->Status = '1';
              $restore->save();
              $model2 = Room::find()->where(['Apart_Id' => $restore->Apart_Id,'Room_Id' => $restore->Room_Id])->one();
             $model2->Apart_Id=$restore->Apart_Id;
             $model2->Room_Id=$restore->Room_Id;
              $model2->Status = '1';
              $model2->save();
          
            return $this->redirect(['printbill/index']);
        }
         else
        {
             $restore->Status = '2';
              $restore->save();
              $model2 = Room::find()->where(['Apart_Id' => $restore->Apart_Id,'Room_Id' => $restore->Room_Id])->one();
              $model2->Status = '2';
              $model2->save();
          
            return $this->redirect(['printbill/index']);
        }
    }

}
