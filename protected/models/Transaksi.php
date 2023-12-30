<?php

/**
 * This is the model class for table "transaksi".
 *
 * The followings are the available columns in table 'transaksi':
 * @property integer $id
 * @property integer $pasien_id
 * @property integer $tindakan_id
 * @property integer $obat_id
 * @property integer $jumlah
 * @property string $total_harga
 *
 * The followings are the available model relations:
 * @property Obat $obat
 * @property Pasien $pasien
 * @property Tindakan $tindakan
 */
class Transaksi extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'transaksi';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('pasien_id, tindakan_id, obat_id, jumlah, total_harga', 'required'),
			array('pasien_id, tindakan_id, obat_id, jumlah', 'numerical', 'integerOnly'=>true),
			array('total_harga', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, pasien_id, tindakan_id, obat_id, jumlah, total_harga', 'safe', 'on'=>'search'),
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
			'obat' => array(self::BELONGS_TO, 'Obat', 'obat_id'),
			'pasien' => array(self::BELONGS_TO, 'Pasien', 'pasien_id'),
			'tindakan' => array(self::BELONGS_TO, 'Tindakan', 'tindakan_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'pasien_id' => 'Pasien',
			'tindakan_id' => 'Tindakan',
			'obat_id' => 'Obat',
			'jumlah' => 'Jumlah',
			'total_harga' => 'Total Harga',
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

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('pasien_id',$this->pasien_id);
		$criteria->compare('tindakan_id',$this->tindakan_id);
		$criteria->compare('obat_id',$this->obat_id);
		$criteria->compare('jumlah',$this->jumlah);
		$criteria->compare('total_harga',$this->total_harga,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Transaksi the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
