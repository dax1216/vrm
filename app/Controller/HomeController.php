<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
App::uses('AppController', 'Controller');


class HomeController extends AppController {

/**
 * Controller name
 *
 * @var string
 */
	public $name = 'Home';

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array();



    public function index() {
        
    }

    /**
     * This is just a test to make sure the models are working
     */
    public function test() {
        $this->layout = $this->autoRender = false;

        $this->loadModel('PropertyImage');

        $images = $this->PropertyImage->find('all', array('conditions' => array('PropertyImage.property_id' => 31827)));

        var_dump($images);
    }
}
?>
