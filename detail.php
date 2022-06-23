<?php 
            require_once "base.php";

            $id = $_GET['id'];
            $sql = "SELECT * FROM contacts WHERE id = $id";
            $query = mysqli_query(conSql(),$sql);
            $row = mysqli_fetch_assoc($query);
echo json_encode($row);