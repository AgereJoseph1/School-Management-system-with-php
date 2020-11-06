<?php
require_once('classes/connect.php');
$table = $_GET['table'];
$id = $_GET['id'];
$page = $_GET['page'];

$query = "DELETE FROM $table where id ='$id'";
$result=$sonawap->query($query) or die($sonawap->error.__LINE__);

if ($result) {
    header("Location: ".$page.".php?success=Record Deleted Succesfully");
}else{
    header("Location: ".$page.".php?error=Sorry an error occured");
}