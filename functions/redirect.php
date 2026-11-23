<?php 
include "./../config/dbcon.php";


function getAll($table){
    global $conn;
    $query = "SELECT * FROM $table";
    return mysqli_query($conn, $query);
}

function redirect($url, $message){
    $_SESSION['message'] = $message;
    header("Location: $url");
    exit();
}



?>