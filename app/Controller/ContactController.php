<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
App::uses('AppController', 'Controller');

App::uses('CakeEmail', 'Network/Email');

class ContactController extends AppController {

/**
 * Controller name
 *
 * @var string
 */
	public $name = 'Contact';

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array('Contact');



    public function index() {        
        if($this->request->is('post')) {
            $this->Contact->set($this->request->data);

            if($this->Contact->validates()) {                
                $reply_to_address = Configure::read('Defaults.contact_address');
                $reply_to_name = Configure::read('Defaults.contact_name');

                $email = new CakeEmail();
                $email->from('noreply@vacationroost.com');

                $email->template('contact')
                      ->emailFormat('html');
                $email->helpers(array('Html'));

                $to_address = array($reply_to_address => $reply_to_name);
               
                $email->to($to_address);

                $email->subject('Vacation Roost Contact Inquiry');

                $email->viewVars(array('contact' => $this->request->data));

                $email->send();

                $this->Session->setFlash('Email successfully sent.', 'default', array('class' => 'alert alert-success'));
                $this->redirect('/contact');
            }
        }
    }

  
}
?>