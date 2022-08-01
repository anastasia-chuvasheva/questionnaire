<?php

namespace Repositories;

use Entities\Topic;
use Entities\Comment;
use mysqli;
use DateTime;

class ForumRepository {

    public function runQuery(string $sql): ?object {

        $servername = "localhost";
        $dbname = "forum";
        $username = "root";
        $password = "password";

// Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $result = $conn->query($sql);

        if ($result->num_rows === 0) {
            return null;
        }

        return $result;
    }

    public function findCommentsByTopicId(int $id): array {

        $sql = "SELECT * FROM `comment` WHERE topic_id=$id";

        $result = $this->runQuery($sql);
       
        $array = [];
        foreach ($result as $row) {

            $array[] = Comment::create($row);
        }
        return $array;
    }

    public function findTopic(int $id): ?Topic {
        $sql = "SELECT * FROM topic WHERE id=$id";

        $result = $this->runQuery($sql);

        $row = $result->fetch_assoc();

        $timestamp = new DateTime($row["timestamp"]);

        $row["timestamp"] = $timestamp;

//        $dateTime = DateTime::createFromFormat('Y-m-d H:i:s',$row["timestamp"]);

        return Topic::create($row);
    }

    public function findComment(int $id): ?Comment {
        $sql = "SELECT * FROM `comment` WHERE id=$id";

        $result = $this->runQuery($sql);

        $row = $result->fetch_assoc();

        //$topic = $forumRepository->findTopic($row['topic_id']);

        return Comment::create($row);
    }

    public function updateTopic(int $id, array $topic) {

        $name = $topic['name'];
        $description = $topic['description'];

        $sql = "UPDATE topic "
                . "SET name = '$name', description = '$description' "
                . "WHERE id=$id";

        $servername = "localhost";
        $dbname = "forum";
        $username = "root";
        $password = "password";

// Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $conn->query($sql);

        if ($conn->query($sql) === null) {
            return null;
        }
    }

}
