<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
App::uses('AppController', 'Controller');


class PropertyController extends AppController {

/**
 * Controller name
 *
 * @var string
 */
	public $name = 'Property';

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array('Property');


    public function view($property_id = null) {
        $this->Property->id = $property_id;
        
		if (!$this->Property->exists()) {
			throw new NotFoundException(__('Invalid Property'));
		}

        $property = $this->Property->read(null, $property_id);

        $this->set(compact('property'));
    }
    
}
?>
