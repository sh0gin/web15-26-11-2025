<?php

use app\models\DocType;
use app\models\Passport;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\widgets\DetailView;
use yii\widgets\ListView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\modules\account\models\PassportSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Мои документы';
$this->params['breadcrumbs'][] = $this->title;
$model = Passport::findAll(['user_id' => Yii::$app->user->id]);
?>
<div class="passport-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= 
     ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'item'],
        'itemView' => 'item',
    ]) 

    // DetailView::widget([
    //     'model' => $model,
    //     'attributes' => [
    //         [
    //             'label' => 'Тип документа',
    //             'value' => DocType::getTitleDocument($model->passport_type_id),
    //         ],
    //         'passport_expire',
    //         'passport_number',
    //         [
    //             'attribute' => 'Другой документ',
    //             'visible' => (bool)$model?->passport_another,
    //             'value' => 'passport_another'
    //         ],
    //         [
    //             'label' => 'Статус',
    //             'value' => $model->passport_expire >= date('Y-m-d') ? 'Документ действителен' : "Документ просрочен"
    //         ]
    //     ],
    // ]) 
    ?>

    <?= Html::a("Добавить новый документ", ['create'], ['class' =>  'btn btn-outline-success']) ?>

</div>