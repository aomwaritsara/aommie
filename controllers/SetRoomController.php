<?php

namespace app\controllers;

use Yii;

use app\models\Room;
use app\models\RoomSearch;
use app\models\Roomtype;
use app\models\RoomtypeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SetRoomController implements the CRUD actions for SetRoom model.
 */
class SetRoomController extends Controller
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
     * Lists all SetRoom models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SetRoomSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SetRoom model.
     * @param integer $Apart_Id
     * @param string $Room_Id
     * @return mixed
     */
    public function actionView($Apart_Id, $Room_Id)
    {
        return $this->render('view', [
            'model' => $this->findModel($Apart_Id, $Room_Id),
           
        ]);
    }

    /**
     * Creates a new SetRoom model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
     {
        $model = new SetRoom();
        $model2 = new Room();

        if ($model->load(Yii::$app->request->post()) && $model->save()&&$model2->load(Yii::$app->request->post()) && $model2->save()) {
            return $this->redirect(['view', 'Apart_Id' => $model->Apart_Id, 'Room_Id' => $model->Room_Id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'model2' => $model2,
            ]);
        }
    }
    /*


  *
     * Updates an existing SetRoom model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $Apart_Id
     * @param string $Room_Id
     * @return mixed
     */
public function actionUpdate($Apart_Id, $Room_Id)
    {
        $model = new SetRoom();
        $model2 = new Room();

        $model = $this->findModel($Apart_Id, $Room_Id);
      

        if ($model->load(Yii::$app->request->post()) && $model->save()&&$model2->load(Yii::$app->request->post()) && $model2->save()) {
            return $this->redirect(['view', 'Apart_Id' => $model->Apart_Id, 'Room_Id' => $model->Room_Id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                 'model2' => $model2,
            ]);
        }
    }




    /**
     * Deletes an existing SetRoom model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $Apart_Id
     * @param string $Room_Id
     * @return mixed
     */
    public function actionDelete($Apart_Id, $Room_Id)
    {
        $this->findModel($Apart_Id, $Room_Id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the SetRoom model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $Apart_Id
     * @param string $Room_Id
     * @return SetRoom the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
  protected function findModel($Apart_Id, $Room_Id)
    {
       
       // $model = SetRoom::findOne(['Apart_Id' => $Apart_Id, 'Room_Id' => $Room_Id]);
        //join ผิด
     // $model = SetRoom::find()->joinWith('room')->andWhere('SetRoom.Room_Id' == $Room_Id)->One();
    //if ($model !== null) {
            //return $model;
        if (($model = SetRoom::findOne(['Apart_Id' => $Apart_Id, 'Room_Id' => $Room_Id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');

    }
    }
}




