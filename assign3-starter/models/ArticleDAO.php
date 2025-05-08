<?php

    include_once 'Article.php';
    
    class ArticleDAO {

        //Function use to connect to database
        public function getConnection(){
            $mysqli = new mysqli("localhost", "bloguser", "blogAssign3", "blogdb");
            if ($mysqli->connect_errno) {$mysqli=null;}
            return $mysqli;
        }
    
        //Add an article to the database
        //Use an Article object to add the article to the database
        public function addArticle($article){
            $connection=$this->getConnection();
            $stmt = $connection->prepare("INSERT INTO articles (authorID, topID, title, image, content) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("iisss", $article->getAuthorID(), $article->getTopicID(), $article->getTitle(), $article->getImage(), $article->getContent());
            $stmt->execute();
            $stmt->close();
            $connection->close();
        }

        //Delete an article from the database
        //Use the articleID to delete the article from the database
        public function deleteArticle($articleID) {
            $conn = $this->getConnection();
            $stmt = $conn->prepare("DELETE FROM articles WHERE artID = ?");
            $stmt->bind_param("i", $articleID);
            $stmt->execute();
            $stmt->close();
            $conn->close();
        }        

        //Get an Article from the database with a certain Topic
        //Return the array of article objects
        public function getArticle($artID) {
            $connection = $this->getConnection();
            $stmt = $connection->prepare("SELECT * FROM articles WHERE artID = ?");
            $stmt->bind_param("i", $artID);
            $stmt->execute();
            $result = $stmt->get_result();
        
            $article = null;
        
            if ($row = $result->fetch_assoc()) {
                $article = new Article();
                $article->load($row);
            }
        
            $stmt->close();
            $connection->close();
            
            return $article;
        }
        
    
        //Get all articles from the database and store in an array of Article objects
        //Return the array of Article objects
        public function getArticles(){
            $connection=$this->getConnection();
            $stmt = $connection->prepare("SELECT * FROM articles;"); 
            $stmt->execute();
            $result = $stmt->get_result();
            while($row = $result->fetch_assoc()){
                $article = new Article();
                $article->load($row);
                $articles[]=$article;
            }    

            $stmt->close();
            $connection->close();

            return $articles;
        }
    }
?>