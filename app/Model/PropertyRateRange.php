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

    public function filterPropertyByRateAverage($rate_start, $rate_end) {
        $results = $this->query('SELECT property_id FROM property_rate_ranges WHERE
                                    date BETWEEN "'.date('Y-m-d'). '" AND "'.date('Y-m-d', strtotime('+60 days')).'"
                                    GROUP BY property_id HAVING AVG(rate) >= '.$rate_start.' AND AVG(rate) <= '.$rate_end);

        $property_ids = array();

        if(!empty($results)) {
            foreach($results as $row) {
                $property_ids[] = (int) $row['property_rate_ranges']['property_id'];
            }
        }

        return $property_ids;
    }
}
