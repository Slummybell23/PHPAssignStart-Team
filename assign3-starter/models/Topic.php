<?php
class Topic {
    private int $topID;
    private string $name;
    private string $description;
    private string $lastModified;

    public function __construct(int $topID, string $name, string $description, string $lastModified) {
        $this->topID = $topID;
        $this->name = $name;
        $this->description = $description;
        $this->lastModified = $lastModified;
    }

    public function getTopID(): int {
        return $this->topID;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getDescription(): string {
        return $this->description;
    }

    public function getLastModified(): string {
        return $this->lastModified;
    }
}
?>