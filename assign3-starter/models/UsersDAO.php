<?php
    include_once 'Users.php';

    class UsersDAO {


        public function getConnection(){
            $mysqli = new mysqli("localhost", "bloguser", "blogAssign3", "blogdb");
            if ($mysqli->connect_errno) {
                $mysqli=null;
            }
            return $mysqli;
        }

        public function addUsers($users){
            $connection=$this->getConnection();
            $stmt = $connection->prepare("INSERT INTO users (userId, username, lastname, firstname, password, email, role, lastModified) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssssss", $users->getUserID(), $users->getUsername(), $users->getLastname(), $users->getFirstname(), $users->getPassword(), $users->getEmail(), $users->getRole(), $users->getLastModified());
            $stmt->execute();
            $stmt->close();
            $connection->close();
        }

        public function deleteUsers($usersID){
            $connection=$this->getConnection();
            $stmt = $connection->prepare("DELETE FROM users WHERE usersID = ?");
            $stmt->bind_param("i", $usersID);
            $stmt->execute();
            $stmt->close();
            $connection->close();
        }

        public function getUsers(){
            $connection=$this->getConnection();
            $stmt = $connection->prepare("SELECT * FROM users;"); 
            $stmt->execute();
            $result = $stmt->get_result();
            while($row = $result->fetch_assoc()){
                $users = new users();
                $users->load($row);
                $users[]=$users;
            }    
            $stmt->close();
            $connection->close();
            return $users;
        }

        public function authenticate($username, $passwd){
            $connection=$this->getConnection();
            $stmt = $connection->prepare("SELECT * FROM contact WHERE username = ? and passwd = ?;");
            $stmt->bind_param("ss",$username,$passwd); 
            $stmt->execute();
            $result = $stmt->get_result();
            $found=$result->fetch_assoc();
            $stmt->close();
            $connection->close();
            var_dump($found);
            return $found;
        }

    }
?>
