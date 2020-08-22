<?php
    class User
    {
        public $username;
        public $admin;
        public $token;

        public function __construct ($username, $admin, $token){
            $this->username = $username;
            $this->admin = $admin;
            $this->token = $token;
        }
    }
?>