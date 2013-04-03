<?php

class Cart_Model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function add_to_cart($unit_ticket = array()) {

        $ticket = array(
            'id' => $unit_ticket['id'],
            'name' => $unit_ticket['ticketName'],
            'qty' => $unit_ticket['qty'],
            'price' => $unit_ticket['price']
        );

        if ($this->cart->add('CART', $ticket)) {
            return true;
        }
    }

}

?>
