<?php require_once "base.php";

$name = $_POST['name'];
$phone = $_POST['phone'];
$id = $_POST['id'];

function runQuery($sql){
    $con = conSql();
if(mysqli_query($con,$sql)){
    return true;
}else{
    die("query fails".mysqli_error($con));
}
}

$sql = "UPDATE contacts SET name = '$name', phone = '$phone' WHERE id = '$id'";

if(runQuery($sql)){
    echo "update success";
}else{
    echo "error";
}