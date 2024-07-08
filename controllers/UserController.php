<?php

namespace app\controllers;

use yii\rest\ActiveController;
use app\models\User;

/**
 * UserController implements CRUD actions for User model.
 */
class UserController extends ActiveController
{
    public $modelClass = 'app\models\User';

    public function behaviors()
    {
        $behaviors = parent::behaviors();

        unset($behaviors['authenticator']);

        return $behaviors;
    }

    public function actions()
    {
        $actions = parent::actions();

        return $actions;
    }
}
