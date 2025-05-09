<?php

require_once __DIR__ . '/../models/TopicDAO.php';
require_once __DIR__ . '/../models/Topic.php';

class TopicList implements ControllerAction {
    public function processGET() {
        $topicDAO = new TopicDAO();
        $topics = $topicDAO->getTopics();
        $_REQUEST['topics'] = $topics;
        return "views/listTopics.php";
    }

    public function processPOST() {
        return "views/listTopics.php";
    }

    public function getAccess() {
        return "PROTECTED";
    }
}

class TopicDelete implements ControllerAction {
    public function getAccess() {
        return "PROTECTED";
    }

    public function processGET() {
        $topicDAO = new TopicDAO();
        $topic = null;

        if (isset($_GET['topID'])) {
            $topID = $_GET['topID'];
            $topic = $topicDAO->getTopic($topID);

            if ($topic != null) {
                $_REQUEST['topID'] = $topic->getTopID();
                $_REQUEST['name']  = $topic->getName();
            } else {
                $_REQUEST['topID'] = null;
                $_REQUEST['name']  = null;
            }
        } else {
            $_REQUEST['topID'] = null;
            $_REQUEST['name']  = null;
        }
        return "views/delTopic.php";
    }

    public function processPOST() {
        $topicDAO = new TopicDAO();
        if (isset($_POST['topID'])) {
            $topID = $_POST['topID'];
            $topicDAO->deleteTopic($topID);
            header("Location: /assign3-starter/controller.php?page=listTopics");
            exit;
        }
    }
}

class TopicAdd implements ControllerAction {
    public function processGET() {
        return "views/addTopic.php";
    }

    public function processPOST() {
        $name        = $_POST['name'] ?? '';
        $description = $_POST['description'] ?? '';

        $topicDAO = new TopicDAO();
        $topicDAO->addTopic($name, $description);

        header("Location: /assign3-starter/controller.php?page=listTopics");
        exit;
    }

    public function getAccess() {
        return "PROTECTED";
    }
}
?>
