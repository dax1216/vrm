<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
App::uses('AppController', 'Controller');


class DestinationController extends AppController {

/**
 * Controller name
 *
 * @var string
 */
	public $name = 'Destination';

/**
 *
 * @var array
 */
	public $uses = array();

	public function index($country=null, $city=null) {
		$this->set('title_for_layout', 'Destination: Property Listings');
		
		$this->loadModel('Property');
		//$this->loadModel('PropertyImage');
		
		//must be from form field
		$destination = 'Breckenridge';

		$options = array(
			'fields' => array('name', 'city', 'state', 'country'),
			'limit' => 10
		);
		
		if ($destination) {
			$options['conditions'] = array(
				'OR' => array(
					//array('Property.city' => $term),
					//array('Property.state' => $term),
					//array('Property.country' => $term)
					array('Property.destination' => $destination)
				)
			);
		}
		
		$properties = $this->Property->find('all', $options);
		$count = $this->Property->find('count', $options);
	

		$this->paginate = $options;
		
		$data = $this->paginate('Property');
		//$pages = $this->paginateCount();
		//paginateCount()
		$this->set('properties', $data);
		$this->set('total', $count);
		$this->set('destination', $destination);
	}

}
?>
