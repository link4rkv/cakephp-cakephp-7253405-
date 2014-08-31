<?php

App::uses('Model', 'Model');

class ProductsSale extends Model {

	public $actsAs = array('Containable');

	public $belongsTo = array(
        'Sale', 'Product'
    );
}
