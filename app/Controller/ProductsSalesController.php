<?php

App::uses('Controller', 'Controller');

class ProductsSalesController extends Controller {

	public $components = array('DebugKit.Toolbar');

	public function index(){
		
		$productssales = $this->ProductsSale->find('all');
		$this->set('productssales',$productssales);
				
	}
}
