<?php

App::uses('AppController', 'Controller');

class CustomersController extends AppController {

	
	public $uses = array();
	public $name = 'Customers';
	public $helpers = array('Html');
	public $components = array('DebugKit.Toolbar');	

	public function index()
	{
		$this->Customer->recursive = 1;
		$customers = $this->Customer->find('all');
		$this->set('customers',$customers);
				
	}

	
}
