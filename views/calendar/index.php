<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Settings';
$this->params['breadcrumbs'][] = $this->title;
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
	'@web/js/calendar_edit.js',
		['depends' => [\yii\web\JqueryAsset::className()]]
	);
$this->registerCssFile('https://unpkg.com/js-year-calendar@latest/dist/js-year-calendar.min.css');
$this->registerCssFile('https://unpkg.com/bootstrap-datepicker@1.8.0/dist/css/bootstrap-datepicker.standalone.min.css');

?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (Yii::$app->session->hasFlash('objectFormSubmitted')): ?>

        <div class="alert alert-success">Informacion guardada</div>

    <?php endif; ?>

			<?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

        <div class="row">
            <div class="col-xs-4">
							<?= $form->field($model, 'ciudad')->textInput(['autofocus' => true]) ?>
            </div>
            <div class="col-xs-4">
							<?= $form->field($model, 'region')->textInput() ?>
            </div>
            <div class="col-xs-4">
							<?= $form->field($model, 'pais')->textInput() ?>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-2">
							<div class="c_title">Temporadas</div>
            </div>
            <div class="col-xs-2">
							<center><b>BAJAS</b></center>
							<div class="temporadas_bajas"></div>
            </div>
            <div class="col-xs-2">
							<center><b>MEDIA BAJA</b></center>
							<div class="temporadas_mbaja"></div>
            </div>
            <div class="col-xs-2">
							<center><b>MEDIA</b></center>
							<div class="temporadas_media"></div>
            </div>
            <div class="col-xs-2">
							<center><b>MEDIA ALTA</b></center>
							<div class="temporadas_malta"></div>
            </div>
            <div class="col-xs-2">
							<center><b>ALTA</b></center>
							<div class="temporadas_alta"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-2"></div>
            <div class="col-xs-10">
							<center style="margin-top:20px;"><b>PORCENTAJE DE INCREMENTO O DECREMENTO POR TEMPORADA</b></center>
						</div>
				</div>
        <div class="row">
            <div class="col-xs-2">
            </div>
            <div class="col-xs-2">
							<?= $form->field($model, 'temporadas_bajas_percent')->textInput()->label('') ?>
            </div>
            <div class="col-xs-2">
							<?= $form->field($model, 'temporadas_mbaja_percent')->textInput()->label('') ?>
            </div>
            <div class="col-xs-2">
							<?= $form->field($model, 'temporadas_media_percent')->textInput()->label('') ?>
            </div>
            <div class="col-xs-2">
							<?= $form->field($model, 'temporadas_malta_percent')->textInput()->label('') ?>
            </div>
            <div class="col-xs-2">
							<?= $form->field($model, 'temporadas_alta_percent')->textInput()->label('') ?>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-2">
							<div class="c_title">Festivos</div>
            </div>
            <div class="col-xs-2">
							<center><b>NORMAL</b></center>
							<div class="festivos_normal"></div>
            </div>
            <div class="col-xs-2">
							<center><b>MEDIO</b></center>
							<div class="festivos_medio"></div>
            </div>
            <div class="col-xs-2">
							<center><b>ALTO</b></center>
							<div class="festivos_alto"></div>
            </div>
            <div class="col-xs-2"></div>
            <div class="col-xs-2"></div>
        </div>
        <div class="row">
            <div class="col-xs-2"></div>
            <div class="col-xs-6">
							<center style="margin-top:20px;"><b>PORCENTAJE DE INCREMENTO O DECREMENTO POR FESTIVO</b></center>
						</div>
            <div class="col-xs-2"></div>
            <div class="col-xs-2"></div>
				</div>
        <div class="row">
            <div class="col-xs-2">
            </div>
            <div class="col-xs-2">
							<?= $form->field($model, 'festivos_normal_percent')->textInput()->label('') ?>
            </div>
            <div class="col-xs-2">
							<?= $form->field($model, 'festivos_medio_percent')->textInput()->label('') ?>
            </div>
            <div class="col-xs-2">
							<?= $form->field($model, 'festivos_alto_percent')->textInput()->label('') ?>
            </div>
            <div class="col-xs-2"></div>
            <div class="col-xs-2"></div>
        </div>

        <div class="row">
            <div class="col-xs-2">
							<div class="c_title">Eventos</div>
            </div>
            <div class="col-xs-2">
							<center><b>NORMAL</b></center>
							<div class="eventos_normal"></div>
            </div>
            <div class="col-xs-2">
							<center><b>MEDIO</b></center>
							<div class="eventos_medio"></div>
            </div>
            <div class="col-xs-2">
							<center><b>ALTO</b></center>
							<div class="eventos_alto"></div>
            </div>
            <div class="col-xs-2"></div>
            <div class="col-xs-2"></div>
        </div>
        <div class="row">
            <div class="col-xs-2"></div>
            <div class="col-xs-6">
							<center style="margin-top:20px;"><b>PORCENTAJE DE INCREMENTO O DECREMENTO POR EVENTO</b></center>
						</div>
            <div class="col-xs-2"></div>
            <div class="col-xs-2"></div>
				</div>
        <div class="row">
            <div class="col-xs-2">
            </div>
            <div class="col-xs-2">
							<?= $form->field($model, 'eventos_normal_percent')->textInput()->label('') ?>
            </div>
            <div class="col-xs-2">
							<?= $form->field($model, 'eventos_medio_percent')->textInput()->label('') ?>
            </div>
            <div class="col-xs-2">
							<?= $form->field($model, 'eventos_alto_percent')->textInput()->label('') ?>
            </div>
            <div class="col-xs-2"></div>
            <div class="col-xs-2"></div>
        </div>

        <div class="row">
            <div class="col-xs-2">
							<div class="c_title">Precio</div>
            </div>
            <div class="col-xs-10">
							<?= $form->field($model, 'price')->textInput() ?>
            </div>
        </div>

				<div style="display:none;"><?= $form->field($model, 'days')->textArea() ?></div>
				<div id="calendar"></div>

        <div class="row">
					<div class="form-group">
						<?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
					</div>
				</div>

			<?php ActiveForm::end(); ?>

</div>

<div class="modal fade" id="event-modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Eventos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="event-index">
        <form class="form-horizontal">
          <div class="form-group row">
            <label for="event-name" class="col-sm-4 control-label">Tipo de Descuento</label>
            <div class="col-sm-8">
              <select id="descuento" name="event-descuento" type="text" class="form-control">
								<option value=""></option>
								<optgroup label="Temporada">
									<option value="t_baja">Baja</option>
									<option value="t_media_baja">Media baja</option>
									<option value="t_media">Media</option>
									<option value="t_media_alta">Media alta</option>
									<option value="t_alta">Alta</option>
								</optgroup>
								<optgroup label="Festivo">
									<option value="f_normal">Normal</option>
									<option value="f_medio">Medio</option>
									<option value="f_alto">Alto</option>
								</optgroup>
								<optgroup label="Evento">
									<option value="e_normal">Normal</option>
									<option value="e_medio">Medio</option>
									<option value="e_alto">Alto</option>
								</optgroup>
							</select>
            </div>
          </div>
          <div class="form-group row">
            <label for="min-date" class="col-sm-4 control-label">Dates</label>
            <div class="col-sm-8">
              <div class="input-group input-daterange" data-provide="datepicker">
                <input id="min-date" name="event-start-date" type="text" class="form-control" style="width:100px;">
								<div style="float:left;margin:5px 10px;"> - </div>
                <input name="event-end-date" type="text" class="form-control" style="width:100px;">
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" id="save-event">
          Save
        </button>
      </div>
    </div>
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
</script>

<div id="context-menu">
</div>
