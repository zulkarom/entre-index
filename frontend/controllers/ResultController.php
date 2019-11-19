<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\AccessControl;
use frontend\models\Page;
use backend\models\Customer;
use backend\models\Result;
use common\models\ResultPdf;
use common\models\PChart;

/**
 * Result controller
 */
class ResultController extends Controller
{
	private $total_page = 35;
	
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }
	
	public function actionPdf(){
		//generate chart
		$identifier = rand(1000000, 9999999);
		PChart::overallChart($identifier);
		PChart::mainChart($identifier);
		PChart::catChart(1,$identifier);
		PChart::catChart(2,$identifier);
		PChart::catChart(3,$identifier);
		
		$result = $this->findResultIdentity();
		$pdf = new ResultPdf;
		$pdf->image = $identifier;
		$pdf->result = $result;
		$pdf->generatePdf();
		
		//delete chart
		unlink('temp/chart-overall-'.$identifier.'.png');
		unlink('temp/chart-main-'.$identifier.'.png');
		unlink('temp/chart-1-cat-'.$identifier.'.png');
		unlink('temp/chart-2-cat-'.$identifier.'.png');
		unlink('temp/chart-3-cat-'.$identifier.'.png');
	}


    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
		$result = $this->findResultIdentity();
		$page = $this->findPageIdentity();
		if($page->curr_page < 16){
			$this->redirect('incomplete');
		}
		
        return $this->render('index', [
			'result' => $result,
		]);
    }
	
	public function actionIncomplete(){
		return $this->render('incomplete');
	}
	
	
	
	protected function findResultIdentity()
    {
		$id = Yii::$app->user->identity->id;
		$customer = Customer::findOne(['user_id' => $id]);
        if (($model = Result::findOne(['customer_id' => $customer->id ])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
	
	protected function findPageIdentity()
    {
		$id = Yii::$app->user->identity->id;
		$customer = Customer::findOne(['user_id' => $id]);
        if (($model = Page::findOne(['customer_id' => $customer->id ])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
	
	
	
	
}
