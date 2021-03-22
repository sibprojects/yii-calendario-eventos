<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ObjectForm extends Model
{
    public $ciudad;
    public $region;
    public $pais;
    public $days;
    public $price;

		public $temporadas_bajas_percent;
		public $temporadas_mbaja_percent;
		public $temporadas_media_percent;
		public $temporadas_malta_percent;
		public $temporadas_alta_percent;

		public $festivos_normal_percent;
		public $festivos_medio_percent;
		public $festivos_alto_percent;

		public $eventos_normal_percent;
		public $eventos_medio_percent;
		public $eventos_alto_percent;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['ciudad', 'region', 'pais'], 'required'],
            [['days'], 'string'],
            [['temporadas_bajas_percent','temporadas_mbaja_percent','temporadas_media_percent','temporadas_malta_percent','temporadas_alta_percent',
							'festivos_normal_percent','festivos_medio_percent','festivos_alto_percent',
							'eventos_normal_percent','eventos_medio_percent','eventos_alto_percent',
							'price'], 'integer'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'ciudad' => 'Ciudad',
            'region' => 'Region/Estado',
            'pais' => 'Pais',
            'price' => 'Precio para todos dias',
        ];
    }

    /**
     * @load object
     */
    public function loadJson()
    {
				$file = Yii::$app->basePath.'/files/object.json';
				$data = json_decode(file_get_contents($file), true);
				$this->load(['ObjectForm' => $data]);
        return true;
    }

    /**
     * @save object
     */
    public function save()
    {
				$file = Yii::$app->basePath.'/files/object.json';
				file_put_contents($file, json_encode($this));
        return true;
    }
}
