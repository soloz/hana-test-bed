<?php

class User extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function validateUser() {

        $this->db->where('email', $this->input->post('email'));
        $this->db->where('password', md5($this->input->post('password')));
        $query = $this->db->get('USERS');

        if ($query->num_rows == 1) {
            return $query->row_array();
        } else {
            return false;
        }
    }

    public function createUser($userdetails = array()) {

        $new_user = array(
            'user_id' => $this->generateUserID(),
            'firstname' => $userdetails['firstname'],
            'lastname' => $userdetails['lastname'],
            'email' => $userdetails['email'],
            'password' => md5($userdetails['password']),
            'status' => 'PASSIVE',
            'user_type' => 'USER'
        );
        if ($this->db->insert('USERS', $new_user)) {
            return true;
        }
    }

    public function getUser($email) {

        $this->db->where('email', $email);
        $query = $this->db->get('USERS');

        return $query->row_array();
    }

    public function emailExist($email) {

        $this->db->where('email', $email);
        $query = $this->db->get('USERS');

        if ($query->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    /*
     * 
     * 

      public function usernameExist($username) {

      $this->db->where('username', $username);
      $query = $this->db->get('USERS');

      if ($query->num_rows > 0) {
      return true;
      } else {
      return false;
      }
      }
     * 
     * 
     * 
     */

    public function getUserID($userID) {
        
    }

    private function generateUserID() {
        return rand(99999, 1000000);
    }

}

?>
