<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */

require_once('sendgrid/SendGrid.php');
require_once('unirest/Unirest.php');
require_once('Lob/Lob.php');

class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update', 'admin', 'delete', 'assignmed', 'deassignmed', 'search'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function send_email($to, $subject, $body)
	{
		$sendgrid = new SendGrid("jmateo","Mhacks1314");
		$sendgrid->register_autoloader();
		$mail = new SendGrid\Email();
		$mail->
		addTo($to)->
		setFrom('jmate003@odu.edu')->
		setSubject($subject)->
		setText($body)->
		setHtml($body);

		$sendgrid->web->send($mail);

	}

	public function send_sms($to, $body)
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "http://mateoj.com/twilioclient/twilio.php");
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, "to=$to&body=$body");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$output = curl_exec($ch);
		curl_close($ch);
		return $output;		
		 	
	}
}