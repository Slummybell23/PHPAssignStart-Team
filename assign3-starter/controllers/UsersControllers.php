<?php
    //include "ControllerAction.php";
    //include "model/UsersDAO.php";


    class UserList implements ControllerAction{

        function processGET(){
            $UsersDAO = new UserDAO();
            $users = $UsersDAO->getUsers();
            $_REQUEST['users']=$users;
            return "views/Users.php";
        }

        function processPOST(){
            return;
        }

        function getAccess(){
            return "PROTECTED";
        }

    }

    class usersAdd implements ControllerAction{

        function processGET(){
            return "views/addUsers.php";
        }

        function processPOST(){
            $username=$_POST['username'];
            $email=$_POST['email'];
            $passwd=$_POST['passwd'];
            $users = new users();
            $users->setUserID($userID);
            $users->setUsername($username);
            $users->setLastname($lastname);
            $users->setFirstname($firstname);
            $users->setPassword($password);
            $users->setEmail($email);
            $users->setRole($role);
            $users->setLastModified($lastModified);
            $usersDAO = new usersDAO();
            $usersDAO->addUsers($users);
            header("Location: controller.php?page=list");
            exit;
        }

        function getAccess(){
            return "PROTECTED";
        }      

    }

    class UsersDelete implements ControllerAction{

        function processGET(){
            $usersID = $_GET['usersID'];
            return 'views/delUsers.php';

        }

        function processPOST(){
            $usersID=$_POST['usersID'];
            $submit=$_POST['submit'];
            if($submit=='CONFIRM'){
                $usersDAO = new usersDAO();
                $usersDAO->deleteUsers($usersID);
            }
            header("Location: controller.php?page=list");
            exit;
        }

        function getAccess(){
            return "PROTECTED";
        }

    }

?>