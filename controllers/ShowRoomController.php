<?php

namespace app\controllers;

use yii\web\Controller;
use yii\data\Pagination;
use app\models\Room;
use yii\db\Query;
use yii\models\Rental;
use app\models\Booking;

class ShowRoomController extends \yii\web\Controller
{
  
  
      public function actionIndex()
    {
        $query = Room::find();
        $rooms = $query->orderBy('Room_Id')->all();
		$numFloor = $query->select('Floor')->distinct()->orderBy('Floor')->all();
        // num of floor this assign 10 floors
        //$desRoom = "eieieiei";
        $desRoom = $query->JoinWith('rentals')->JoinWith('roomtype')->joinWith('bookings')->all();
        return $this->render('index', [
            'rooms' => $rooms,
            'numFloor' => $numFloor,
            'desRoom' => $desRoom
        ]);
    }

    public function actionDetail($Apart_Id, $Room_Id){
        echo "eieieiieie"."   ". $Apart_Id ."  ". $Room_Id;

        $query =Booking::find()->joinWith('customer')->one();

          return $this->render('index', [
            'query' => $query,
       
        ]);
    }




}
