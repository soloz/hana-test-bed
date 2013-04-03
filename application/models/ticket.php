<?php

class Ticket extends CI_Model {

    function __construct() {
        parent::__construct();
        //I have autoloaded the database
    }

    public function getTickets($cityId) {
        if ($cityId == 0) {
            //city id of zero means nationwide 
            //event instance does not store any record with city id of 0
            //so we select all ticketIDs
            $mSQL = "SELECT ticket_id FROM `event_instance`";
        } elseif (City::validCityID($cityId)) {
            $mSQL = "SELECT ticket_id FROM `event_instance` WHERE 
            city_ID = $cityId ";
        } else {
            $mSQL = "SELECT ticket_id FROM `event_instance`";
        }

        $query = $this->db->query($mSQL);

        $newbb = array();
        foreach ($query->result_array() as $key => $value) {
            foreach ($value as $innerValue) {
                $newbb[] = $innerValue;
            }
        }
        $ids = join("','", $newbb);
        $sql = "SELECT * FROM tickets WHERE TICKET_STATUS_ID = 1 AND 
        ticket_id IN ('$ids')";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    //helper function

    public function getTicketImage($eventID) {

        $whereArray = array('EVENT_ID' => $eventID);
        $query = $this->db->get_where('tickets', $whereArray);
        
        $id = $query->row_array();
        return $id['TICKET_IMAGE_SMALLER'];
    }
    
     public function getTicketName($ticketID) {

        $whereArray = array('TICKET_ID' => $ticketID);
        $query = $this->db->get_where('tickets', $whereArray);
        
        $id = $query->row_array();
        return $id['TICKET_NAME'];
    }
    
    public function getTicketCategory($ticketPriceID) {

        $whereArray = array('TICKET_PRICE_ID' => $ticketPriceID);
        $query = $this->db->get_where('ticket_price', $whereArray);
        $id = $query->row_array();
        return $id['TICKET_PRICE_CATEGORY'];
    }
    
       
    
    public function ticketExist($ticketID){
        
        $this->db->where('TICKET_ID', $ticketID);
        $query = $this->db->get('tickets');

        if ($query->num_rows == 1) {
            return $query->row_array();
        } else {
            return false;
        }
    }
     

    private function generateTicketID() {
        //thinking it should start with the event ID + random number
        //e.g event Id of 1024
        //random of 345353346
        //will become ticketID 1024345353346
        //we could change this logic later
    }

}

?>
