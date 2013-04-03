<?php

class City extends CI_Model {

    function __construct() {
        parent::__construct();
        //I have autoloaded the database
    }

    public function getCity() {
        $query = $this->db->get('city');
        return $query->result_array();
    }

    public function getCityName($cityID) {
        $whereArray = array('CITY_ID' => $cityID);
        $query = $this->db->get_where('city', $whereArray);
        $id = $query->row_array();
        return $id['CITY_NAME'];
    }

    public function validCityID($cityID) {
        //returns true is $cityID exists in the database
        $whereArray = array('CITY_ID' => $cityID);
        $query = $this->db->get_where('city', $whereArray);

        if ($query->num_rows() > 0) {
            $status = true;
        } else {
            $status = false;
        }
        return $status;
    }

}

?>
