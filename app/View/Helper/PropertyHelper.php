<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class PropertyHelper extends AppHelper {

    public function getPropertyNameAndCaption($property) {
        $breakpoint = strpos($property['Property']['name'], ' - ');
        $property_name = substr($property['Property']['name'], 0, $breakpoint);
        $sub_text = substr($property['Property']['name'], $breakpoint + 3, strlen($property['Property']['name']));

        return array($property_name, $sub_text);
    }
}
?>
