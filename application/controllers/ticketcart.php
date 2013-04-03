<?php

class TicketCart extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->cart();
    }

    public function add() {

        $is_logged_in = $this->session->userdata('is_logged_in');
        if ($is_logged_in == true) {

            $instanceID = $this->input->post('instanceID');
            $qty = $this->input->post('qty');
            $name = $this->input->post('name');
            $price = $this->input->post('price');
            $ticketID = $this->input->post('ticketID');
            $ticketCategory = $this->input->post('ticketCategory');
            // $buildingName = $this->input->post('buildingName');
            $cityName = $this->input->post('cityName');

            $eventID = $this->input->post('eventID');
            $eventTime = $this->input->post('eventTime');
            $eventDate = $this->input->post('eventDate');

            //i.e If we have a valid ticket ID and event instance ID in the database

            if (Ticket::ticketExist($ticketID) && EVENT::eventInstanceExist($instanceID)) {
                $data = array(
                    'id' => $instanceID,
                    'name' => $name,
                    'qty' => $qty,
                    'price' => $price,
                    'eventID' => $eventID,
                    'eventTime' => $eventTime,
                    'eventDate' => $eventDate,
                    'ticketID' => $ticketID,
                    'ticketCategory' => $ticketCategory,
                    'cityName' => $cityName
                        //'buildingName' => $buildingName
                );

                $this->cart->insert($data);
                redirect('/cart');
            } else {
                echo "Sorry ticket does not exist";
                return false;
            }
        } else {
            redirect('/login');
        }
    }

    public function cart() {

        $data['city'] = $this->city->getCity(); //for links
        $data['main_content'] = "displaycart"; //body of page
        $this->load->view('includes/templates.php', $data);
    }

    function update_cart() {
        // $total = $this->cart->total_items();
        $is_logged_in = $this->session->userdata('is_logged_in');
        if ($is_logged_in == true) {


            $total = count($this->cart->contents());

            $rowid = $this->input->post('rowid');
            $qty = $this->input->post('qty');

            // Cycle true all items and update them  
            for ($i = 0; $i < $total; $i++) {
                // Create an array with the products rowid's and quantities.  
                $data = array(
                    'rowid' => $rowid[$i],
                    'qty' => $qty[$i]
                );
                $this->cart->update($data);
            }
            redirect('/cart');
        } else {
            redirect('/login');
        }
    }

    public function remove($rowID) {
        $is_logged_in = $this->session->userdata('is_logged_in');
        if ($is_logged_in == true) {

            $data = array(
                'rowid' => $rowID,
                'qty' => 0
            );
            $this->cart->update($data);
            redirect('/cart');
        } else {
            redirect('/login');
        }
    }

}

?>
