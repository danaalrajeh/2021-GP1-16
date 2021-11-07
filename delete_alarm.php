<?php
    include 'connection.php';
    session_start();
    $a_id = $_GET['a'];
    $p_id = $_GET['p_id'];
    $sql = "delete from symptoms where id = ?";
    $stmt = $conn ->prepare($sql);
    $stmt->execute([$a_id]);
    $msg = "delete";
    header("Location: alarming.php?id=".$p_id."&msg=".$msg);
    ?>