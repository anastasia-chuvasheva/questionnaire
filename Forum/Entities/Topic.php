<?php namespace Entities;

use DateTime;

class Topic {
    /**
     * 
     * @var integer
     */
    private $id;
    /**
     * 
     * @var string
     */
    private $name;
    /**
     * 
     * @var string
     */
    private $description;
    
    /**
     * 
     * @var string
     */
    private $creator;
    
    /**
     * 
     * @var DateTime
     */
    private $timestamp;
    
    /**
     * @param int $id
     * @param string $name
     * @param string $description
     * @param string $creator
     * @param DateTime $timestamp
     */
    
    public function __construct(int $id, string $name, string $description, string $creator, DateTime $timestamp) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->creator = $creator;
        $this->timestamp = $timestamp;
    }
    /**
     * 
     * @return int
     */
    public function getId (): int {
        return $this->id;
    }
    /**
     * 
     * @return string
     */
    public function getName (): string {
        return $this->name;
    }
    /**
     * 
     * @param string $name
     * @return Topic
     */
    public function setName (string $name): Topic {
        $this->name = $name;
        return $this;
    }
    /**
     * 
     * @return string
     */
    public function getDescription (): string {
        return $this->description;
    }
    /**
     * 
     * @param string $description
     * @return Topic
     */
    public function setDescription (string $description): Topic {
        $this->description = $description;
        return $this;
    }
    /**
     * 
     * @return string
     */
    public function getCreator(): string {
        return $this->creator;
    }
    /**
     * 
     * @param string $creator
     * @return Topic
     */
    public function setCreator(string $creator): Topic {
        $this->creator=$creator;
        return $this;
    }
    /**
     * 
     * @return DateTime
     */
    public function getTimestamp (): DateTime {
        return $this->timestamp;
    }
    /**
     * 
     * @param DateTime $timestamp
     * @return Topic
     */
    public function setTimestamp (DateTime $timestamp): Topic {
        $this->timestamp = $timestamp;
        return $this;
    }
    /**
     * 
     * @param array $data
     * @return Topic
     */
    public static function create(array $data): Topic 
    {
        $id = $data['id'];
        $name = $data['name'];
        $description = $data['description'];
        $creator = $data['creator'];
        $timestamp = $data['timestamp'];
        
        return new Topic($id, $name, $description, $creator, $timestamp);
    }
}
