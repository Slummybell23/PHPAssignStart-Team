<?php
    class Contact{
        private $contactID;
        private $username;
        private $email;
        private $passwd;

        public function load($row){
            $this->setTopicID($row['contactID']);
            $this->setName($row['username']);
            $this->setDescription($row["email"]);
            $this->setLastModified($row["passwd"]);
        }

        public function setTopicID($contactID){
            $this->contactID=$contactID;
        }

        public function getContactID(){
            return $this->contactID;
        }

        public function setName($username){
            $this->username=$username;
        }

        public function getUsername(){
            return $this->username;
        }

        public function setDescription($email){
            $this->email=$email;
        }

        public function getEmail(){
            return $this->email;
        }

        public function setLastModified($passwd){
            $this->passwd=$passwd;
        }

        public function getPasswd(){
            return $this->passwd;
        }
    }
?>