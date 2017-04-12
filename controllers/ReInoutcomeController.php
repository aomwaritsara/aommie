<?php

namespace app\controllers;

use Yii;
use app\models\History;
use app\models\Deposit;
use app\models\FinancialApartment;
use app\models\ReInoutcomeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Session;

/**
 * ReInoutcomeController implements the CRUD actions for History model.
 */
class ReInoutcomeController extends Controller
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
        $monthday = History::find()->groupBy(['year(CheckDate)'])->orderBy(['year(CheckDate)'=>SORT_DESC])->all();
        return $this->render('index', [
              'monthday'=> $monthday,
        ]);
    }

    /**
     * Displays a single History model.
     * @param integer $Apart_Id
     * @param string $Room_Id
     * @param string $Cus_Id
     * @param string $DateFrom
     * @return mixed
     */
    public function actionReport($year) // $date = Y-m-d // payment_date = Y-m-d H-m-s.mm
    {
        $session = new Session;
        $session->open();

        $model_history1 = History::find()->groupBy(['month(CheckDate)','year(CheckDate)'])->orderBy(['month(CheckDate)'=>SORT_ASC])->all();
        $model_history2 = History::find()->orderBy(['month(CheckDate)'=>SORT_ASC])->all(); 
        $model_deposit =Deposit::find()->orderBy(['month(Date)'=>SORT_ASC])->all(); 
        $model_Finance =FinancialApartment::find()->orderBy(['month(Date)'=>SORT_ASC])->all();       

        return $this->render('report', ['year' => $year, 'model_history1' =>$model_history1, 'model_history2' =>$model_history2, 'model_deposit' =>$model_deposit, 'model_Finance'=>$model_Finance]);
    }
}
