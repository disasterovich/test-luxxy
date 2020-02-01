<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\BookSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Books';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Book', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'number_of_page',
            'release_year',

            [
                'class' => 'yii\grid\ActionColumn',
				'template' => '{view} {update} {delete}',
				'buttons' => [
					'view' => function ($url, $model) {
						return Html::a('<i class="fas fa-eye"></i>', $url, [
							'title' => 'View',
						]);
					},
					'update' => function ($url, $model) {
						return Html::a('<i class="fas fa-edit"></i></span>', $url, [
							'title' => 'Update',
						]);
					},
					'delete' => function ($url, $model) {
						return Html::a('<i class="fas fa-trash"></i>', $url, [
							'title' => 'Delete',
							'data' => [
								'method' => 'post',
								'confirm' =>'Are you sure you want to delete this item?',
							]
						]);
					},
				],
            ],
        ],
    ]); ?>


</div>
