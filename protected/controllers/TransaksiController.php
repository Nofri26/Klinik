<?php

require_once Yii::app()->basePath . '/../vendor/autoload.php';


class TransaksiController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout = '//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array(
				'allow', // allow all users to access 'grafikPasienWilayah'
				'actions' => array('getPasienData'),
				'users' => array('admin'),
			),
			array(
				'allow', // allow all users to access 'grafikPasienWilayah'
				'actions' => array('invoice'),
				'users' => array('admin'),
			),
			array(
				'allow',  // allow all users to perform 'index' and 'view' actions
				'actions' => array('index', 'view'),
				'users' => array('*'),
			),
			array(
				'allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions' => array('create', 'update'),
				'users' => array('@'),
			),
			array(
				'allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions' => array('admin', 'delete'),
				'users' => array('admin'),
			),
			array(
				'deny',  // deny all users
				'users' => array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view', array(
			'model' => $this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model = new Transaksi;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['Transaksi'])) {
			$model->attributes = $_POST['Transaksi'];
			if ($model->save())
				$this->redirect(array('view', 'id' => $model->id));
		}

		$this->render('create', array(
			'model' => $model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model = $this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['Transaksi'])) {
			$model->attributes = $_POST['Transaksi'];
			if ($model->save())
				$this->redirect(array('view', 'id' => $model->id));
		}

		$this->render('update', array(
			'model' => $model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if (!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider = new CActiveDataProvider('Transaksi');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model = new Transaksi('search');
		$model->unsetAttributes();  // clear any default values
		if (isset($_GET['Transaksi']))
			$model->attributes = $_GET['Transaksi'];

		$this->render('admin', array(
			'model' => $model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Transaksi the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model = Transaksi::model()->findByPk($id);
		if ($model === null)
			throw new CHttpException(404, 'The requested page does not exist.');

		$namaPasien = $model->pasien->nama;
		$namaTidakan = $model->tindakan->nama;
		$namaObat = $model->obat->nama;

		$model->setAttribute('pasien_id', $namaPasien);
		$model->setAttribute('tindakan_id', $namaTidakan);
		$model->setAttribute('obat_id', $namaObat);

		return $model;
	}

	public function actionGetPasienData($pasienId)
	{
		$data = Transaksi::model()->getPasienData($pasienId);

		$jsonData = array(
			'status' => 'success',
			'data' => $data,
		);

		// Return the data as JSON response
		header('Content-Type: application/json');
		echo json_encode($jsonData);
		Yii::app()->end();
	}

	public function actionInvoice($id)
	{
		$model = $this->loadModel($id);

		$pdf = new TCPDF();

		$pdf->SetCreator('Your Name');
		$pdf->SetAuthor('Your Name');
		$pdf->SetTitle('Invoice for Transaction : ' . $model->pasien_id);
		$pdf->SetSubject('Invoice');

		$pdf->AddPage();
		$pdf->SetFont('helvetica', '', 12);

		$content = 'Invoice for Transaction ID: ' . $model->pasien_id;
		$pdf->MultiCell(0, 10, $content);

		$pdf->Ln(10);
		$content = 'Tindakan: ' . $model->tindakan_id;
		$pdf->MultiCell(0, 10, $content);

		$pdf->Ln(10);
		$content = 'Obat: ' . $model->obat_id;
		$pdf->MultiCell(0, 10, $content);

		$pdf->Ln(10);
		$content = 'Harga: ' . $model->jumlah;
		$pdf->MultiCell(0, 10, $content);

		$pdf->Ln(10);
		$content = 'Harga: ' . $model->total_harga;
		$pdf->MultiCell(0, 10, $content);

		$pdf->Output('invoice_' . $model->pasien_id . '.pdf', 'D');
	}

	/**
	 * Performs the AJAX validation.
	 * @param Transaksi $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'transaksi-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
