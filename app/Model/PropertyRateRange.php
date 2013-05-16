<?php
App::uses('AppModel', 'Model');
/**
 * Auction House Model
 *
 */
class PropertyRateRange extends AppModel {
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

    public function getAverageRate($property_id) {
        $result = $this->find('first', array( 'fields' => array('AVG(rate) AS average_rate'),
                                            'conditions' => array(
                                                    'property_id' => $property_id,
                                                    'date BETWEEN ? AND ?' => array(date('Y-m-d'), date('Y-m-d', strtotime('+60 days')))),
                                            'limit' => 1
                                            )
                                            
                            );
        
        return round($result[0]['average_rate']);
    }
}
