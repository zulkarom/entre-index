<?php

namespace backend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\AccessControl;
use common\models\PChart;

class ChartController extends Controller
{

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

	public function actionOverallChart($id = 0){
		return PChart::overallChart($id);
	}
	
	public function actionMainChart($id = 0){
		return PChart::mainChart($id);
	}
	
	public function actionCatChart($id, $prime){
		return PChart::catChart($id, $prime);
	}
	
	public function innocapchart($id = 0){
		$this->View->renderChart('chart/innocap',
		array(
		'qarray' => LikertModel::qarray_sum(),
		'innocap_result' => ResultModel::innocap_result($id),
		'innocap_benc' => ResultModel::innocap_benc()
		));
	}
	
	public function innocomchart($id = 0){
		$this->View->renderChart('chart/innocom',
		array(
		'qarray' => LikertModel::qarray_sum(),
		'innocom_result' => ResultModel::innocom_result($id),
		'innocom_benc' => ResultModel::innocom_benc()
		));
	}
	
	public function outputchart($id = 0){
		$this->View->renderChart('chart/output',
		array(
		'qarray' => LikertModel::qarray_sum(),
		'output_result' => ResultModel::output_result($id),
		'output_benc' => ResultModel::output_benc()
		));
	}
	
	public function bar($item="", $id = 0){
		$this->View->renderChart('chart/bar',
		array(
		're' => LikertModel::qarray_items_result($item, $id)
		));
	}
	
	
	
	

}
