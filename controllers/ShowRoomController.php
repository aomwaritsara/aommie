<?php

namespace app\controllers;

use yii\web\Controller;
use yii\data\Pagination;
use app\models\Room;
use yii\db\Query;

class ShowRoomController extends \yii\web\Controller
{
  
      public function actionIndex()
    {
        $query = Room::find();
        $rooms = $query->orderBy('Room_Id')->all();
		$numFloor = $query->select('Floor')->distinct()->orderBy('Floor')->all();
        // num of floor this assign 10 floors

        return $this->render('index', [
            'rooms' => $rooms,
            'numFloor' => $numFloor
        ]);
    }

}
