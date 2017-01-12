<?php

namespace app\controllers;

use Yii;
use app\models\SetRoom;
use app\models\SetRoomSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Apartment;
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
        $modell = new Apartment();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Apart_Id' => $model->Apart_Id, 'Room_Id' => $model->Room_Id]);
        } else {
            return $this->render('create', [
                'modell' => $modell,
                'model' => $model,
                
            ]);
        } 

    /*if($model->load(Yii::$app->request->post()) && $modell->load(Yii::$app->request->post()) && Model::validateMultiple([$model,$modell])){
        $modell->save();
        return $this->redirect(['view', 'Apart_Id' => $model->Apart_Id, 'Room_Id' => $model->Room_Id]);
    } else {
        return $this->render('create', [
            'model' => $model,
            'modell'=>$modell
        ]);
    } */
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
        $model = $this->findModel($Apart_Id, $Room_Id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Apart_Id' => $model->Apart_Id, 'Room_Id' => $model->Room_Id]);
        } else {
            return $this->render('update', [
                'model' => $model,
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
        if (($model = SetRoom::findOne(['Apart_Id' => $Apart_Id, 'Room_Id' => $Room_Id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
