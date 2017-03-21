<?php

namespace app\controllers;
use yii\db\Query;
use yii\web\Controller;
use yii\data\Pagination;
use app\models\Customer;
use app\models\Rental;
use app\models\Room;
use kartik\mpdf\Pdf;


class PrintrentController extends \yii\web\Controller
{
    public function actionIndex($Apart_Id ,$Room_Id ,$Cus_Id)
    {    
      $model =$this -> findModel($Apart_Id ,$Room_Id ,$Cus_Id);
       $model2 =$this -> findModel2($Cus_Id);

     $pdf = new Pdf([
            'mode' => Pdf::MODE_UTF8,

            // A4 paper format
            'format' => Pdf::FORMAT_A4,
            // portrait orientation
             'orientation' => Pdf::ORIENT_PORTRAIT,
            // // stream to browser inline
             'destination' => Pdf::DEST_BROWSER,
            // your html content input
            'content' => $this->renderPartial('index',['model'=>$model,'model2' => $model2,]),
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting
             'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
        // any css to be embedded if required
        'cssInline' => '.kv-heading-1{font-size:18px}', 
            //'cssFile' => 'web/css/pdf.css',
            // any css to be embedded if required
            //'cssInline' => '.bd{border:1.5px solid; text-align: center;} .ar{text-align:right} .imgbd{border:1px solid}',

            // set mPDF properties on the fly
            'options' => ['title' => 'สัญาญาเช่าห้องที่' .$Room_Id],
            // call mPDF methods on the fly
            'methods' => [
                //'SetHeader'=>[''],
                //'SetFooter'=>['{PAGENO}'],
            ]
        ]);
    
        // return the pdf output as per the destination setting
        return $pdf->render();
    }
       protected function findModel($Apart_Id, $Room_Id, $Cus_Id)
    {
        if (($model = Rental::findOne(['Apart_Id' => $Apart_Id, 'Room_Id' => $Room_Id, 'Cus_Id' => $Cus_Id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
     protected function findModel2($Cus_Id)
    {
        if (($model = Customer::findOne([ 'Cus_Id' => $Cus_Id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}


   
 
