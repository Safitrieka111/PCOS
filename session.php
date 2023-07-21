<?php
session_start();
if(!isset($_SESSION['agent_forum_user']) || ($_SESSION['agent_forum_user']!=md5($_SERVER['HTTP_USER_AGENT'])) ){
header("location: sign-in.php");
exit();
}
?>