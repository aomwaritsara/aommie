<?php

namespace app\controllers;

use Yii;
use yii\db\Query;
$connection = Yii::$app->db;
use app\models\SetRoom;
use app\models\SetRoomSearch;
use app\models\Roomtype;
use app\models\RoomtypeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\base\Model;
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
        $model = SetRoom::findOne($Apart_Id, $Room_Id);
        $model2 = Roomtype::findOne($Apart_Id, $Room_Id);
        
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
        $model1 = new SetRoom();
        $model2 = new Roomtype();


        if ($model1->load(Yii::$app->request->post()) && $model1->save()&&$model2->load(Yii::$app->request->post()) && $model2->save()) {
            return $this->redirect(['view', 'Apart_Id' => $model1->Apart_Id, 'Room_Id' => $model1->Room_Id]);
        } else {
            return $this->render('create', [
                'model1' => $model1,
                'model2' => $model2,
                
            ]);
        } 

     }

    /**
     * Updates an existing SetRoom model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $Apart_Id
     * @param string $Room_Id
     * @return mixed
     */
    public function actionUpdate($Apart_Id, $Room_Id)
    
    {
         $model1 = new SetRoom();
         $model2 = new Roomtype();

        $model1 = $this->findModel($Apart_Id, $Room_Id);
      

        if ($model1->load(Yii::$app->request->post()) && $model1->save()&&$model2->load(Yii::$app->request->post()) && $model2->save()) {
            return $this->redirect(['view', 'Apart_Id' => $model1->Apart_Id, 'Room_Id' => $model1->Room_Id]);
        } else {
            return $this->render('update', [
                'model1' => $model1,
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
        //$model = SetRoom::findOne(['Apart_Id' => $Apart_Id, 'Room_Id' => $Room_Id]);
        $model = SetRoom::find()->joinWith('roomtype')->one();
    if ($model !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }   
}
