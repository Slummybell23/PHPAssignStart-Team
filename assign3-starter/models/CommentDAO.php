<?php
    include_once 'Comment.php';

    class CommentDAO {


        public function getConnection(){
            $mysqli = new mysqli("localhost", "bloguser", "blogAssign3", "blogdb");
            if ($mysqli->connect_errno) {
                $mysqli=null;
            }
            return $mysqli;
        }

        public function addComment($comment){
            $connection=$this->getConnection();
            $stmt = $connection->prepare("INSERT INTO comments (authorID, artID, content) VALUES (?, ?, ?)");
            $stmt->bind_param("iis", $comment->getAuthorID(), $comment->getArtID(), $comment->getContent());
            $stmt->execute();
            $stmt->close();
            $connection->close();
        }

        public function deleteComment($comID){
            $connection=$this->getConnection();
            $stmt = $connection->prepare("DELETE FROM comment WHERE comID = ?");
            $stmt->bind_param("i", $comID);
            $stmt->execute();
            $stmt->close();
            $connection->close();
        }

        public function getComments(){
            $connection=$this->getConnection();
            $stmt = $connection->prepare("SELECT * FROM comments;"); 
            $stmt->execute();
            $result = $stmt->get_result();
            $comments = null;
            while($row = $result->fetch_assoc()){
                $comment = new Comment();
                $comment->load($row);
                $comments[]=$comment;
            }    
            $stmt->close();
            $connection->close();
            return $comments;
        }

        /*
        public function authenticate($username, $passwd){
            $connection=$this->getConnection();
            $stmt = $connection->prepare("SELECT * FROM contacts WHERE username = ? and passwd = ?;");
            $stmt->bind_param("ss",$username,$passwd); 
            $stmt->execute();
            $result = $stmt->get_result();
            $found=$result->fetch_assoc();
            $stmt->close();
            $connection->close();
            var_dump($found);
            return $found;
        }
            */

    }
?>
