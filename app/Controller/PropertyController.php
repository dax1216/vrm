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
	public $uses = array('Property', 'PropertyRateRange');

    public $helpers = array('Text', 'GoogleMap', 'Property');

    public function view($property_id = null) {
        $this->Property->id = $property_id;
        
		if (!$this->Property->exists()) {
			throw new NotFoundException(__('Invalid Property'));
		}

        $property = $this->Property->read(null, $property_id);
        $per_night_rate = $this->PropertyRateRange->getAverageRate($property_id);
        
        $map_options = array(
            'id' => 'map_canvas',
            'width' => '270px',
            'height' => '250px',
            'style' => '',
            'zoom' => 18,
            'type' => 'ROADMAP',
            'custom' => null,
            'localize' => false,
            'latitude' => $property['Property']['latitude'],
            'longitude' => $property['Property']['longitude'],
            'address' => $property['Property']['complete_address'],
            'marker' => true,
            'markerTitle' => $property['Property']['complete_address'],
            'markerIcon' => 'http://google-maps-icons.googlecode.com/files/hotel.png',
            'markerShadow' => 'http://google-maps-icons.googlecode.com/files/shadow.png',
            'infoWindow' => true,
            'windowText' => $property['Property']['complete_address']
          );
        
        $this->set(compact('property', 'map_options', 'per_night_rate'));
    }
    
}
?>
