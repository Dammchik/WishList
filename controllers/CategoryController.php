<?php

namespace app\controllers;

use yii\rest\ActiveController;

/**
 * CategoryController implements the CRUD actions for Category model.
 */
class CategoryController extends ActiveController
{
    public $modelClass = 'app\models\Category';

    public function behaviors()
    {
        $behaviors = parent::behaviors();

        return $behaviors;
    }


    public function actions()
    {
        $actions = parent::actions();

        return $actions;
    }


}
