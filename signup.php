<?php
    include 'connection.php';
    
        $msg = "";
        $type = 1;
        
        $fname = trim($_POST['fname']);
        $lname = trim($_POST['lname']);
        $mail = trim($_POST['email']);
        $pwd1 = trim($_POST['pwd']);
        $pwd = md5($pwd1);
            $sql = "SELECT * from users where email LIKE ?";
            $stmt = $conn ->prepare($sql);
            $stmt->execute([$mail]);
            if($stmt->rowCount()>0){
                $msg .= "sorry";
            }else{
                $sql = "INSERT INTO users (`fname`,`lname`,`email`,`password`) VALUES (?,?,?,?)";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$fname,$lname,$mail,$pwd]);
                $msg .="successful";
            }
        
    header("Location: create_accuont.php?msg=".$msg);
    ?>