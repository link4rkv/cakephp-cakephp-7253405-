<?php

App::uses('Model', 'Model');

class Product extends Model {

	public $actsAs = array('Containable');

    public $hasMany = array('ProductsSale');

}
