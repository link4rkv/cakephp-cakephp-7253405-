<?php

App::uses('Model', 'Model');


class Sale extends Model {

	public $actsAs = array('Containable');

	public $belongsTo = array(
        'Customer' => array(
            'className' => 'Customer',
            'foreignKey' => 'customer_id'
        )
    );

    public $hasMany = array('ProductsSale');

}


