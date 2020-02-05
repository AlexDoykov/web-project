<?php

class Person
{
    public $firstname;
    public $lastname;
    public $email;
    public $password;
    public $group;
    public $potok;
    public $specialty;
    public $graduation_year;


    function __construct($firstname,$lastname,$email,$password,$group,$potok,$specialty,$graduation_year) 
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        for ($i = 0; $i < 10000; $i++) {
            $password=$password->md5;
        }
        $this->password = $password;
        $this->email= $email;
        $this->group = $group;
        $this->potok = $potok;
        $this->specialty = $specialty;
        $this->graduation_year = $graduation_year;
    }
    function __destruct() {}

    function get_firstname()
     {
         return $this->firstname;
     }

     function get_lastname()
     {
         return $this->lastname;
     }
     function get_email()
     {
         return $this->email;
     }
     function get_group()
     {
         return $this->group;
     }
     function get_potok()
     {
         return $this->potok;
     }
     function get_specialty()
     {
         return $this->specialty;
     }
     function get_graduationyear()
     {
         return $this->graduation_year;
     }
        
}



?>