<?php

namespace app\controllers;

use yii\web\Controller;
use yii\data\Pagination;
use app\models\Room;
use app\models\Roomtype;
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
         
       // $desRoom = $query->joinWith('rentals')->joinWith('roomtype')->joinWith('bookings')->all();

         // $desRoom = $query->JoinWith('rentals')->JoinWith('roomtype')->joinWith('bookings')->all();
        // $Roomt = $query->select('Type')->all();
        
        return $this->render('index', [
            'rooms' => $rooms,
            'numFloor' => $numFloor,
           // 'desRoom' => $desRoom,
        ]);
    }

   



}
