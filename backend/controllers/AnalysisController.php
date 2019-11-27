<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use backend\models\QuestionPrime;
use backend\models\QuestionMain;

/**
 * ResultController implements the CRUD actions for Result model.
 */
class AnalysisController extends Controller
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


    /**
     * Lists all Result models.
     * @return mixed
     */
    public function actionIndex()
    {
        $primes = QuestionPrime::find()->all();

        return $this->render('index', [
            'primes' => $primes,
        ]);
    }
	
	public function actionUniversity($main, $s = null)
    {
         $qmain = QuestionMain::findOne($main);

      return $this->render('university', [
            'qmain' => $qmain,
			'sort' => $s
        ]);
    }

    protected function findModel($id)
    {
        if (($model = Result::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
