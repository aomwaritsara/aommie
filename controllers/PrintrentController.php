<?php

namespace app\controllers;
use yii\db\Query;
use yii\web\Controller;

use yii\data\Pagination;


use app\models\Customer;




use yii\models\Rental;
use app\models\Room;



class PrintrentController extends \yii\web\Controller
{
    public function actionIndex($Apart_Id ,$Room_Id ,$Cus_Id)
    {
    	// $query = Customer::find();
    	 $query = Room::find();


    	 	$query1 = new Query;
            $query1  ->select('*')  
                ->from('customer')
                ->leftJoin('rental', 'customer.Cus_Id = rental.Cus_Id');
            $command = $query1->createCommand();
            $data = $command->queryAll();
            $detailrent = $data;
               
        return $this->render('index', [
             'detailrent' => $detailrent,
           // 'desRoom' => $desRoom,
        ]);
    }

 }