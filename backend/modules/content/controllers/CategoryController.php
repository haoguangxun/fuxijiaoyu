<?php

namespace backend\modules\content\controllers;

use backend\modules\content\models\Page;
use Yii;
use backend\modules\content\models\Category;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CategoryController implements the CRUD actions for Category model.
 */
class CategoryController extends Controller
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
                'class' => 'common\widgets\file_upload\UploadAction',     //这里扩展地址别写错
                'config' => [
                    'imagePathFormat' => "/upload/images/{yyyy}{mm}{dd}/{time}{rand:6}",
                ]
            ]
        ];
    }

    /**
     * Lists all Category models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model = new Category();
        $data = $model->getTreeList();

        return $this->render('index', [
            'model' => $model,
            'data' => $data
        ]);
    }

    /**
     * Creates a new Category model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Category();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Category model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Category model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Category model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Category the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Category::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


    /**
     * Creates a new Category model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreatePage()
    {
        $category = new Category();
        $page = new Page();

        if (!$category) {
            throw new NotFoundHttpException("The category was not found.");
        }
        if (!$page) {
            throw new NotFoundHttpException("The category has no page.");
        }

        if ($category->load(Yii::$app->request->post()) && $page->load(Yii::$app->request->post())) {
            $page->thumb = $category->pic;
            $page->keywords = $category->keywords;
            $page->description = $category->description;
            $page->updatetime = time();

            $isValid = $category->validate();
            $isValid = $page->validate() && $isValid;
            if ($isValid) {
                $category->save(false);
                $page->catid = $category->attributes['id'];
                $page->save(false);
                return $this->redirect(['index']);
            }
        }

        return $this->render('create_page', [
            'category' => $category,
            'page' => $page,
        ]);

    }

    /**
     * Updates an existing Category model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdatePage($id)
    {
        $category = $this->findModel($id);
        $page = Page::findOne($id);

        if (!$category) {
            throw new NotFoundHttpException("The category was not found.");
        }
        if (!$page) {
            throw new NotFoundHttpException("The category has no page.");
        }

        if ($category->load(Yii::$app->request->post()) && $page->load(Yii::$app->request->post())) {
            $page->thumb = $category->pic;
            $page->keywords = $category->keywords;
            $page->description = $category->description;
            $page->updatetime = time();

            $isValid = $category->validate();
            $isValid = $page->validate() && $isValid;
            if ($isValid) {
                $category->save(false);
                $page->save(false);
                return $this->redirect(['index']);
            }
        }

        return $this->render('update_page', [
            'category' => $category,
            'page' => $page,
        ]);

    }

    /**
     * Deletes an existing Category model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDeletePage($id)
    {
        Page::findOne($id)->delete();
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

}
