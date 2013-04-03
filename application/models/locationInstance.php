<?php

class locationInstance extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getBuildingName($locationInstanceID) {
        $query = $this->db->query("SELECT BUILDING_NAME_ONE from LOCATION_INSTANCE 
                where LOCATION_INSTANCE_ID = $locationInstanceID");
        $id = $query->row_array();
        return $id['BUILDING_NAME_ONE'];
    }

}

?>
