<?php
    //include "ControllerAction.php";
    //include "model/ContactDAO.php";


    class ContactList implements ControllerAction{

        function processGET(){
            $contactDAO = new ContactDAO();
            $contacts = $contactDAO->getContacts();
            $_REQUEST['contacts']=$contacts;
            return "views/listContact.php";
        }

        function processPOST(){
            return;
        }

        function getAccess(){
            return "PROTECTED";
        }

    }

    class ContactAdd implements ControllerAction{

        function processGET(){
            return "views/addContact.php";
        }

        function processPOST(){
            $username=$_POST['username'];
            $email=$_POST['email'];
            $passwd=$_POST['passwd'];
            $contact = new Contact();
            $contact->setUsername($username);
            $contact->setEmail($email);
            $contact->setPasswd($passwd);
            $contactDAO = new ContactDAO();
            $contactDAO->addContact($contact);
            header("Location: controller.php?page=list");
            exit;
        }

        function getAccess(){
            return "PROTECTED";
        }      

    }

    class ContactDelete implements ControllerAction{

        function processGET(){
            $contactid = $_GET['contactID'];
            return 'views/delContact.php';

        }

        function processPOST(){
            $contactid=$_POST['contactID'];
            $submit=$_POST['submit'];
            if($submit=='CONFIRM'){
                $contactDAO = new ContactDAO();
                $contactDAO->deleteContact($contactid);
            }
            header("Location: controller.php?page=list");
            exit;
        }

        function getAccess(){
            return "PROTECTED";
        }

    }

    class Login implements ControllerAction{

        function processGET(){
            return "views/login.php";
        }

        function processPOST(){
            $username=$_POST['username'];
            $passwd=$_POST['passwd'];
            $contactDAO = new ContactDAO();
            $found=$contactDAO->authenticate($username,$passwd);
            if($found==null){
                $nextView="Location: controller.php?page=login";
            }else{
                $nextView="Location: controller.php?page=list";
                $_SESSION['loggedin']='TRUE';
            }
            header($nextView);
            exit;       
        }
        function getAccess(){
            return "PUBLIC";
        }

    }

    class Home implements ControllerAction{

        function processGET(){
            return "views/home.php";
        }

        function processPOST(){
            return;
        }

        function getAccess(){
            return "PUBLIC";
        }

    }

    class About implements ControllerAction{

        function processGET(){
            return "views/about.php";
        }

        function processPOST(){
            return;
        }

        function getAccess(){
            return "PUBLIC";
        }

    }

    class ArticleList implements ControllerAction {
        function processGET() {
            $articleDAO = new ArticleDAO();
            $articles[] = $articleDAO->getArticles();
            $_REQUEST['articles'] = $articles;
            return "views/listArticles.php";
        }
        function processPOST() {
            return;
        }
        function getAccess() {
            return "PROTECTED";
        }
    }

    class ArticleDelete implements ControllerAction {
        function processGET() {
            $articleID = $_GET['artID'];
            return 'views/delArticle.php';
        }
        function processPOST() {
            $articleID = $_POST['artID'];
            $submit = $_POST['submit'];
            if ($submit == 'CONFIRM') {
                $articleDAO = new ArticleDAO();
                $articleDAO->deleteArticle($articleID);
            }
            header("Location: controller.php?page=list");
            exit;
        }
        function getAccess() {
            return "PROTECTED";
        }
    }

    class ArticleAdd implements ControllerAction {
        function processGET() {
            return "views/addArticle.php";
        }
        function processPOST() {
            $authorID = $_POST['authorID'];
            $categoryID = $_POST['categoryID'];
            $title = $_POST['title'];
            $image = $_POST['image'];
            $content = $_POST['content'];
            $article = new Article();
            $article->setAuthorID($authorID);
            $article->setCategoryID($categoryID);
            $article->setTitle($title);
            $article->setImage($image);
            $article->setContent($content);
            $articleDAO = new ArticleDAO();
            $articleDAO->addArticle($article);
            header("Location: controller.php?page=list");
            exit;
        }
        function getAccess() {
            return "PROTECTED";
        }
    }

?>