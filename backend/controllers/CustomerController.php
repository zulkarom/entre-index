<?php

namespace backend\controllers;

use Yii;
use backend\models\Customer;
use backend\models\BizTypes;
use common\models\User;
use common\models\UserToken;
use backend\models\CustomerSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\db\Expression;
use yii\filters\AccessControl;
//use yii\db\Connection;
use backend\models\QuestionMain;
use backend\models\Result;
use common\models\ResultPdf;
use common\models\PChart;
use frontend\models\Page;

/**
 * CustomerController implements the CRUD actions for Customer model.
 */
class CustomerController extends Controller
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
     * Lists all Customer models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CustomerSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Customer model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
		$result = $this->findResult($id);
		$page = $this->findPage($id);
        return $this->render('view', [
            'result' => $result,
			'page' => $page
        ]);
    }
	
	public function actionDelete($id){
		$customer = $this->findModel($id);
		$page = Page::findOne(['customer_id' => $customer->id]);
		$page->delete();
		$result = Result::findOne(['customer_id' => $customer->id]);
		$result->delete();
		$user = $customer->user;
		$user->delete();
		$customer->delete();
		Yii::$app->session->addFlash('success', "The user deleted.");
		return $this->redirect(['index']);
		//delete customer
		//result
		//user
		//page
		
	}
	
	public function actionPdf($id){
		//generate chart
		$model = $this->findCustomerUser($id);
		$result = $model->result;
		$result_id = $result->id;
		
		$identifier = rand(1000000, 9999999);
		PChart::overallChart($result_id, $identifier);
		PChart::mainChart($result_id, $identifier);
		PChart::catChart($result_id, 1,$identifier);
		PChart::catChart($result_id, 2,$identifier);
		PChart::catChart($result_id, 3,$identifier);
		
		
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
     * Displays a single Customer model.
     * @param integer $id
     * @return mixed
     */
    public function actionSale($id)
    {
		$model = $this->findModel($id);
		
		if($model->load(Yii::$app->request->post())){
			$model->sale_at = time();
			$model->updated_at = time();
			if($model->save()){
				$page = $model->page;
				$page->scenario = 'answer';
				$page->curr_page = $model->currpage;
				if(!$page->save()){
					$page->flashError();
				}
				Yii::$app->session->addFlash('success', "User Setting Updated.");
				return $this->redirect('index');
				
				
			}
		}
		
		$model->scenario = 'sale';
		
        return $this->render('sale', [
            'model' => $model,
        ]);
    }
	
	/**
     * Displays a single Customer model.
     * @param integer $id
     * @return mixed
     */
    public function actionQuestion($id)
    {
		$model = $this->findModel($id);
		
		if($model->page->load(Yii::$app->request->post())){
			$model->scenario = 'progress';
			$model->updated_at = time();
			if($model->save() && $model->page->save()){
				Yii::$app->session->addFlash('success', "The progress has been successfully changed.");
				return $this->redirect('index');
			}
		}
		
		
		
        return $this->render('question', [
            'model' => $model,
        ]);
    }
	
	/**
     * Displays question result.
     * @param integer $id
     * @return mixed
     */
    public function actionResult($id)
    {
		$model = $this->findModel($id);

		
        return $this->render('result', [
            'model' => $model,
			'quest' => QuestionMain::find()->all(),
			'result' => Result::findOne(['customer_id' => $id ])
        ]);
    }

    /**
     * Creates a new Customer model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $show_form = false;
		$customer = new Customer();
		$user = new User();
		$user->scenario = 'create';
        if ($customer->load(Yii::$app->request->post()) && $user->load(Yii::$app->request->post())) {
			
			$user->setPassword($user->rawPassword);
			$user->created_at = new Expression('NOW()');
			//print_r($user);
			//die();
			if($user->save()){
				$customer->user_id = $user->id;
				if($customer->save()){
					return $this->redirect(['view', 'id' => $customer->id]);
				}else{
					if($customer->errors){
					foreach($customer->errors as $err){
						Yii::$app->session->setFlash('danger', $err);
					}
				}
					$show_form = true;
				}
			}else{
				if($user->errors){
					foreach($user->errors as $err){
						Yii::$app->session->setFlash('danger', $err);
					}
				}
				
				
				$show_form = true;
			}
			//$user_id = Yii::$app->db->getLastInsertedID();

        } else {
			$show_form = true;
        }
		
		if($show_form){
			 return $this->render('create', [
                'customer' => $customer,
				'user' => $user
            ]);
		}
    }

    /**
     * Updates an existing Customer model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    /* public function actionUpdate($id)
    {
        $customer = $this->findModel($id);
		$user = $this->findUser($customer->user_id);
		$user->scenario = 'update';
		$user->updated_at = new Expression('NOW()');

        if ($customer->load(Yii::$app->request->post()) && $customer->save() && $user->load(Yii::$app->request->post()) && $user->save()) {
            return $this->redirect(['view', 'id' => $customer->id]);
        } else {
            return $this->render('update', [
                'customer' => $customer,
				'user' => $user,
            ]);
        }
    } */

    /**
     * Deletes an existing Customer model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    /* public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    } */

    /**
     * Finds the Customer model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Customer the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Customer::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
	
	protected function findUser($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
	
	
	protected function findResult($id)
    {
        if (($model = Result::findOne(['customer_id' => $id ])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
	
	protected function findCustomerUser($id)
    {
        if (($model = Customer::findOne(['user_id' => $id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
	
	protected function findPage($id)
    {
        if (($model = Page::findOne(['customer_id' => $id ])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
	
	public function actionLoginAs($id)
    {
		$token = new UserToken;
		$token->user_id = $id;
		$token->token = Yii::$app->security->generateRandomString();
		$token->created_at = time();
		
		if($token->save()){
			return $this->redirect(Yii::$app->urlManager->createUrl('./../site/customer-login?id='.$id.'&token='.$token->token));
		}
    }
	
}
