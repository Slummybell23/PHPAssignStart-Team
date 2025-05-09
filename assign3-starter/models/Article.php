<?php

    class Article {

        // Private variables representing database columns
        private int $articleID;
        private int $authorID;
        private int $topicID;
        private string $title;
        private string $image;
        private string $content;
        private string $lastModified;

        // Constructor to initialize the object
        public function load(array $row) {
            $this->setArticleID($row['artID']);
            $this->setAuthorID($row['authorID']);
            $this->setTopicID($row['topID']);
            $this->setTitle($row['title']);
            $this->setImage($row['image']);
            $this->setContent($row['content']);
            $this->setLastModified($row['lastModified']);
        }

        // Getters and setters
        public function setArticleID(int $articleID) {$this->articleID = $articleID;}
        public function getArticleID() {return $this->articleID;}

        public function setAuthorID(int $authorID) {$this->authorID = $authorID;}
        public function getAuthorID() {return $this->authorID;}

        public function setTopicID(int $topicID) {$this->topicID = $topicID;}
        public function getTopicID() {return $this->topicID;}

        public function setTitle(string $title) {$this->title = $title;}
        public function getTitle() {return $this->title;}

        public function setImage(string $image) {$this->image = $image;}
        public function getImage() {return $this->image;}

        public function setContent(string $content) {$this->content = $content;}
        public function getContent() {return $this->content;}

        public function setLastModified(string $lastModified) {$this->lastModified = $lastModified;}
        public function getLastModified() {return $this->lastModified;}
    }

?>