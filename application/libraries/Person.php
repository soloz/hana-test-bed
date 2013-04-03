<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Person
 *
 * @author Ayo
 */
class Person {

    var $firstname;
    var $lastname;

   public function createPerson($fname, $lname) {
        $this->setFirstname($fname);
        $this->setLastname($lname);
    }

    public function getFirstname() {
        return $this->firstname;
    }

    public function getlastname() {
        return $this->lastname;
    }

    public function setFirstname($f) {
        $this->firstname = $f;
    }

    public function setLastname($l) {
        $this->lastname = $l;
    }

}

?>
