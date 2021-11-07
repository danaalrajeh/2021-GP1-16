<?php
    include 'connection.php';
    session_start();
    

        $id = $_POST['m_id'];
        $p_id = $_POST['p_id'];
        $m_name = trim($_POST['m_name']);
        $des = trim($_POST['des']);
        $dose = trim($_POST['dose']);
            $sql = "update medications SET m_name = ?,descrption = ?,dose = ? WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$m_name,$des,$dose,$id]);
            $msg = "edit medications";

      header("Location: medications.php?msg=".$msg."&id=".$p_id);

    ?>