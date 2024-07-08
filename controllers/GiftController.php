<?php

namespace app\controllers;

use Yii;
use yii\rest\ActiveController;
use yii\data\ActiveDataProvider;
use app\models\Gift;

/**
 * GiftController implements the CRUD actions for Gift model for REST API.
 */
class GiftController extends ActiveController
{
    public $modelClass = 'app\models\Gift';

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

