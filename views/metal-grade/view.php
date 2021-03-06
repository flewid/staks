<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\MetalGrade */

$this->title = $model->metalGrade;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Grades'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="metal-grade-view">

    <?php
    if(Yii::$app->user->can('updateOwnModel', ['model' => $model]))
    {
        ?>
        <p class="float-right pClassInView" >
            <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->ID], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->ID], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ]) ?>
        </p>
        <?php
    }
    ?>

    <div class="clear"></div>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID',
            'metalGrade',
            'metalGradeDescription',
            'metalGradeScale',
            [
                'attribute'=>'author_id',
                'value'=>$model->author->name,
                'visible'=>Yii::$app->user->identity->role==\app\models\User::ROLE_ADMIN,
            ],
            [
                'attribute'=>'default',
                'format'=>'boolean',
                'visible'=>Yii::$app->user->identity->role==\app\models\User::ROLE_ADMIN,
            ]
        ],
    ]) ?>

</div>
