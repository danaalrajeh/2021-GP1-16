<?php
    include 'connection.php';
    session_start();
        $msg = "";
        $type = 1;
        
        $m_name = trim($_POST['m_name']);
        $des = trim($_POST['des']);
        $dose = trim($_POST['dose']);
        $id = trim($_POST['id']);
                $sql = "INSERT INTO medications (`p_id`,`m_name`,`descrption`,`dose`) VALUES (?,?,?,?)";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$id,$m_name,$des,$dose]);
                $msg .="successful";
     

    
        header("Location:medications.php?id=".$id."&msg=".$msg);

    
    ?>