<?php

namespace app\controllers;

use Yii;
use app\models\Rental;
use app\models\Restore;
use app\models\ReRestoreStoreSearch;
use yii\web\Controller;
use yii\web\Session;
use yii\db\Query;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Customer;

/**
 * ReRestoreController implements the CRUD actions for Restore model.
 */
class ReRestoreController extends Controller
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
        $searchModel = new ReRestoreStoreSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

       $monthday = Restore::find()->groupBy(['month(DateTo)'])->all();
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'monthday'=> $monthday,
        ]);
    }
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
                ->from('rental')
                // ->innerJoin('member', 'selling_transaction.m_id = member.m_id')
                // ->innerJoin('payment', 'selling_transaction.t_id = payment.t_id')
                // ->innerJoin('selling_detail', 'selling_transaction.t_id = selling_detail.t_id')
                ->where("DateTo LIKE '%$month%' AND Status = '1'")
                ->orderBy(['DateTo' => SORT_ASC]);

        $command = $query->createCommand();
        $data = $command->queryAll();
        $model = $data;
         

        return $this->render('report', ['month' => $month, 'model' =>$model]);
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
}
