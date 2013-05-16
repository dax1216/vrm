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
	
	public function result() {
		$this->set('title_for_layout', 'Vacation Roost: Result');
		 
		$location = $_GET['location'];
		$checkin = $_GET['checkin'];
		
		$nights = $_GET['nights'];
		
		$checkout = date('D F j, Y', strtotime("+$nights day", strtotime($checkin)));

		$this->set('location', $location);
		$this->set('checkin', $checkout);

    }

    public function advanced() {
        
    }

}
?>
