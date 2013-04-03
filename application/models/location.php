<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Location
 *
 * @author Ayo
 */
class Location extends CI_Model{
    //put your code here
    
    function __construct() {
        parent::__construct();
    }
    
      public function getBuildingName($locationInstanceID) {
        
        $whereArray = array('LOCATION_INSTANCE_ID' => $locationInstanceID);
        $query = $this->db->get_where('location_instance', $whereArray);
        $id = $query->row_array();
        return $id['BUILDING_NAME_ONE'];
    }
    
    public function getAddressDetail($locationInstanceID) {
        
        $whereArray = array('LOCATION_INSTANCE_ID' => $locationInstanceID);
        $query = $this->db->get_where('location_instance', $whereArray);
        return $query->row_array();
        
    }


    
    
    
}

?>
