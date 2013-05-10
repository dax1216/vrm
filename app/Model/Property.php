<?php
App::uses('AppModel', 'Model');

class Property extends AppModel {
/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'property_id';
/**
 * Validation rules
 *
 * @var array
 */

    public $hasMany = array(
        'PropertyImage' => array(
                    'className' => 'PropertyImage',
                    'foreignKey' => 'property_id',
                    'conditions' => '',
                    'fields' => '',
                    'order' => ''
        ),
        'PropertyAmenity' => array(
                    'className' => 'PropertyAmenity',
                    'foreignKey' => 'property_id',
                    'conditions' => '',
                    'fields' => '',
                    'order' => ''
        ),
        'PropertyPolicy' => array(
                    'className' => 'PropertyPolicy',
                    'foreignKey' => 'property_id',
                    'conditions' => '',
                    'fields' => '',
                    'order' => ''
        ),        
        'PropertySpecial' => array(
                    'className' => 'PropertySpecial',
                    'foreignKey' => 'property_id',
                    'conditions' => '',
                    'fields' => '',
                    'order' => ''
        )
    );

}
