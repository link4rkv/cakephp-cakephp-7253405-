<?php

App::uses('AppController', 'Controller');

class SalesController extends AppController {

	public $uses = array();

	public $name = 'Sales';
	public $helpers = array('Js' => array('angular.min.js'));
	public $components = array('RequestHandler', 'Paginator');
	public $paginate = array('contain' => array('Sale' => array('Customer' => array('fields' => array('Customer.name'))), 'Product'));

public function beforeFilter() {
    $this->RequestHandler->setContent('json', 'text/x-json');
}

	var $scaffold;
	
	public function index(){

		$this->Sale->recursive = -1;
		$sales = $this->Sale->ProductsSale->find('all', array(
			'contain' => array('Sale' => array('Customer' => array('fields' => array('Customer.name'))), 'Product')));
		
		}
	
	 public function view() {
	 	$this->autoRender = false;
		$this->Sale->recursive = -1;
        $sales = $this->Sale->ProductsSale->find('all', array(
			'contain' => array(
				'Sale' => array(
					'Customer' => array(
						'fields' => array('Customer.name'))),
						 'Product'
						 )));
        return json_encode($sales);
    }

    public function edit($id) {
    		$this->autoRender = false;
    		$sales = $this->Sale->findById($id);
    		$data = $this->request->input('json_decode');
    		if ($sales) {
    			$sales['Sale']['tax_percentage'] = $data->tax;
    			$this->Sale->save($sales);
    			return True;
    		}
    		else{
    			return False;
    		}
    	}
    }
