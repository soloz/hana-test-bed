<?php

class Event extends CI_Model {

    function __construct() {
        parent::__construct();
        // I have auto loaded the database
    }

    public function getEvent($eventID) {
        $whereArray = array('EVENT_ID' => $eventID);
        $query = $this->db->get_where('events', $whereArray);
        return $query->result_array();
    }

    public function getEventName($eventID) {
        $whereArray = array('EVENT_ID' => $eventID);
        $query = $this->db->get_where('events', $whereArray);
        $id = $query->row_array();
        return $id['EVENT_NAME'];
    }

    public function getEventCategory($eventCategoryID) {
        $whereArray = array('EVENT_CATEGORY_ID' => $eventCategoryID);
        $query = $this->db->get_where('event_category', $whereArray);
        $id = $query->row_array();
        return $id['EVENT_CATEGORY'];
    }

    public function validEventID($eventID) {
        //returns true is $eventID exists in the database
        $whereArray = array('EVENT_ID' => $eventID);
        $query = $this->db->get_where('events', $whereArray);

        if ($query->num_rows() > 0) {
            $status = true;
        } else {
            $status = false;
        }
        return $status;
    }

    public function getEventInstance($eventID) {
        $whereArray = array('EVENT_ID' => $eventID);
        $query = $this->db->get_where('event_instance', $whereArray);
        return $query->result_array();
    }

    public function getEventInstancePrice($ticketpriceID) {
        $whereArray = array('TICKET_PRICE_ID' => $ticketpriceID);
        $query = $this->db->get_where('ticket_price', $whereArray);
        $id = $query->row_array();
        return $id['TICKET_PRICE'];
    }

    public function eventInstanceExist($ticketInstanceID) {

        $this->db->where('EVENT_INSTANCE_ID', $ticketInstanceID);
        $query = $this->db->get('EVENT_INSTANCE');

        if ($query->num_rows == 1) {
            return $query->row_array();
        } else {
            return false;
        }
    }

    public function getAllCategory() {

        $query = $this->db->get('EVENT_CATEGORY');
        return $query->result_array();
    }

    private function generateEventID() {
        //
    }

}

?>
