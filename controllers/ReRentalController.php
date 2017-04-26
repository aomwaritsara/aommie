<?php

namespace app\controllers;

use Yii;
use app\models\Rental;
use app\models\ReRentalSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Session;
use yii\db\Query;

/**
 * ReRentalController implements the CRUD actions for Rental model.
 */
class ReRentalController extends Controller
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
     * Lists all Rental models.
     * @return mixed
     */
   public function actionIndex()
    {
         $session = new Session;
        $session->open();
        
        $searchModel = new ReRentalSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        //$monthday = Rental::find()->all();

        $monthday = Rental::find()->groupBy(['month(StartDate)','year(StartDate)'])->orderBy(['year(StartDate)'=>SORT_DESC,'month(StartDate)'=>SORT_DESC])->all();
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'monthday'=> $monthday,
        ]);
    }
public function actionReport($month,$year,$namemonth) // $date = Y-m-d // payment_date = Y-m-d H-m-s.mm
    {
     
        $session = new Session;
        $session->open();
 // $Cus = new Customer();
       
  $model = Rental::find()->orderBy(['StartDate' => SORT_ASC])->all(); 

        return $this->render('report', ['month' => $month,'year' => $year,'namemonth' =>$namemonth, 'model' =>$model]);
    }
   
    protected function findModel($Apart_Id, $Room_Id, $Cus_Id, $StartDate)
    {
        if (($model = Rental::findOne(['Apart_Id' => $Apart_Id, 'Room_Id' => $Room_Id, 'Cus_Id' => $Cus_Id, '$StartDate' => $StartDate])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
