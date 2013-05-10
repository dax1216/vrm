<?php
App::uses('AppModel', 'Model');

class PropertyImage extends AppModel {
/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = false;
/**
 * Validation rules
 *
 * @var array
 */
    public $belongsTo = array(
        'Property' => array(
                    'className' => 'Property',
                    'foreignKey' => 'property_id',
                    'conditions' => '',
                    'fields' => '',
                    'order' => ''
        )
    );
}
