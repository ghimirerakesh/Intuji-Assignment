<?php
    include 'functions/init.php';
    $client->revokeToken();
    session_destroy();
    header('Location: index.php'); 
?>