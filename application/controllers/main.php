<?php

class Main extends CI_Controller {

    //Application Controller

    function __construct() {
        parent::__construct();
    }

    public function index() {
      $this->home();     
    }

    public function home() {

        $data['main_content'] = "home"; //body of page
        $data['tickets'] = $this->ticket->getTickets(0);
        $data['city'] = $this->city->getCity();
        $data['cityName'] = $this->city->getCityName(0);
        $this->load->view('includes/templates.php', $data); //header, footer, data
        
    }

    public function city($cityID) {

        $data['city'] = $this->city->getCity(); //for links

        if (!ctype_digit($cityID) || !City::validCityID($cityID)) {
            redirect('main/city/0');
        } else {
            $data['cityName'] = $this->city->getCityName($cityID);
            $data['tickets'] = $this->ticket->getTickets($cityID);
            $data['main_content'] = "displayTickets"; //body of page
            $this->load->view('includes/templates.php', $data);
            //load the view page that will display
        }
    }

    public function Event($eventID) {

        $data['city'] = $this->city->getCity(); //for links

        if (!ctype_digit($eventID) || !Event::validEventID($eventID)) {
            redirect('main/');
        } else {
            $data['eventDetails'] = $this->event->getEvent($eventID);
            $data['eventName'] = $this->event->getEventName($eventID);
            $data['eventInstances'] = $this->event->getEventInstance($eventID);
            $data['main_content'] = "displayEvent"; //body of page
            $this->load->view('includes/templates.php', $data);
        }
    }
    
    public function eventVenue($locationInstanceID){
        $data['address'] = $this->location->getAddressDetail($locationInstanceID);
        $this->load->view('displayAddress.php', $data);
    }
    
    
    

}
?>

