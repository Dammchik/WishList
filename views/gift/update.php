<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Gift $model */

$this->title = 'Update Gift: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Gifts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="gift-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
