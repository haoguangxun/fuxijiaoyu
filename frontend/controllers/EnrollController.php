<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\EnrollForm;

/**
 * Enroll controller
 */
class EnrollController extends Controller
{

    /**
     * 报名
     */
    public function actionPost()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $model = new EnrollForm();
        if ($post = Yii::$app->request->post()) {
            if ($model->load($post)) {
                if ($model->validate()) {
                    if ($model->post()) {
                        return [
                            'code' => 10000,
                            'msg' => '提交成功！'
                        ];
                    } else {
                        return [
                            'code' => 10001,
                            'msg' => '提交失败，请重新提交！'
                        ];
                    }
                }else{
                    return [
                        'code' => 20000,
                        'msg' => '输入内容非法！'//$model->errors
                    ];
                }
            }
        }
    }

}
