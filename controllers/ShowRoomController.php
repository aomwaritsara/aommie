<?php

namespace app\controllers;

use yii\web\Controller;
use yii\data\Pagination;
use app\models\Room;
use app\models\RoomSearch;
use app\models\Roomtype;
use yii\db\Query;
use app\models\Rental;
use app\models\Booking;


class ShowRoomController extends \yii\web\Controller
{
  
  
      public function actionIndex()
    {

         $query = new Query();
        // $rooms = $query->orderBy('Room_Id')->all();
        $rooms = $query
         ->select([  'room.Room_Id'
                            ,'room.Name AS Name'
                            , 'room.Status AS Status'
                            , 'room.Floor AS Floor'
                            , 'roomtype.type AS Type'
                            , 'roomtype.Price AS Price'
                            , 'rental.NumCus AS NumCus'                                                            
                            , 'customer.Fname AS Fname'
                            , 'customer.Lname AS Lname' 
                            , 'Deposit'                           
                 ])  
                 ->from('room')         
                 ->leftJoin('roomtype', 'roomtype.Room_Id = room.Room_Id')               
                 ->leftJoin('rental', 'rental.Room_Id = roomtype.Room_Id AND rental.Apart_Id = roomtype.Apart_Id')                                        
                 ->leftJoin('customer', 'customer.Cus_Id = rental.Cus_Id')                     
                 ->createCommand()                                                      
                 ->queryAll();
                //  var_dump($rooms);
		$numFloor = Room::find()->select('Floor')->distinct()->orderBy('Floor')->all();
        // num of floor this assign 10 floors
        //$desRoom = "eieieiei";
        // $desRoom = Room::find()->JoinWith('rentals')->JoinWith('roomtype')->joinWith('bookings')->one();
       // echo $desRoom->rentals->Cus_Id;
        return $this->render('index', [
            'rooms' => $rooms,
            'numFloor' => $numFloor,
            // 'desRoom' => $desRoom
        ]);
    }

    // public function actionDetail($Apart_Id, $Room_Id){
    //     echo "eieieiieie"."   ". $Apart_Id ."  ". $Room_Id;

    //     $query =Booking::find()->joinWith('customer')->one();

    //       return $this->render('index', [
    //         'query' => $query,
       
    //     ]);
    // }


   



}
