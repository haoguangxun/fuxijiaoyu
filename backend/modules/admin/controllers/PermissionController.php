<?php
namespace backend\modules\admin\controllers;

use Yii;
use backend\modules\admin\models\AdminPermission;
use backend\modules\admin\models\PermissionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\modules\admin\components\Helper;

/**
 * PermissionController implements the CRUD actions for AdminPermission model.
 */
class PermissionController extends Controller
{
    
    
    /**
     * @inheritdoc
     */
    public function labels()
    {
        return[
            'Item' => 'Permission',
            'Items' => 'Permissions',
        ];
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
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all AdminPermission models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PermissionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams); //Yii::$app->request->getQueryParams()

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AdminPermission model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new AdminPermission model.
     * 添加权限
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AdminPermission();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Helper::invalidate();//删除缓存
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing AdminPermission model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->updated_at = time();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Helper::invalidate();//删除缓存
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing AdminPermission model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        Helper::invalidate();//删除缓存
        
        return $this->redirect(['index']);
    }

    /**
     * Finds the AdminPermission model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return AdminPermission the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AdminPermission::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
