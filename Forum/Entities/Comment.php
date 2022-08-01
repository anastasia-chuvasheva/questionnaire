<?php

namespace Entities;

use Repositories\ForumRepository;
use DateTime;

class Comment {

    /**
     * 
     * @var int
     */
    private $id;

    /**
     * 
     * @var Topic
     */
    private $topic;

    /**
     * 
     * @var string
     */
    private $comment;
    /**
     * 
     * @var DateTime
     */
    private $timestamp;

    /**
     * 
     * @param int $id
     * @param Topic $topic
     * @param string $comment
     */
    public function __construct(int $id, Topic $topic, string $comment, DateTime $timestamp) {
        $this->id = $id;
        $this->topic = $topic;
        $this->comment = $comment;
        $this->timestamp = $timestamp;
    }

    /**
     * 
     * @return int
     */
    public function getId(): int {
        return $this->id;
    }

    /**
     * 
     * @return Topic
     */
    public function getTopic(): Topic {
        return $this->topic;
    }

    /**
     * 
     * @param Topic $topic
     * @return Comment
     */
    public function setTopic(Topic $topic): Comment {
        $this->topic = $topic;
        return $this;
    }

    /**
     * 
     * @return string
     */
    public function getComment(): string {
        return $this->comment;
    }

    /**
     * 
     * @param string $comment
     * @return Comment
     */
    public function setComment(string $comment): Comment {
        $this->comment = $comment;
        return $this;
    }
    
    public function getTimestamp (): DateTime {
        return $this->timestamp;
    }
    
    public function setTimestamp (DateTime $timestamp) : Comment {
        $this->timestamp = $timestamp;
        return $this;
    }
    
    public static function create(array $data): Comment
    {
        $id = $data['id'];
        
        $forumRepository = new ForumRepository();
        $topic = $forumRepository->findTopic($data['topic_id']);
        $comment = $data['comment'];
        $timestamp = new DateTime ($data['timestamp']);
        
        return new Comment($id, $topic, $comment, $timestamp);
    }

}
