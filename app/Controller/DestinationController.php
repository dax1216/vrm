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
	
	public $components = array('RequestHandler');
	public $helpers = array('Js');

	public function index($city=null, $country=null) {
		$this->set('title_for_layout', 'Destination: Property Listings');
		
		$this->loadModel('Property');
		//$this->loadModel('PropertyImage');
		
		//must be from form field
		//$destination = 'Breckenridge';

		$options = array(
			'fields' => array('name', 'city', 'state', 'country'),
			'limit' => 4
		);
		
		if ($city) {
			$options['conditions'] = array(
				'OR' => array(
					'Property.city' => $city,
					'Property.destination' => $city
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
		//if ($this->RequestHandler->isAjax()) {  
		//	$this->render('/elements/ajaxpaginate');
		//}  
		$this->set('total', $count);
		$this->set('destination', $city);

	}

}
?>
