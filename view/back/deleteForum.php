<?php
include_once "c:/wamp64/www/forum/forum/controller/forumC.php";
$forumC = new forumC();
$forumC->deleteForum($_GET["id_forum"]);
header('Location:listForum.php');
?>