<?php

namespace app\controllers;

use Yii;
use app\models\Setservice;
use app\models\SetserviceSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Service;
use yii\base\Model;
use yii\helpers\ArrayHelper;


/**
 * SetserviceController implements the CRUD actions for Setservice model.
 */
class SetserviceController extends Controller
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
     * Lists all Setservice models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SetserviceSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Setservice model.
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
     * Creates a new Setservice model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Setservice();
        $model2 = new Service();

        if ($model->load(Yii::$app->request->post()) && $model->save()&&$model2->load(Yii::$app->request->post()) && $model2->save()) {
            return $this->redirect(['view', 'Apart_Id' => $model->Apart_Id, 'Room_Id' => $model->Room_Id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'model2' => $model2,
            ]);
        }
    }

    /**
     * Updates an existing Setservice model.
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
     * Deletes an existing Setservice model.
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
     * Finds the Setservice model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $Apart_Id
     * @param string $Room_Id
     * @return Setservice the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($Apart_Id, $Room_Id)
    {
        if (($model = Setservice::findOne(['Apart_Id' => $Apart_Id, 'Room_Id' => $Room_Id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
