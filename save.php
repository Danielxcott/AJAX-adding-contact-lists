<?php
require_once "base.php";


function runQuery($sql){
    $con = conSql();
if(mysqli_query($con,$sql)){
    return true;
}else{
    die("query fails".mysqli_error($con));
}
}

function textFilter($txt){
    $txt = trim($txt);
    $txt = htmlentities($txt,ENT_QUOTES);
    $txt = stripslashes($txt);
    return $txt;
}

$phone = textFilter($_POST['phone']);
$name = textFilter( $_POST['name']);
$sql = "INSERT INTO contacts (name,phone) VALUES ('$name','$phone') ";

if(runQuery($sql)){
    echo "success";
}else{
    echo "error";
}