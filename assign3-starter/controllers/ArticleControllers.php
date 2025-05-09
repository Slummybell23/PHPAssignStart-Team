<?php

require_once __DIR__ . '/../models/ArticleDAO.php';
require_once __DIR__ . '/../models/Article.php'; 

    class ArticleList implements ControllerAction {
        function processGET() {
            $articleDAO = new ArticleDAO();
            $articles = $articleDAO->getArticles();
            $_REQUEST['articles'] = $articles;
            return "views/listArticles.php";
        }        
        function processPOST() {
            return "views/listArticles.php";
        }
        function getAccess() {
            return "PROTECTED";
        }
    }

    class ArticleDelete implements ControllerAction {
        public function getAccess() {
            return "PROTECTED";
        }
    
        public function processGET() {
            $articleDAO = new ArticleDAO();
            $article = null;
    
            if (isset($_GET['artID'])) {
                $artID = $_GET['artID'];
                $article = $articleDAO->getArticle($artID);
    
                if ($article != null) {
                    $_REQUEST['artID'] = $article->getArticleID();
                    $_REQUEST['title'] = $article->getTitle();
                } else {
                    $_REQUEST['artID'] = null;
                    $_REQUEST['title'] = null;
                }
            } else {
                $_REQUEST['artID'] = null;
                $_REQUEST['title'] = null;
            }
            return "views/delArticle.php";
        }
    
        public function processPOST() {    
            $articleDAO = new ArticleDAO();
    
            if (isset($_POST['artID'])) {
                $artID = $_POST['artID'];
                $articleDAO->deleteArticle($artID);
    
                header("Location: /assign3-starter/controller.php?page=listArticles");
                exit;
            }
        }
    }
    
    
    

    class ArticleAdd implements ControllerAction {
        function processGET() {
            return "views/addArticle.php";
        }
        function processPOST() {
            $authorID = $_POST['authorID'];
            $topicID = $_POST['catID'];
            $title = $_POST['title'];
            $image = $_POST['image'];
            $content = $_POST['content'];
            $article = new Article();
            $article->setAuthorID($authorID);
            $article->setTopicID($topicID);
            $article->setTitle($title);
            $article->setImage($image);
            $article->setContent($content);
            $articleDAO = new ArticleDAO();
            $articleDAO->addArticle($article);
            header("Location: /assign3-starter/controller.php?page=listArticles");
            exit;
        }
        function getAccess() {
            return "PROTECTED";
        }
    }