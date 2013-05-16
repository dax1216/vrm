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

    public $helper = array('Property');
    
	public $uses = array('Property', 'PropertyRateRange');


    public function index() {		
        $this->set('title_for_layout', 'Vacation Roost: Search');		
    }	
	
	public function results() {
		$this->set('title_for_layout', 'Vacation Roost: Result');

        $days = $this->passedArgs['days'];
        $occupancy = $this->passedArgs['occupancy'];
        $checkin = $this->passedArgs['checkin_date'];
		$checkout = date('D F j, Y', strtotime("+$days day", strtotime($checkin)));
		
		$options = array(
			'limit' => 4
		);

        if(isset($this->passedArgs['location'])) {
			$keywords = $this->passedArgs['location'];
			
			$options['conditions'][] = array(
				'OR' => array(
					'Property.name LIKE' => "%$keywords%",
					'Property.city LIKE' => "%$keywords%",
					'Property.country LIKE' => "%$keywords%",
				)
			);
		}
  
		if(isset($occupancy)) {			
			$options['conditions'][] = array(
				'Property.occupancy' => $occupancy 
			);
		}		 

        if(isset($days) && isset($checkin)) {
            $options['conditions'][] = array(
                'Property.property_id NOT IN (SELECT DISTINCT property_id FROM property_unavailable_ranges WHERE date BETWEEN "2013-05-22" AND "2013-05-25")'
                );
        }

		$this->paginate = $options;

		$properties = $this->paginate('Property');

        if(!empty($properties)) {
            foreach($properties as &$property) {
                $property['Property']['rate_per_night'] = $this->PropertyRateRange->getAverageRate($property['Property']['property_id']);
            }
        }
		$this->set('properties', $properties);
    }

    public function advanced() {
        
    }

}
?>