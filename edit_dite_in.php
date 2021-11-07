<?php
    include 'connection.php';
    session_start();
    

        $id = $_POST['id'];
        $p_id = $_POST['p_id'];
    
        $des = trim($_POST['des']);

            $sql = "update dite SET dite_name = ? WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$des,$id]);
            $msg="dite edit";

      header("Location: manage_dite.php?id=".$p_id."&msg=".$msg);

    ?>