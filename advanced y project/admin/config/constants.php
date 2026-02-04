<?php
session_start();
define("ROOT_URL", "http://localhost/projecs/advanced y project/");
define('DB_HOST', 'localhost');
define('DB_USER', 'egator');
define('DB_PASS', 'admin123');
define('DB_NAME', 'yadvanced_blog');
if (!isset($_SESSION['user-id'])) {
    header("location: " . ROOT_URL . "logout.php");
    //destroy all sessions and redirect user to login page
    session_destroy();
    die();
    header("location: " . ROOT_URL . "signin.php");
}//http://localhost/projecs/advanced%20blog/PHP-MySQL-Blog-Website-with-Admin-Panel/blog.php