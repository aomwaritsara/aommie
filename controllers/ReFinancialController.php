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
        $session = new Session;
        $session->open();

          $searchModel = new ReFinancialSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
$monthday = ReFinancial::find()->groupBy(['month(Date)','year(Date)'])->orderBy(['year(Date)'=>SORT_DESC,'month(Date)'=>SORT_DESC])->all();
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
        // $query = new Query;
        // $query  ->select('*')  
        //         ->from('financial_apartment')
        //         // ->innerJoin('member', 'selling_transaction.m_id = member.m_id')
        //         // ->innerJoin('payment', 'selling_transaction.t_id = payment.t_id')
        //         // ->innerJoin('selling_detail', 'selling_transaction.t_id = selling_detail.t_id')
        //         ->where(['MONTH(Date)' => $month])
        //         ->orderBy(['Date' => SORT_ASC]);

        // $command = $query->createCommand();
        // $data = $command->queryAll();
        // $model = $data;
        
        //print_r($model);

         $model =ReFinancial::find()->all(); 

           return $this->render('report', ['month' => $month,'year' => $year,'namemonth' =>$namemonth, 'model' =>$model ]);
    }


   
    protected function findModel($Finan_Id, $Apart_Id)
    {
        if (($model = ReFinancial::findOne(['Finan_Id' => $Finan_Id, 'Apart_Id' => $Apart_Id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
