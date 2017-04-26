<?php

namespace app\controllers;

use Yii;
use app\models\History;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use kartik\mpdf\Pdf;


class PrintBillController extends \yii\web\Controller
{
    public function actionIndex()
    {
    	
		$model = History::find()->where(['PaymentStatus' => '0'])->all();
        $Date = date('Y:m');
        $Date++;
		/*foreach ($model as $check =>$value) {
            $rental = History::find('Elec_Used')->where(['Apart_Id' => $value->Apart_Id])->andWhere(['Apart_Id' => $value->Apart_Id])->andWhere(['Cus_Id' => $value->Cus_Id])->one();
		}*/
			
		// $Payment= History::find('Elec_Used')->where(['Apart_Id' => $model->Apart_Id])->all();

        $content = $this->renderPartial('_preview', [
            'model' => $model,
        ]);

		$pdf = new Pdf([
            'mode' => Pdf::MODE_UTF8,

            // A4 paper format
            'format' => Pdf::FORMAT_A4,
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT,
            // // stream to browser inline
            //'destination' => Pdf::DEST_BROWSER,
             'destination' => Pdf::DEST_DOWNLOAD,
              'filename' => 'ใบเสร็จชำระเงิน' .$Date,
            // your html content input
            'content' => $content,
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            // any css to be embedded if required
            'cssInline' => '.kv-heading-1{font-size:24px}', 
            //'cssFile' => 'web/css/pdf.css',
            // any css to be embedded if required
            //'cssInline' => '.bd{border:1.5px solid; text-align: center;} .ar{text-align:right} .imgbd{border:1px solid}',

            // set mPDF properties on the fly
            'options' => ['title' => 'ใบเสร็จชำระเงิน'],
            // call mPDF methods on the fly
            'methods' => [
                //'SetHeader'=>[''],
                //'SetFooter'=>['{PAGENO}'],
            ]
        ]);
    
        // return the pdf output as per the destination setting
        return $pdf->render();

    }
 
}
