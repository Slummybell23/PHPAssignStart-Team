<?php
    include_once "controllers/ControllerAction.php";
    include_once "controllers/ContactControllers.php";
    include_once "controllers/ArticleControllers.php";
    include_once "controllers/TopicControllers.php";
    include_once "models/ContactDAO.php";
    include_once "controllers/CommentControllers.php";
    include_once "models/CommentDAO.php";
    include_once "models/ArticleDAO.php";

    include_once "controllers/UsersControllers.php";
    include_once "models/UsersDAO.php";

    class FrontController { 
        private $controllers;
        

        public function __construct(){
            $this->showErrors(1);
            $this->controllers = $this->loadControllers();
        }

        public function run(){
            session_start();

            //***** 1. Get Request Method and Page Variable *****/
            $method = $_SERVER['REQUEST_METHOD'] != ""? $_SERVER['REQUEST_METHOD'] : "GET";
            $page = "home";
            if (isset($_REQUEST['page'])) {
                $page = $_REQUEST['page'];
            }
              
            //***** 2. Route the Request to the Controller Based on Method and Page *** */
            $controller = $this->controllers[$method.$page];
            //** 3. Check Security Access ***/
            $controller = $this->securityCheck($controller);

            //** 4. Execute the Controller */
            if($method=='GET'){
                $content=$controller->processGET();
            }
            if($method=='POST'){
                $controller->processPOST();
            }

            //**** 5. Render Page Template */
            include "template/template.php";
        }

        private function loadControllers(){
        /******************************************************
         * Register the Controllers with the Front Controller *
         ******************************************************/
            $controllers["GET"."list"] = new ContactList();
            $controllers["GET"."add"] = new ContactAdd();
            $controllers["POST"."add"] = new ContactAdd();
            $controllers["GET"."delete"] = new ContactDelete();
            $controllers["POST"."delete"] = new ContactDelete();
            $controllers["GET"."login"] = new Login();
            $controllers["POST"."login"] = new Login();
            $controllers["GET"."home"] = new Home();
            $controllers["GET"."about"] = new About();

            $controllers["GET"."listComments"] = new CommentList();
            $controllers["GET"."addComments"] = new CommentAdd();
            $controllers["POST"."addComments"] = new CommentAdd();
            $controllers["GET"."deleteComments"] = new CommentDelete();
            $controllers["POST"."deleteComments"] = new CommentDelete();
            
            $controllers["GET"."listArticles"] = new ArticleList();
            $controllers["POST"."listArticles"] = new ArticleList();
            $controllers["GET"."addArticle"] = new ArticleAdd();
            $controllers["POST"."addArticle"] = new ArticleAdd();
            $controllers["GET"."deleteArticle"] = new ArticleDelete();
            $controllers["POST"."deleteArticle"] = new ArticleDelete();
            
            $controllers["GET"."listTopics"]   = new TopicList();
            $controllers["POST"."listTopics"]  = new TopicList();
            $controllers["GET"."addTopic"]     = new TopicAdd();
            $controllers["POST"."addTopic"]    = new TopicAdd();
            $controllers["GET"."deleteTopic"]  = new TopicDelete();
            $controllers["POST"."deleteTopic"] = new TopicDelete();

            $controllers["GET"."users"] = new UsersList();
            $controllers["GET"."add"] = new UsersAdd();
            $controllers["POST"."add"] = new UsersAdd();
            $controllers["GET"."delete"] = new UsersDelete();
            $controllers["POST"."delete"] = new Users

            return $controllers;
        }

        private function securityCheck($controller){
        /******************************************************
         * Check Access restrictions for selected controller  *
         ******************************************************/
            if($controller->getAccess()=='PROTECTED'){
                if(!isset($_SESSION['loggedin'])){
                    //*** Not Logged In ****/
                    $controller = $this->controllers["GET"."login"];
                }
            }
            return $controller;
        }

        private function showErrors($debug){
            if($debug==1){
                ini_set('display_errors', 1);
                ini_set('display_startup_errors', 1);
                error_reporting(E_ALL);
            }
        }
    }

    $controller = new FrontController();
    $controller->run();
?>