<?php

session_start();

$_SESSION = array();
//if (isset($_COOKIE[session_name()])) {
//    setcookie(session_name(), '', time() - 86400, '/');
//}
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

session_destroy();
header('Location:login.php');
?>