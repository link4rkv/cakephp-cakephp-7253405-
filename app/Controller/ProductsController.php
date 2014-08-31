<?php

App::uses('Controller', 'Controller');

class ProductsController extends Controller {

	public $name = 'Products';
	public $helpers = array('Html');
	public $components = array('DebugKit.Toolbar');

	public function index(){

		$products = $this->Product->find('all');
		$this->set('products',$products);
	}
}
