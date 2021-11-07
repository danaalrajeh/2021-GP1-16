<?php
    include 'connection.php';
    session_start();
        $msg = "";
        $type = 1;
        
        $sym = trim($_POST['sym']);
        $p_id = trim($_POST['p_id']);
                $sql = "INSERT INTO symptoms(`p_id`,`symptom`) VALUES (?,?)";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$p_id,$sym]);
                $msg .="add";
     

    
        header("Location: alarming.php?id=".$p_id."&msg=".$msg);

    
    ?>