<?php

class EngineHome extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('Ticket');
        $this->load->model('city');
        $this->load->model('Event');
        $this->load->model('EventInstance');
        $this->load->model('locationInstance');

        $this->load->helper('url');
    }

    public function index() {

        echo "Welcome Home";
        $data['tickets'] = $this->Ticket->getTickets(0);
        $data['city'] = $this->city->getCity();
        $this->load->view('home.php', $data);
    }

    public function city($cityID) {

        //lets check to see if this city ID is digits
        //if its digits, lets also check if it exists in the city table
        //if it is an invalid id, lets redirect the user to nationwide

        if (!ctype_digit($cityID) || !City::validCityID($cityID)) {
            redirect('/engineHome/city/0');
        } else {
            $data['cityName'] = $this->city->getCityName($cityID);
        }

        $data['city'] = $this->city->getCity();
        $data['tickets'] = $this->Ticket->getTickets($cityID);
        $this->load->view('displayTickets.php', $data);
        //load the view page that will display
    }

    public function Event($eventID) {

        $data['city'] = $this->city->getCity();
        $data['eventDetails'] = $this->Event->getEvent($eventID);
        $data['eventName'] = $this->Event->getEventName($eventID);
        $data['eventInstances'] = $this->EventInstance->getEventInstance($eventID);


        $this->load->view('displayEvent.php', $data);
    }

}
?>

