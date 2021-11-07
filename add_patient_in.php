<?php
    include 'connection.php';
    session_start();
    $id = $_SESSION['id'];
        $msg = "";
        $type = 1;
        
        $fname = trim($_POST['fname']);
        $birth = trim($_POST['birth']);
        $r_num = trim($_POST['r_num']);
        $con = trim($_POST['con']);
            $sql = "SELECT * from patients where fname LIKE ?";
            $stmt = $conn ->prepare($sql);
            $stmt->execute([$fname]);
            if($stmt->rowCount()>0){
                $msg .= "error";
            }else{
                $sql = "INSERT INTO patients (`fname`,`birthday`,`r_num`,`cond`,`physician_id`) VALUES (?,?,?,?,?)";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$fname,$birth,$r_num,$con,$id]);
                $msg .="successful";
            }

     if ($msg == "error") {
        header("Location: add_patient.php?msg=".$msg);
        }
        elseif ($msg == "successful") {
              header("Location: patients_list.php?msg=".$msg);
           }   
    
    ?>