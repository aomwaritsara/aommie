<?php

namespace app\controllers;

use Yii;
use app\models\Roomtype;
use app\models\RoomtypeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RoomtypeController implements the CRUD actions for Roomtype model.
 */
class RoomtypeController extends Controller
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
     * Lists all Roomtype models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RoomtypeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Roomtype model.
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
     * Creates a new Roomtype model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Roomtype();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Apart_Id' => $model->Apart_Id, 'Room_Id' => $model->Room_Id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Roomtype model.
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
     * Deletes an existing Roomtype model.
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
     * Finds the Roomtype model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $Apart_Id
     * @param string $Room_Id
     * @return Roomtype the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($Apart_Id, $Room_Id)
    {
        if (($model = Roomtype::findOne(['Apart_Id' => $Apart_Id, 'Room_Id' => $Room_Id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
