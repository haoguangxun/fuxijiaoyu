<?php
namespace backend\modules\admin\controllers;

use Yii;
use backend\modules\admin\models\search\Assignment as AssignmentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * AssignmentController implements the CRUD actions for Assignment model.
 *
 * @author Misbahul D Munir <misbahuldmunir@gmail.com>
 * @since 1.0
 */
class AssignmentController extends Controller
{
    public $userClassName;
    public $idField = 'id';
    public $usernameField = 'username';
    public $fullnameField;
    public $searchClass;
    public $extraColumns = [];

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        if ($this->userClassName === null) {
            $this->userClassName = Yii::$app->getUser()->identityClass;
            $this->userClassName = $this->userClassName ? : 'backend\modules\admin\models\User';
        }
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'assign' => ['post'],
                    'assign' => ['post'],
                    'revoke' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Assignment models.
     * 分配列表
     * @return mixed
     */
    public function actionIndex()
    {

        if ($this->searchClass === null) {
            $searchModel = new AssignmentSearch;
            $dataProvider = $searchModel->search(Yii::$app->getRequest()->getQueryParams(), $this->userClassName, $this->usernameField);
        } else {
            $class = $this->searchClass;
            $searchModel = new $class;
            $dataProvider = $searchModel->search(Yii::$app->getRequest()->getQueryParams());
        }
        return $this->render('index', [
                'dataProvider' => $dataProvider,
                'searchModel' => $searchModel,
                'idField' => $this->idField,
                'usernameField' => $this->usernameField,
                'extraColumns' => $this->extraColumns,
        ]);
    }

    /**
     * Displays a single Assignment model.
     * 显示一个分配用户并进行分配角色
     * @param  integer $id
     * @return mixed
     */
    public function actionView($id)
    {
         // 用户1 不允许操作
        if ($id == 1) {
            exit;
        }
        
        $model = $this->findModel($id);
        if ($id !=1 && $model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            $roles = Yii::$app->authManager->getRoles();
            $roles = ArrayHelper::map($roles, 'id', 'description');
            
            return $this->render('view', [
                'model' => $model,
                'usernameField' => $this->usernameField,
                'fullnameField' => $this->fullnameField,
                'roles' => $roles
            ]);
            
        }
        
    }


    
    /**
     * Finds the Assignment model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param  integer $id
     * @return Assignment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        $class = $this->userClassName;
        if (($model = $class::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
