<?php

class Price extends CI_Model{

    private $ticket_price_id;
    private $ticket_price_category;
    private $ticket_discount;
    private $ticket_price;
    private $event_id;

    function createPrice($eventID, $price_category, $discount, $price) {
        
        //This creates a new price and price category
        //When you are creating a ticket, you select a price category.
        $this->event_id = $eventID;
        $this->ticket_price_id = NULL ; //auto increment field
        $this->ticket_price_category = $this->setTicket_price_category($price_category);
        $this->ticket_discount = $this->setTicket_discount($discount);
        $this->ticket_price = $this->setTicket_price($price);
        
        $this->db->insert('TICKET_PRICE', $this);
    }

        
    public function getTicket_price_id() {
        return $this->ticket_price_id;
    }

    public function getTicket_price_category() {
        return $this->ticket_price_category;
    }

    public function setTicket_price_category($price_category) {
        $this->ticket_price_category = $price_category;
    }

    public function getTicket_discount() {
        return $this->ticket_discount;
    }

    public function setTicket_discount($ticket_discount) {
        $this->ticket_discount = $ticket_discount;
    }

    public function getTicket_price() {
        return $this->ticket_price;
    }

    public function setTicket_price($ticket_price) {
        $this->ticket_price = $ticket_price;
    }

}

?>
