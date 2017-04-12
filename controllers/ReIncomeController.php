<?php

namespace app\controllers;

use Yii;
use app\models\History;
use app\models\ReIncomeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Session;
use yii\db\Query;
use app\models\Deposit;

/**
 * ReIncomeController implements the CRUD actions for History model.
 */
class ReIncomeController extends Controller
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
     * Lists all History models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ReIncomeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $monthday = History::find()->groupBy(['month(CheckDate)','year(CheckDate)'])->orderBy(['year(CheckDate)'=>SORT_DESC,'month(CheckDate)'=>SORT_DESC])->all();
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
              'monthday'=> $monthday,
        ]);
    }
     public function actionReport($month,$year,$namemonth) // $date = Y-m-d // payment_date = Y-m-d H-m-s.mm
    {
        //$this->layout = 'siteadmin_main';
        $session = new Session;
        $session->open();

        // if (!isset($session['user_name'])) {
        //     return $this->redirect('login');
        // }
        //echo $month;
        //SELECT * FROM selling_transaction INNER JOIN member ON selling_transaction.m_id = member.m_id INNER JOIN payment on selling_transaction.t_id = payment.t_id INNER JOIN selling_detail ON selling_transaction.t_id = selling_detail.t_id WHERE payment.payment_date LIKE '%2017-03-13%'
        
        //12-04-2017 edit
        // $query = new Query;
        // $query  ->select('*')  
        //         ->from('history')
        //         // ->innerJoin('member', 'selling_transaction.m_id = member.m_id')
        //         // ->innerJoin('payment', 'selling_transaction.t_id = payment.t_id')
        //         // ->innerJoin('selling_detail', 'selling_transaction.t_id = selling_detail.t_id')
        //         ->where(['MONTH(CheckDate)' => $month])
        //         ->orderBy(['CheckDate' => SORT_ASC]);



        // $command = $query->createCommand();
        // $data = $command->queryAll();
        // $model = $data;
        //12-04-2017 end edit

        $model_history = History::find()->all(); 
        $model_deposit =Deposit::find()->all();        
        //print_r($model);

        return $this->render('report', ['month' => $month,'year' => $year,'namemonth' =>$namemonth, 'model_history' =>$model_history, 'model_deposit' =>$model_deposit]);
    }

 
    /**
     * Displays a single History model.
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
     * Creates a new History model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new History();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Apart_Id' => $model->Apart_Id, 'Room_Id' => $model->Room_Id, 'Cus_Id' => $model->Cus_Id, 'DateFrom' => $model->DateFrom]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing History model.
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
     * Deletes an existing History model.
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
     * Finds the History model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $Apart_Id
     * @param string $Room_Id
     * @param string $Cus_Id
     * @param string $DateFrom
     * @return History the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($Apart_Id, $Room_Id, $Cus_Id, $DateFrom)
    {
        if (($model = History::findOne(['Apart_Id' => $Apart_Id, 'Room_Id' => $Room_Id, 'Cus_Id' => $Cus_Id, 'DateFrom' => $DateFrom])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
