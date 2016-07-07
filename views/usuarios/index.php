<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\buscaUsuarios */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usuarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuarios-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Usuarios', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_usuario',
            'nombre',
            'id_patrocinador',
            'estado',
            'apellidos',
            // 'direccion',
            // 'telefono',
            // 'llave_publica',
            [
                'attribute'=>'id_sexo',
                'value'=> function ($model) {
                        $sexo=  \app\models\Sexo::findOne($model->id_sexo);
                        return $sexo->nombre;
                },
                'filter'=> \yii\helpers\ArrayHelper::map(\app\models\Sexo::find()->all(), 'id_sexo', 'nombre'),
            ] ,

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
