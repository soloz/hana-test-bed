<?php


class EventInstance extends CI_Model{
    
     function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function getEventInstance($eventID) {
        $query = $this->db->query("SELECT * from EVENT_INSTANCE where EVENT_ID = $eventID ");
         return $query->result_array();
    }

    public function getEventInstancePrice($ticketpriceID){
        $query = $this->db->query("SELECT * from TICKET_PRICE where TICKET_PRICE_ID = $ticketpriceID ");
        $mPrice = $query->row_array();
        return $mPrice['TICKET_PRICE'];
    }
    
   
    
    
}

?>
