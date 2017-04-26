<?php

namespace app\controllers;

use Yii;
use app\models\History;
use app\models\Rental;
use app\models\RentalSearch;
use yii\db\Query;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use kartik\mpdf\Pdf;
use yii\helpers\Url;
use app\models\PaymentSearch;


class PrintPaymentController extends \yii\web\Controller
{
    public function actionIndex()
    {
    	$Date = date('Y:m');
        $Date++;
		//$model = Rental::find()->where(['Status' => '2'])->all();
        

		/*foreach ($model as $check =>$value) {
            $rental = History::find('Elec_Used')->where(['Apart_Id' => $value->Apart_Id])->andWhere(['Apart_Id' => $value->Apart_Id])->andWhere(['Cus_Id' => $value->Cus_Id])->one();
		}*/
			
		// $Payment= History::find('Elec_Used')->where(['Apart_Id' => $model->Apart_Id])->all();

        $query = new Query;
        $query  ->select('*')
                ->from('Rental')
                ->innerJoin('Customer', 'Customer.Cus_Id = Rental.Cus_Id')
                ->innerJoin('History', 'History.Cus_Id = Rental.Cus_Id AND History.Room_Id = Rental.Room_Id' )
                ->innerJoin('Roomtype', 'Roomtype.Room_Id = Rental.Room_Id')
                ->where('Rental.Status=2 AND History.Room_Id = Rental.Room_Id AND History.Cus_Id = Rental.Cus_Id' )
                ->groupBy(['Rental.Room_Id'])
                ->orderBy(['Rental.Room_Id' => SORT_ASC]);

        $command = $query->createCommand();
        $data = $command->queryAll();
        $model = $data;
      
        $rental = Rental::find()->where(["Status" => '2'])->all();
        $rental_count = 0 ;
        foreach ($rental as $key => $value) {
            $rental_count++;
            echo $rental_count;
            echo "rt";
        }
        $model1 = History::find()->where(["PaymentStatus" => '0'])->all();
        $count = 0;
        foreach ($model1 as $key => $value) {
            $count++;
            echo $count;
        }

        if ($count === $rental_count) {
            
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
                  'filename' => 'ใบวางบิล' .$Date,
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
                'options' => ['title' => 'ใบวางบิล'],
                // call mPDF methods on the fly
                'methods' => [
                    //'SetHeader'=>[''],
                    //'SetFooter'=>['{PAGENO}'],
                ]
            ]);
        
            // return the pdf output as per the destination setting

            return $pdf->render();
        }
        else
        {
            $searchModel = new PaymentSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('../payment/index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
                'payment_alert'=>'1',
                ]);
            
           
           
        }

    }
 
}
// echo "
 //     <script>
            //         alert('Hello WOrld');
            //     </script>

            //  ";