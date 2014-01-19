<?php

class PatientController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

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
	/*
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	*/
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$model = $this->loadModel($id);
		$appointments = $model->appointments;
		$meds = $model->meds;
		$arr = array();
		$brr = array();
		foreach($appointments as $t)
		{
		    $arr[$t->id] = $t->attributes;
		}
		foreach($meds as $t)
		{
		    $brr[$t->id] = $t->attributes;
		}

		$medsDataProvider = new CArrayDataProvider($brr);
		$gridDataProvider = new CArrayDataProvider($arr);
		$this->render('view',array(
			'model'=>$this->loadModel($id),
			'gridDataProvider'=>$gridDataProvider,
			'medsDataProvider'=>$medsDataProvider,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Patient;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Patient']))
		{
			$model->attributes=$_POST['Patient'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Patient']))
		{
			$model->attributes=$_POST['Patient'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
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
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Patient');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Patient('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Patient']))
			$model->attributes=$_GET['Patient'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Patient::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='patient-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionAssignmed()
	{
		if( isset( $_POST['patient_id'] ) && isset( $_POST['med_id'] ) )
		{
				$patient = Patient::model()->findByPk($_POST['patient_id']);
				$med = Med::model()->findByPk($_POST['med_id']);
				$patient_id = $patient->id;
				$med_id = $med->id;
				$connection=Yii::app()->db;
				$sql="INSERT INTO tbl_patient_med_assignment (patient_id, med_id) VALUES(:patient_id, :med_id)";
				$command=$connection->createCommand($sql);
				$command->bindParam(":patient_id", $patient_id, PDO::PARAM_INT);
				$command->bindParam(":med_id", $med_id, PDO::PARAM_INT);				
				try{
					$command->execute();
					echo CJSON::encode(array(
						"id"=>$med->id,
						"name"=>$med->name,
					));
				} catch(Exception $e) {
					echo $e->getMessage() . "\n"; 
				}		
		}
	}

	public function actionDeassignmed()
	{
		if( isset($_GET['patient_id']) && isset($_GET['med_id']))
		{
			$patient = Patient::model()->findByPk($_GET['patient_id']);
			$med = Med::model()->findByPk($_GET['med_id']);
			$connection = Yii::app()->db;
			$sql = "DELETE FROM tbl_patient_med_assignment WHERE patient_id=: patient_id AND med_id=:med_id";
			$command = $connection->createCommand($sql);
			$command->bindParam(":patient_id", $patient->id, PDO::PARAM_INT);
			$command->bindParam(":med_id", $med->id, PDO::PARAM_INT);

			try{
				$command->execute();
				echo CJSON::encode(array(
					"status"=>"success",
				));
			} catch(Exception $e)
			{
				echo CJSON::encode(array(
					"status"=>"failure",
					"Error"=>$e,
				));
			}
		}
	}
}
