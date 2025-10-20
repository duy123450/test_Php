<?php

class User
{
	public  $model, $action;
	public $dataCat, $dataPub;
	function __construct()
	{
		$action= getIndex('action', 'index');
		$this->model = new Model_User();
		$this->dataCat= $this->model->getCat();
		$this->dataPub = $this->model->getPub();

		if (method_exists($this,$action))
			$this->$action();
		else {echo "Chua xd function. {$this->action} "; exit;}
		
	}

/**
 * [index description]
 * @return [type] [description]
 */
function index()
	{
		$data_cat = $this->dataCat;// $this->model->getCat();
		$data_pub = $this->dataPub;//$this->model->getPub();
		$subview = 'login_index.php';
		include "View/layout1.php";
	}


}