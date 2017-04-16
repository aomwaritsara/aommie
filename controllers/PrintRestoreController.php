<?php

namespace app\controllers;

use Yii;
use app\models\Rental;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use kartik\mpdf\Pdf;


class PrintRestoreController extends \yii\web\Controller
{
    public function actionIndex()
    {
      //echo "string";
    // $model = Rental::find()->where(['Status' => '2'])->all();

    //  $Date = date('Y:m:d');
    // /*foreach ($model as $check =>$value) {
    //         $rental = History::find('Elec_Used')->where(['Apart_Id' => $value->Apart_Id])->andWhere(['Apart_Id' => $value->Apart_Id])->andWhere(['Cus_Id' => $value->Cus_Id])->one();
    // }*/
      
    // // $Payment= History::find('Elec_Used')->where(['Apart_Id' => $model->Apart_Id])->all();

    //     $content = $this->renderPartial('_preview', [
    //         'model' => $model,
    //     ]);

    // $pdf = new Pdf([
    //         'mode' => Pdf::MODE_UTF8,
    //    // $mpdf->Output('MyPDF.pdf', 'D');
    //         // A4 paper format
    //         'format' => Pdf::FORMAT_A4,
    //         // portrait orientation
    //         'orientation' => Pdf::ORIENT_PORTRAIT,
    //         // // stream to browser inline
    //        //'destination' => Pdf::DEST_BROWSER,
    //         'destination' => Pdf::DEST_DOWNLOAD,
    //           //'filename' => 'ใบเสร็จการคืนห้องพัก '.$Room_Id .'วันที่'.$Date,
    //         // your html content input
    //         'content' => $content,
    //         // format content from your own css file if needed or use the
    //         // enhanced bootstrap css built by Krajee for mPDF formatting
    //         'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
    //         // any css to be embedded if required
    //         'cssInline' => '.kv-heading-1{font-size:24px}', 
    //         //'cssFile' => 'web/css/pdf.css',
    //         // any css to be embedded if required
    //         //'cssInline' => '.bd{border:1.5px solid; text-align: center;} .ar{text-align:right} .imgbd{border:1px solid}',

    //         // set mPDF properties on the fly
    //         'options' => ['title' => 'ใบเสร็จการคืนห้องพัก'],
    //         // call mPDF methods on the fly
    //         'methods' => [
    //             //'SetHeader'=>[''],
    //             //'SetFooter'=>['{PAGENO}'],
    //         ]
    //     ]);
    
    //     // return the pdf output as per the destination setting
    //     return $pdf->render();

    }
 
}
