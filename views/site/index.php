<?php

use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';

$this->registerJsFile(
	'https://unpkg.com/js-year-calendar@latest/dist/js-year-calendar.min.js',
		['depends' => [\yii\web\JqueryAsset::className()]]
	);
$this->registerJsFile(
	'https://unpkg.com/popper.js@1.14.7/dist/umd/popper.min.js',
		['depends' => [\yii\web\JqueryAsset::className()]]
	);
$this->registerJsFile(
	'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js',
		['depends' => [\yii\web\JqueryAsset::className()]]
	);
$this->registerJsFile(
	'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js',
		['depends' => [\yii\web\JqueryAsset::className()]]
	);
$this->registerJsFile(
	'@web/js/calendar_show.js',
		['depends' => [\yii\web\JqueryAsset::className()]]
	);
$this->registerCssFile('https://unpkg.com/js-year-calendar@latest/dist/js-year-calendar.min.css');
$this->registerCssFile('https://unpkg.com/bootstrap-datepicker@1.8.0/dist/css/bootstrap-datepicker.standalone.min.css');

?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Bienvenido!</h1>
        <p class="lead">Abajo en el calendario puedes ver nuestros precios</p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-xs-4">
							Ciudad: <b><?= Html::encode($model->ciudad) ?></b>
            </div>
            <div class="col-xs-4">
							Region: <b><?= Html::encode($model->region) ?></b>
            </div>
            <div class="col-xs-4">
							Pais: <b><?= Html::encode($model->pais) ?></b>
            </div>
        </div>

				<div style="display:none;" id="days"><?= $model->days ?></div>
				<div id="calendar"></div>

    </div>
</div>

<script>
let descuentos = {
										t_baja: {name: 'Temporada Baja', color: '#ff0000', percent: '<?=$model->temporadas_bajas_percent;?>'},
										t_media_baja: {name: 'Tempodara Media baja', color: '#bc6004', percent: '<?=$model->temporadas_mbaja_percent;?>'},
										t_media: {name: 'Temporada Media', color: '#ff3300', percent: '<?=$model->temporadas_media_percent;?>'},
										t_media_alta: {name: 'Temporada Media alta', color: '#ffff66', percent: '<?=$model->temporadas_malta_percent;?>'},
										t_alta: {name: 'Temporada Alta', color: '#ffff00', percent: '<?=$model->temporadas_alta_percent;?>'},
										f_normal: {name: 'Festivo Normal', color: '#abe9ff', percent: '<?=$model->festivos_normal_percent;?>'},
										f_medio: {name: 'Festivo Medio', color: '#00b0f0', percent: '<?=$model->festivos_medio_percent;?>'},
										f_alto: {name: 'Festivo Alto', color: '#0070c0', percent: '<?=$model->festivos_alto_percent;?>'},
										e_normal: {name: 'Evento Normal', color: '#99ff66', percent: '<?=$model->eventos_normal_percent;?>'},
										e_medio: {name: 'Evento Medio', color: '#92d050', percent: '<?=$model->eventos_medio_percent;?>'},
										e_alto: {name: 'Evento Alto', color: '#00ff00', percent: '<?=$model->eventos_alto_percent;?>'}
									};

let objectPrice = parseFloat('<?= $model->price ?>');
</script>
