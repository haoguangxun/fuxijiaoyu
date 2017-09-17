<?php

namespace backend\modules\content\controllers;

use common\models\TeacherData;
use Yii;
use common\models\Teacher;
use backend\modules\content\models\search\TeacherSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TeacherController implements the CRUD actions for Teacher model.
 */
class TeacherController extends Controller
{
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

    public function actions()
    {
        return [
            'upload'=>[
                'class' => 'common\widgets\file_upload\UploadAction',
            ],
            'ueditor'=>[
                'class' => 'common\widgets\ueditor\UeditorAction',
            ]
        ];
    }

    /**
     * Lists all Teacher models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TeacherSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Teacher model.
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
     * Creates a new Teacher model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Teacher();
        $dataModel = new TeacherData();

        if (!$model) {
            throw new NotFoundHttpException("The news was not found.");
        }
        if (!$dataModel) {
            throw new NotFoundHttpException("The newsData has no page.");
        }

        if ($model->load(Yii::$app->request->post()) && $dataModel->load(Yii::$app->request->post())) {
            $model->addtime = time();
            $model->updatetime = time();

            $isValid = $model->validate();
            $isValid = $dataModel->validate() && $isValid;
            if ($isValid) {
                $model->save(false);
                $dataModel->id = $model->attributes['id'];
                $dataModel->save(false);
                return $this->redirect(['index']);
            }
        }

        return $this->render('create', [
            'model' => $model,
            'dataModel' => $dataModel,
        ]);
    }

    /**
     * Updates an existing Teacher model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $dataModel = TeacherData::findOne($id);

        if (!$model) {
            throw new NotFoundHttpException("The model was not found.");
        }
        if (!$dataModel) {
            throw new NotFoundHttpException("The newsData has no page.");
        }

        if ($model->load(Yii::$app->request->post()) && $dataModel->load(Yii::$app->request->post())) {
            $model->updatetime = time();

            $isValid = $model->validate();
            $isValid = $dataModel->validate() && $isValid;
            if ($isValid) {
                $model->save(false);
                $dataModel->save(false);
                return $this->redirect(['index']);
            }
        }

        return $this->render('update', [
            'model' => $model,
            'dataModel' => $dataModel,
        ]);
    }

    /**
     * Deletes an existing Teacher model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        TeacherData::findOne($id)->delete();
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Teacher model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Teacher the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Teacher::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
