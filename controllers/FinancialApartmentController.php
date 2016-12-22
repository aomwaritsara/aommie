<?php

namespace app\controllers;

use Yii;
use app\models\FinancialApartment;
use app\models\FinancialApartmentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FinancialApartmentController implements the CRUD actions for FinancialApartment model.
 */
class FinancialApartmentController extends Controller
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
     * Lists all FinancialApartment models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FinancialApartmentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single FinancialApartment model.
     * @param integer $Finan_Id
     * @param integer $Apart_Id
     * @return mixed
     */
    public function actionView($Finan_Id, $Apart_Id)
    {
        return $this->render('view', [
            'model' => $this->findModel($Finan_Id, $Apart_Id),
        ]);
    }

    /**
     * Creates a new FinancialApartment model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new FinancialApartment();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Finan_Id' => $model->Finan_Id, 'Apart_Id' => $model->Apart_Id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing FinancialApartment model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $Finan_Id
     * @param integer $Apart_Id
     * @return mixed
     */
    public function actionUpdate($Finan_Id, $Apart_Id)
    {
        $model = $this->findModel($Finan_Id, $Apart_Id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Finan_Id' => $model->Finan_Id, 'Apart_Id' => $model->Apart_Id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing FinancialApartment model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $Finan_Id
     * @param integer $Apart_Id
     * @return mixed
     */
    public function actionDelete($Finan_Id, $Apart_Id)
    {
        $this->findModel($Finan_Id, $Apart_Id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the FinancialApartment model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $Finan_Id
     * @param integer $Apart_Id
     * @return FinancialApartment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($Finan_Id, $Apart_Id)
    {
        if (($model = FinancialApartment::findOne(['Finan_Id' => $Finan_Id, 'Apart_Id' => $Apart_Id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
