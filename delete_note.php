<?php
session_start();
require 'pdo.php';


$currentUserId = $_SESSION['user']['id'];
$db = new Database();
$noteuserId= $_POST['user_id'];
$noteId = $_POST['note_id'];

if ($currentUserId == $noteuserId){
    $deleteQuery = "DELETE FROM notes WHERE id = :noteId";
    $deleteStmt = $db->executeQuery($deleteQuery, [':noteId' => $noteId]);
    header('Location: blogs.php');
    exit();
    }
    else {
        echo 'Ne si ti brat';
    }
    


?>
