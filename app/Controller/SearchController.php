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
        echo base64_encode(serialize(array('checkin_date' => '2013-05-20', 'days' => '3', 'location' => 'beach', 'occupancy' => 2)));
    }	
	
	public function results() {
		$this->set('title_for_layout', 'Vacation Roost: Advance Search');
        
		$options = array(
			'limit' => 4
		);
        
        $this->_getSearchConditions(&$options);        

		$this->paginate = $options;

		$properties = $this->paginate('Property');

        if(!empty($properties)) {
            foreach($properties as &$property) {
                $property['Property']['rate_per_night'] = $this->PropertyRateRange->getAverageRate($property['Property']['property_id']);
            }
        }
        
        $url_string = '/p:' . $this->passedArgs['p'];

		$this->set(compact('properties', 'url_string'));
    }

    private function _getSearchConditions(&$options, $advanced = false) {
        $params = unserialize(base64_decode($this->passedArgs['p']));
        //debug($params);
        $days = isset($params['days']) ? $params['days'] : 0;
        $occupancy = isset($params['occupancy']) ? $params['occupancy'] : null;
        $checkin = isset($params['checkin_date']) ? $params['checkin_date'] : date('Y-m-d');
        $checkout = date('Y-m-d', strtotime("+$days day", strtotime($checkin)));
        $location = isset($params['location']) ? $params['location'] : null;
        $keyword = (isset($params['keyword']) && !empty($params['keyword'])) ? $params['keyword'] : null;
        $rate_start = (isset($params['rate_start']) && !empty($params['rate_start'])) ? $params['rate_start'] : null;
        $rate_end = (isset($params['rate_end']) && !empty($params['rate_end'])) ? $params['rate_end'] : $rate_start;
        $bedroom_start = (isset($params['bedroom_start']) && !empty($params['bedroom_start'])) ? $params['bedroom_start'] : null;
        $bedroom_end = (isset($params['bedroom_end']) && !empty($params['bedroom_end'])) ? $params['bedroom_end'] : $bedroom_start;
        $bath_start = (isset($params['bath_start']) && !empty($params['bath_start'])) ? $params['bath_start'] : null;
        $bath_end = (isset($params['bath_end']) && !empty($params['bath_end'])) ? $params['bath_end'] : $bath_start;
        $amenities = (isset($params['amenities']) && !empty($params['amenities'])) ? $params['amenities'] : null;
        $cities = (isset($params['cities']) && !empty($params['cities'])) ? $params['cities'] : null;
        
        if(isset($days) && isset($checkin)) {
            $options['conditions'][] = array(
                'Property.property_id NOT IN (SELECT DISTINCT property_id FROM property_unavailable_ranges WHERE date BETWEEN ? AND ?)' => array($checkin, $checkout)
                );
        }

        if(isset($location)) {			
			$options['conditions'][] = array(
				'OR' => array(
					//'Property.name LIKE' => "%$keywords%",
					'Property.city LIKE' => "%$location%",
					'Property.country LIKE' => "%$location%",
				)
			);
		}

        $this->set('params', $params);
        // if advance search don't filter below
        if($advanced) {
            return true;
        }

		if($keyword != null) {
			$options['conditions'][] = array(
				'Property.name LIKE' => "%$keyword%"
			);
		}

        if(isset($rate_start) && isset($rate_end)) {
            $property_ids = $this->PropertyRateRange->filterPropertyByRateAverage($rate_start, $rate_end);

            if(!empty($property_ids)) {
                $options['conditions'][] = array(
                    'Property.property_id IN ('.$this->Property->escapeArrayForQuery($property_ids).')'
                );
            }
		}
        
        if($bedroom_start != null && $bedroom_end != null) {            
			$options['conditions'][] = array(
				'Property.bedrooms BETWEEN ? AND ?' => array($bedroom_start, $bedroom_end)
			);
		}

        if($bath_start != null && $bath_end != null) {
			$options['conditions'][] = array(
				'Property.baths BETWEEN ? AND ?' => array($bath_start, $bath_end)
			);
		}

        if($amenities != null) {
			$options['conditions'][] = array(
				'Property.property_id IN (SELECT DISTINCT property_id FROM property_amenities WHERE amenity IN (' .$this->Property->escapeArrayForQuery($amenities) .'))'
			);
		}

        if($cities != null) {
			$options['conditions'][] = array(
				'Property.city' => $cities
			);
		}
    }


    public function advanced() {
        if($this->request->is('post')) {            
            //$params = array_merge(array('checkin_date$params, $this->request->data);
            $params = $this->request->data;
            
            $query_string = base64_encode(serialize($params));

            $this->redirect('/search/results/p:' . $query_string);
        }

        $options = array();

        $this->_getSearchConditions(&$options, true);

        $amenity_options = $city_options = $options;

        $amenity_options['recursive'] = $city_options['recursive'] = -1;
        
        $amenity_options['fields'] = array('DISTINCT PropertyAmenity.amenity');
        $amenity_options['conditions'][] = 'PropertyAmenity.amenity != ""';
        $amenity_options['joins'] = array(
                                array(
                                    'alias' => 'PropertyAmenity',
                                    'table' => 'property_amenities',
                                    'type' => 'LEFT',
                                    'foreignKey'=> false,
                                    'conditions' => array('PropertyAmenity.property_id = Property.property_id')
                                )
                            );

        $amenity_options['order'] = array('PropertyAmenity.amenity ASC');

        $amenities = $this->Property->find('all', $amenity_options);

        
        $city_options['fields'] = array('DISTINCT Property.city');
        $city_options['order'] = array('Property.city ASC');

        $cities = $this->Property->find('all', $city_options);

        $url_string = '/p:' . $this->passedArgs['p'];
        
        $this->set(compact('amenities', 'cities', 'url_string'));

    }

}
?>