<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
App::uses('AppController', 'Controller');


class CountryController extends AppController {

/**
 * Controller name
 *
 * @var string
 */
	//public $name = 'Country';

/**
 *
 * @var array
 */
	public $uses = array('Country');



    public function index() {
        
    }

    public function get_all_auto($term = '') {
		$this->layout = $this->autoRender = false;

		
		$term = $_GET['term'];
		
		/*
		$options = array(
			'fields' => array('Name', 'Code2'),
			'conditions' => array(
				'Country.Continent' => 'Oceania'
			)
		);
		$test = $this->Country->find('all', $options);
		$countries = array();
		foreach($test as $i){
			$countries[] = $i['Country']['Name'];
		}
		*/
		$this->loadModel('City');
		
		$options = array(
			'fields' => array('City.Name', 'CountryCode', 'Country.Name'),
		);
		
		$options['joins'] = array(
			array('table' => 'countries',
				'alias' => 'Country',
				'type' => 'LEFT',
				'conditions' => array(
					'Country.Code = City.CountryCode',
				)
			)
		);
		if ($term) {
			$options['conditions'] = array(
				'OR' => array(
					array('City.Name LIKE' => '%' . $term . '%'),
					array('Country.Name LIKE' => '%' . $term . '%')
					//'City.Name LIKE' => '%' . $term . '%',
					//'Country.Name LIKE' => '%' . $term . '%'
				)
				
			);
		}

		$destinations = $this->City->find('all', $options);
		
		$countries = array();
		
		foreach($destinations as $i){
			$countries[] = utf8_encode($i['City']['Name'] . ', ' . $i['Country']['Name']);
		}

		//var_dump($countries);
		echo json_encode($countries);
    }
}
?>
