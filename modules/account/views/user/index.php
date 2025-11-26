<?php

use app\models\User;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\widgets\DetailView;
use yii\widgets\ListView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\modules\account\models\UserSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Личный кабинет';
$this->params['breadcrumbs'][] = $this->title;
$model = User::findOne(Yii::$app->user->id);
?>
<div class="user-index btn-primary col-md-5">
    <h2 class="text-center">Личный кабинет</h2>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            'surname',
            'patronymic',
            [
                'attribute' => 'email',
                'format' => 'html',
                'value' => "<div class='d-md-flex  justify-content-between'><div>"
                . $model->email
                . "</div>"
                . '<div>'
                . Html::a("Изменить", ['change', 'field' => 'email'], ['class' => "btn btn-primary"])
                . "</div>"
                . "</div>"
            ],
            [
                'attribute' => 'phone',
                'format' => 'html',
                'value' => "<div class='d-md-flex justify-content-between'>"
                . $model->phone
                . '<div>'
                . Html::a("Изменить", ['change', 'field' => 'phone'], ['class' => "btn btn-outline-success"])
                . "</div>"
                . "</div>"
            ],
            'role',
        ],
    ]) ?>

    <?=  Html::a('Просмотреть документы', ['/account/passport'], ['class' => "btn btn-outline-success"]) ?>

</div>