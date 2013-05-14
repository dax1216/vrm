<?php
App::uses('AppModel', 'Model');

class Contact extends AppModel {
/**
 * Primary key field
 *
 * @var string
 */
	public $useTable = false;
/**
 * Validation rules
 *
 * @var array
 */

    public $validate = array(
		'first_name' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'First Name is required',
                'allowEmpty' => false,
                'required' => false,
			),
        ),
        'last_name' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Last Name is required',
                'allowEmpty' => false,
                'required' => false
			),
        ),
        'email' => array(
            'email' => array(
                'rule'      => 'email',
                'message'   => 'Must be a valid email address',
            )
        ),
        'phone' => array(
                'notempty' => array(
                    'rule' => array('notempty'),
                    'message' => 'Phone is required',
                    'allowEmpty' => false,
                    'required' => false
			),
        )
    );

}
