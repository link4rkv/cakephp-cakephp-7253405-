<?php

App::uses('Model', 'Model');

class Customer extends AppModel {

    public $actsAs = array('Containable');

    public $hasMany = array(
        'Sale' => array(
            'className' => 'Sale',
            'limit' => '15',
            'dependent' => true
        )
    );

    public $belongsTo = array(
        'Product' => array(
            'className' => 'Product',
            
        )
    );  
}