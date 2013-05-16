<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
App::uses('AppController', 'Controller');


class SearchController extends AppController {

/**
 * Controller name
 *
 * @var string
 */
	public $name = 'Search';

/**
 *
 * @var array
 */
	public $uses = array();



    public function index() {
		
        $this->set('title_for_layout', 'Vacation Roost: Search');
		
    }
	
	function search() {
	//$this->layout = $this->autoRender = false;
		// the page we will redirect to
		$url['action'] = 'result';

		foreach ($this->data as $k=>$v){
			if(is_array($v)){
				foreach ($v as $kk=>$vv){ 
					$url[$k.'.'.$kk]=$vv; 
				}
			}
		}

		// redirect the user to the url
		$this->redirect($url, null, true);
    }
	
	public function result() {
		//$this->layout = $this->autoRender = false;
		$this->set('title_for_layout', 'Vacation Roost: Result');
		 
		//$location = $_GET['location'];
		//$checkin = $_GET['checkin'];
		//$occupancy = $_GET['occupancy'];
		$nights = $this->passedArgs['Search.nights'];

		$checkout = date('D F j, Y', strtotime("+$nights day", strtotime($this->passedArgs['Search.checkin'])));

		$this->loadModel('Property');
		
		$options = array(
			'limit' => 4
		);

		//
		// filter by location
		//
		if(isset($this->passedArgs['Search.location'])) {
			$keywords = $this->passedArgs['Search.location'];
			
			$options['conditions'] = array(
				'OR' => array(
					'Property.name LIKE' => "%$keywords%",
					'Property.city LIKE' => "%$keywords%",
					'Property.country LIKE' => "%$keywords%",
				)
			);
		}
  
		//
		// filter by occupancy
		//
		if(isset($this->passedArgs['Search.occupancy'])) {
			$occupancy = $this->passedArgs['Search.occupancy'];
			$options['conditions'] = array(
				'Property.occupancy' => $occupancy 
			);
		}
		 
		$properties = $this->Property->find('all', $options);
		$this->paginate = $options;
		$data = $this->paginate('Property');
				
		$this->set('properties', $data);
    }

}
?>
