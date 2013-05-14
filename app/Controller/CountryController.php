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
	public $uses = array();



    public function index() {
        
    }

    /**
public function edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->User->read(null, $id);
            unset($this->request->data['User']['password']);
        }
    }
    */
    public function get_all_auto($term = '') {
		$this->layout = $this->autoRender = false;

		$this->loadModel('Country');
		
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
			'fields' => array('City.Name', 'CountryCode', 'Country.Name')
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
			$countries[] = $i['City']['Name'] . ', ' . $i['Country']['Name'];
		}

		//var_dump($countries);
		 echo json_encode($countries);
    }
}
?>
