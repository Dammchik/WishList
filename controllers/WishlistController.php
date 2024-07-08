<?php


namespace app\controllers;

use yii\rest\ActiveController;
use app\models\Wishlists;

/**
 * WishlistController implements the CRUD actions for Wishlists model for REST API.
 */
class WishlistController extends ActiveController
{
    public $modelClass = 'app\models\Wishlists';

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

