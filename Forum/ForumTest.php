<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/Question/Forum/utility/autoloader.php";
use Repositories\ForumRepository;
use Entities\Comment;
use Entities\Topic;

$forumRepository = new ForumRepository();

print_r($forumRepository->findComment(2));
exit;

var_dump($forumRepository->findCommentsByTopicId(1));
exit;

var_dump($forumRepository->findTopic(1));
exit;















