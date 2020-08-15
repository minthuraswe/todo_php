<?php

    require 'config.php';

    $sql = "DELETE FROM todo WHERE id=" .$_GET['id'];
    $pdostatement = $pdo->prepare($sql);
    $result = $pdostatement->execute();

    if($result){

        echo "<script>alert('To Do is Deleted');window.location.href='index.php';</script>";

    }

?>