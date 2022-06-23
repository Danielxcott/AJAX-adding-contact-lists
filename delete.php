<?php 
require_once "base.php";

$id = $_GET['id'];
$sql = "DELETE FROM contacts WHERE id = $id";

$query = mysqli_query(conSql(),$sql);

if($query){
    echo "success";
}else{
    die("query fails".mysqli_error(conSql()));
}