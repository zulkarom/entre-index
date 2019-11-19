<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\AccessControl;
use frontend\models\Page;
use frontend\models\Sale;
use backend\models\Customer;
use backend\models\Question;
use backend\models\QuestionCat;
use backend\models\QuestionProfile;
use backend\models\Result;

/**
 * Site controller
 */
class QuestionController extends Controller
{
	private $total_page = 16;
	
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
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
		if(!Sale::validateAccess()){
			return $this->render('no-access');
		}
		$page = $this->findPageIdentity();
		$curr = $page->curr_page;
		if($curr == 1){
			$this->redirect(['question/profile']);
		}else if($curr < $this->total_page){
			$this->redirect(['page', 'id' => $curr]);
		}else{
			$this->redirect(['question/page-finish']);
		}
		
        return $this->render('index');
    }
	
	public function actionProfile(){
		if(!Sale::validateAccess()){
			return $this->render('no-access');
		}
		//find latest page
		$page = $this->findPageIdentity();
		$model = $this->findResultIdentity();
		//get page last saved
		$curr = $page->curr_page;
		if($curr == 1){

			if ($model->load(Yii::$app->request->post())){
				if($model->save()){
					$page->curr_page = 2;
					$page->save();
					return $this->redirect('page');
					//Yii::$app->session->addFlash('success', "Data Successful");
				}
			}
			
			
			return $this->render('profile', [
				'question' => QuestionProfile::find()->orderBy('qorder ASC')->all(),
				'model' => $model
			]);
		}else{
			return $this->render('index');
		}
		
		
	}
	
	public function actionPage()
    {
		if(!Sale::validateAccess()){
			return $this->render('no-access');
		}
		//find latest page
		$page = $this->findPageIdentity();
		
		//get page last saved
		$curr = $page->curr_page;
		
		$field = 'p_' . $curr;
		//echo $curr;
		//die();
		$cat = $page->{$field};
		$category = QuestionCat::findOne($cat);
		$questions = Question::find()
				->where(['cat_id' => $cat]) 
				-> all();

				
		/* $arr = array();
		if($qarr){
			foreach($qarr as $q){
				$arr[] = 'q_' . $q;
			}
		} */

		$model = Result::find()
				->where(['customer_id' => $page->customer_id])
				->one();
			
		if ($model->load(Yii::$app->request->post())){
			
			if($model->save(false)){
				$next = 1 + $page->curr_page ;
				$page->curr_page = $next;
				if($page->save()){
					if($next == $this->total_page){
						$this->redirect(['question/page-finish']);
					}else{
						$this->redirect(['question/page']);
					}
					
				}else{
					$back = $page->curr_page - 1;
					$page->curr_page = $back;
				}
			}
		}
		
        return $this->render('page', [
			'page' => $page,
			'questions' => $questions,
			'model' => $model,
			'category' => $category
		]);
    }
	
	public function actionPageFinish(){
		return $this->render('finish');
	}
	
	public function actionNoAccess(){
		return $this->render('no-access');
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
	
	
	
	
}
