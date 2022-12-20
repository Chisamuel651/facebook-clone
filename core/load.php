
<?php
    include 'database/connection.php';
    include 'classes/users.php';
    include 'classes/post.php';

    // load all elements necessary for the different activities to happen
    // global variables
    global $pdo;
    $loadFromUser = new User($pdo);
    $loadFromPost = new Post($pdo);

define("BASE_URL", "http://localhost/facebook");

?>