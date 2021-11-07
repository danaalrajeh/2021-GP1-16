<?php
    include 'connection.php';
    session_start();
        $des = trim($_POST['des']);
        $id = trim($_POST['p_id']);
                $sql = "INSERT INTO dite (`p_id`,`dite_name`) VALUES (?,?)";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$id,$des]);
                $msg = "dite added";
    
        header("Location: manage_dite.php?id=".$id."&msg=".$msg);

    
    ?>