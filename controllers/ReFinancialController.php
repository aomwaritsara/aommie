<?php

namespace app\controllers;

use Yii;
use app\models\ReFinancial;
use app\models\ReFinancialSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Session;
use yii\db\Query;

/**
 * ReFinancialController implements the CRUD actions for ReFinancial model.
 */
class ReFinancialController extends Controller
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
     * Lists all ReFinancial models.
     * @return mixed
     */
    public function actionIndex()
    {
          $searchModel = new ReFinancialSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

       $monthday = ReFinancial::find()->groupBy(['month(Date)'])->all();
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'monthday'=> $monthday,
        ]);
    }

    /**
     * Displays a single ReFinancial model.
     * @param string $Finan_Id
     * @param integer $Apart_Id
     * @return mixed
     */
    public function actionReport($month) // $date = Y-m-d // payment_date = Y-m-d H-m-s.mm
    {
        //$this->layout = 'siteadmin_main';
        $session = new Session;
        $session->open();

        // if (!isset($session['user_name'])) {
        //     return $this->redirect('login');
        // }
        
        //SELECT * FROM selling_transaction INNER JOIN member ON selling_transaction.m_id = member.m_id INNER JOIN payment on selling_transaction.t_id = payment.t_id INNER JOIN selling_detail ON selling_transaction.t_id = selling_detail.t_id WHERE payment.payment_date LIKE '%2017-03-13%'
        $query = new Query;
        $query  ->select('*')  
                ->from('financial_apartment')
                // ->innerJoin('member', 'selling_transaction.m_id = member.m_id')
                // ->innerJoin('payment', 'selling_transaction.t_id = payment.t_id')
                // ->innerJoin('selling_detail', 'selling_transaction.t_id = selling_detail.t_id')
                ->where("Date LIKE '%$month%' ")
                ->orderBy(['Date' => SORT_ASC]);

        $command = $query->createCommand();
        $data = $command->queryAll();
        $model = $data;
         

        return $this->render('report', ['month' => $month, 'model' =>$model]);
    }

    public function actionView($Finan_Id, $Apart_Id)
    {
        return $this->render('view', [
            'model' => $this->findModel($Finan_Id, $Apart_Id),
        ]);
    }

    /**
     * Creates a new ReFinancial model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ReFinancial();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Finan_Id' => $model->Finan_Id, 'Apart_Id' => $model->Apart_Id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ReFinancial model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $Finan_Id
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
     * Deletes an existing ReFinancial model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $Finan_Id
     * @param integer $Apart_Id
     * @return mixed
     */
    public function actionDelete($Finan_Id, $Apart_Id)
    {
        $this->findModel($Finan_Id, $Apart_Id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ReFinancial model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $Finan_Id
     * @param integer $Apart_Id
     * @return ReFinancial the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($Finan_Id, $Apart_Id)
    {
        if (($model = ReFinancial::findOne(['Finan_Id' => $Finan_Id, 'Apart_Id' => $Apart_Id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
