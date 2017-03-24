<?php

namespace app\controllers;
use app\models\Rental;
use app\models\RentalSearch;
use yii\db\Query;
class RestoreReportController extends \yii\web\Controller
{
    public function actionIndex()
    {

	$restore= Rental::find('Apart_Id','Room_Id','Cus_Id')->where("Status='1'")->all();
    	 // $query = new Query();
    	 // $restore = $query
      //    ->select([  'rental.Room_Id'
      //                       ,'rental.Apart_Id AS AId'
      //                       , 'rental.Cus_Id AS CId'
      //                       , 'rental.DateFrom AS DateF'
      //                       , 'rental.DateTo AS DateT'
      //                       , 'rental.NumCus AS NumCus'
      //                       , 'rental.Deposit AS Deposit'                     
      //                       , 'rental.Status AS Status'                                        
                                             
      //            ])  
      //            ->from('rental')         
      //            ->orderBy('rental.Room_Id')                 
      //            ->createCommand()                                                      
      //            ->queryAll();
 
        // echo $desRoom->rentals->Cus_Id;
        return $this->render('index', [
            'restore' => $restore,
                     
        ]);
    }
}
