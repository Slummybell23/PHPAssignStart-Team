<?php
    //include "ControllerAction.php";
    //include "model/ContactDAO.php";


    class CommentList implements ControllerAction{

        function processGET(){
            $commentDAO = new CommentDAO();
            $comments = $commentDAO->getComments();
            $_REQUEST['comments']=$comments;
            return "views/listComments.php";
        }

        function processPOST(){
            return;
        }

        function getAccess(){
            return "PROTECTED";
        }

    }

    class CommentAdd implements ControllerAction{

        function processGET(){
            return "views/addComment.php";
        }

        function processPOST(){
            $authorID=$_POST['authorID'];
            $artID=$_POST['artID'];
            $content=$_POST['content'];
            $lastModified=$_POST['lastModified'];
            $comment = new Comment();
            $comment->setAuthorID($authorID);
            $comment->setArtID($artID);
            $comment->setContent($content);
            $comment->setLastModified($lastModified);
            $commentDAO = new CommentDAO();
            $commentDAO->addComment($comment);
            header("Location: controller.php?page=listComments");
            exit;
        }

        function getAccess(){
            return "PROTECTED";
        }      

    }

    class CommentDelete implements ControllerAction{

        function processGET(){
            $commentID = $_GET['comID'];
            return 'views/delComment.php';

        }

        function processPOST(){
            $commentID=$_POST['comID'];
            $submit=$_POST['submit'];
            if($submit=='CONFIRM'){
                $commentDAO = new CommentDAO();
                $commentDAO->deleteComment($commentID);
            }
            header("Location: controller.php?page=listComments");
            exit;
        }

        function getAccess(){
            return "PROTECTED";
        }

    }

    class Article implements ControllerAction{

        function processGET(){
            return "views/listComments.php"; //merge logans
        }

        function processPOST(){
            return;
        }

        function getAccess(){
            return "PUBLIC";
        }

    }
        

?>