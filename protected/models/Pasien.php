<?php

/**
 * This is the model class for table "pasien".
 *
 * The followings are the available columns in table 'pasien':
 * @property integer $id
 * @property string $nama
 * @property string $tanggal_lahir
 * @property integer $wilayah_id
 *
 * The followings are the available model relations:
 * @property Wilayah $wilayah
 * @property Pembayaran[] $pembayarans
 * @property Transaksi[] $transaksis
 */
class Pasien extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public $jumlah_pasien;
	public function tableName()
	{
		return 'pasien';
	}
	public function actionAutocomplete()
	{
		if (isset($_GET['term'])) {
			$criteria = new CDbCriteria;
			$criteria->compare('nama', $_GET['term'], true);

			$pasien = Pasien::model()->findAll($criteria);

			$data = array();
			foreach ($pasien as $p) {
				$data[] = array(
					'id' => $p->id,
					'value' => $p->nama,
					'tanggal_lahir' => $p->tanggal_lahir,
					'wilayah_id' => $p->wilayah->nama, // Ganti dengan atribut yang sesuai
				);
			}

			echo CJSON::encode($data);
			Yii::app()->end();
		}
	}


	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nama, tanggal_lahir, wilayah_id', 'required'),
			array('wilayah_id', 'numerical', 'integerOnly' => true),
			array('nama', 'length', 'max' => 255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nama, tanggal_lahir, wilayah_id', 'safe', 'on' => 'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'wilayah' => array(self::BELONGS_TO, 'Wilayah', 'wilayah_id'),
			'pembayarans' => array(self::HAS_MANY, 'Pembayaran', 'pasien_id'),
			'transaksis' => array(self::HAS_MANY, 'Transaksi', 'pasien_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nama' => 'Nama',
			'tanggal_lahir' => 'Tanggal Lahir',
			'wilayah_id' => 'Wilayah',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('nama', $this->nama, true);
		$criteria->compare('tanggal_lahir', $this->tanggal_lahir, true);
		$criteria->compare('wilayah_id', $this->wilayah_id);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}

	public function getCountPerWilayah()
	{
		$criteria = new CDbCriteria();
		$criteria->select = 'wilayah_id, COUNT(*) as jumlah_pasien';
		$criteria->group = 'wilayah_id';
		$data = self::model()->findAll($criteria);

		return $data;
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Pasien the static model class
	 */
	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}
}
