<?php

namespace app\controllers;

use yii\web\Controller;
use yii\data\Pagination;
use app\models\Room;
use app\models\RoomSearch;
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
        
            $query1 = new Query;
            $query1  ->select('*')  
                ->from('roomtype as rt')
                ->leftJoin('room', 'rt.Room_Id = room.Room_Id')
                ->orderBy('rt.Room_Id');
                
                
            $command = $query1->createCommand();
            $data = $command->queryAll();
            $detail = $data;
            //query is SELECT * FROM roomtype LEFT JOIN room ON roomtype.Room_Id = room.Room_Id



        return $this->render('index', [
            'rooms' => $rooms,
            'numFloor' => $numFloor,
            'detail' => $detail,
           // 'desRoom' => $desRoom,
        ]);
    }

   



}
