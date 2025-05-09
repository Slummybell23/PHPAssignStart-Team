<?php
require_once __DIR__ . '/Topic.php';

class TopicDAO {
    private mysqli $mysqli;

    public function __construct() {
        $this->mysqli = new mysqli("127.0.0.1", "bloguser", "blogAssign3", "blogdb");

        if ($this->mysqli->connect_errno) {
            throw new Exception("Failed to connect to MySQL: " . $this->mysqli->connect_error);
        }
    }

    public function getTopics(): array {
        $stmt = $this->mysqli->prepare("SELECT topID, name, description, lastModified FROM topics ORDER BY topID ASC");
        $stmt->execute();
        $result = $stmt->get_result();

        $topics = [];
        while ($row = $result->fetch_assoc()) {
            $topics[] = new Topic(
                (int)$row['topID'],
                $row['name'],
                $row['description'],
                $row['lastModified']
            );
        }

        $stmt->close();
        return $topics;
    }

    public function addTopic(string $name, string $description): bool {
        $stmt = $this->mysqli->prepare("INSERT INTO topics (name, description) VALUES (?, ?)");
        $stmt->bind_param("ss", $name, $description);
        $success = $stmt->execute();
        $stmt->close();
        return $success;
    }

    public function deleteTopic(int $topID): bool {
        $stmt = $this->mysqli->prepare("DELETE FROM topics WHERE topID = ?");
        $stmt->bind_param("i", $topID);
        $success = $stmt->execute();
        $stmt->close();
        return $success;
    }

    public function getTopic(int $topID): ?Topic {
        $stmt = $this->mysqli->prepare("SELECT topID, name, description, lastModified FROM topics WHERE topID = ?");
        $stmt->bind_param("i", $topID);
        $stmt->execute();

        $result = $stmt->get_result();
        $topic = null;
        if ($row = $result->fetch_assoc()) {
            $topic = new Topic(
                (int)$row['topID'],
                $row['name'],
                $row['description'],
                $row['lastModified']
            );
        }
        $stmt->close();
        return $topic;
    }

    public function __destruct() {
        $this->mysqli->close();
    }
}
?>