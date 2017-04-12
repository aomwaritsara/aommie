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
        $session = new Session;
        $session->open();
        
        $searchModel = new ReRestoreStoreSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

      
        $monthday = Rental::find()->groupBy(['month(DateFrom)','year(DateFrom)'])->orderBy(['year(DateFrom)'=>SORT_DESC,'month(DateFrom)'=>SORT_DESC])->all();
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

    
           $model = Rental::find() ->where(['MONTH(DateFrom)' => $month,'Status' => '1'])->orderBy(['StartDate' => SORT_ASC])->all(); 

        return $this->render('report', ['month' => $month,'year' => $year,'namemonth' =>$namemonth, 'model' =>$model]);

        
    }
 
    protected function findModel($Apart_Id, $Room_Id, $Cus_Id)
    {
        if (($model = Restore::findOne(['Apart_Id' => $Apart_Id, 'Room_Id' => $Room_Id, 'Cus_Id' => $Cus_Id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
