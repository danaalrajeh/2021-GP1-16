<?php
    include 'connection.php';
    session_start();
    

        $id = $_POST['id'];
        $fname = trim($_POST['fname']);
        $birth = trim($_POST['birth']);
        $r_num = trim($_POST['r_num']);
        $con = trim($_POST['con']);
            $sql = "update patients SET fname = ?,birthday = ?,r_num = ?,cond = ? WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$fname,$birth,$r_num,$con,$id]);
            $msg = "edit";

        header("Location: patient_info.php?id=".$id."&msg=".$msg);

    ?>