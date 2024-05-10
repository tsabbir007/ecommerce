<?php
include 'includes/config.php';

//do sign out action
if (isset($_GET['action']) && $_GET['action'] == 'sign-out') {
    unset($_SESSION['user']);
    header('Location: index.php');
}
?>