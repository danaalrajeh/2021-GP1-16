<?php
session_start();
include ("connection.php");
if (isset($_SESSION['id']))
{ 
  $id = $_SESSION['id'];
  $ids = $_SESSION['id'];
  $sqls = "select * from users where id = ?";
  $stmts = $conn->prepare($sqls);
  $stmts->execute([$ids]);
  $users = $stmts->fetch();
  $p_id = $_GET['id'];
  $sql = "select * from physical_activity where p_id= ?";
  $stmt = $conn ->prepare($sql);
  $stmt->execute([$p_id]);
  $act = $stmt->fetch();
  $aid = 0;
  $aexp = "";
  if ($stmt->rowCount()) {
    $aid = $act['id'];
    $aexp= $act['activity'];
  }
  $sql1 = "select * from patients where id = ?";
  $stmt1 = $conn ->prepare($sql1);
  $stmt1->execute([$p_id]);
  $patient = $stmt1->fetch();
  ?>
  <!DOCTYPE html>
<html>
<head>
	<title>Physical activity</title>
  <link rel="stylesheet" href="btn.css">
<style >
.h_font:hover{
  font-size: 2.5;
}
#p_img{
  margin-left: 2%;
  display: inline-block;
  width: 12%;
  height: 17%;
  margin-top: 1px;
  border-radius: 20px;
}
#im_div{
  display: inline;
}
#doc_name{
  display: inline-block;
  font-size: 2vw;
  font-weight: bold; 
}
.logout_b{
    text-decoration: none;
    /*font-family: cursive;*/
  padding: 12px 50px;
  position: relative;
margin-left: 2%;
  margin-top: 2%;
  font-size: 2vw;
  background-color: #191970;
  border-radius: 10px;
  border-color: #ffffff;
  color: white;
}
.logout_b:hover{
    font-size: 2.5vw;
    color:  #ffffff;

}
.home_b{
  text-decoration: none;
  /*font-family: cursive;*/
  font-size: 2vw;
  margin-left: 42%;
  color: #778899;
}
.home_b:hover{
  font-size: 2.5vw;
  color: white;
  background-color: #778899;
   padding: 8px 40px;
   border-radius: 10px;
}

a{
	text-decoration: none;
}
.myBox {
border: none;
padding: 5px;
font: 24px/36px sans-serif;
width: 200px;
height: 200px;
border-radius: 20px;

}

::-webkit-scrollbar {
width: 12px;
height: 12px;

}

::-webkit-scrollbar-track {
border: 1px solid yellowgreen;
border-radius: 10px;
border :0;
}

::-webkit-scrollbar-thumb {
background: #cccccc;  
border-radius: 10px;
}

::-webkit-scrollbar-thumb:hover {
background: #cccccc;  
}

#p_span_info{
   display: inline-block;
   width: 30%;
   height: 100%;

}
#btn_p_info{
  margin-left: 30%;
  margin-top: 5%;
  font-size: 1.5vw;
  border-radius: 10px;
  background-color:  #e6e6ff;
  padding: 4%;
  border-color:#e6e6ff;
  width: 15.5vw;
}
#medic_span_info{
   display: inline-block;
   width: 9%;
   height: 100%;

}
#p_span_info1{
   display: inline-block;
   width: 40%;
   height: 100%;
   margin-bottom: 3%;

}
#m_5{
  margin-left: 5%;
}
.dite_manage{
   display: inline-block;
   width: 30%;
}
#med_textarea{
  resize: none;
  margin-left: 5%;
  margin-right: 5%;
  background-color:#ffffff;
  font-size: 1.3vw;
  padding: 2%;
  border-style: double;
  text-align: justify;
  border-radius: 20px;
}
</style>


</head>
<body style="background-color: #ffffff;margin-top: 0;margin-bottom: 0;">
<img id="p_img" src="img\logo_f.png"  ALIGN="center"> <p id="doc_name">&nbsp;&nbsp;Dr. <?php echo $users['fname'];  ?></p>
  <a class="home_b" href="physician_home.php">Home</a><a class="logout_b"  href="logout.php">Logout</a>
   <h3 style="margin-left: 15%;font-size: 1.5vw;"><?php echo $patient['fname']; ?></h3>  
   <div class="myBox" style="width: 70%; height: 65vh; margin-left: 15%;background-color:  #e6f2ff;font-size: 20px;">
    <div class="dite_manage"><p id="m_5"><strong>Physical activity</strong> </p></div>
    <?php
    echo ' <div class="dite_manage" align="right" style="margin-left: 30%;"><a href="edit_activity.php?p_id='.$p_id.'" style="border-color: #f2f2f2;background-color:  #e6f2ff;"><img    src="img\edit.png" width="30" height="20"></a>&#160;&#160;&#160;&#160;<a href="delete_activity.php?a_id='.$aid.'&p_id='.$id.'" style="border-color: #f2f2f2;background-color:  #e6f2ff;" class="confirmation"><img   src="img\delete.png" width="30" height="20"></a></div>';  
   

    ?>
    <?php
    echo '<textarea id="med_textarea" style="margin-left: 1.5%;" name="" rows="14" cols="80" placeholder="Add Description of physical activity . . ." readonly>'.$aexp.'</textarea>';  
    
    ?>
   </div>
      <div style="color:red">
            <?php
                if(isset($_GET['msg']) && !empty($_GET['msg'])){
                  if ($_GET['msg'] == 'edit activity') echo '<script>alert("Physical activity edit successfully")</script>';
                  elseif ($_GET['msg'] == 'delete activity') echo '<script>alert("Physical activity deleted successfully")</script>';
                  elseif ($_GET['msg'] == 'add activity') echo '<script>alert("Physical activity added successfully")</script>';
                  
                }
            ?>
        </div>
<script type="text/javascript">
    var elems = document.getElementsByClassName('confirmation');
    var confirmIt = function (e) {
        if (!confirm('Are you sure?')) e.preventDefault();
    };
    for (var i = 0, l = elems.length; i < l; i++) {
        elems[i].addEventListener('click', confirmIt, false);
    }
</script>  

</body>
</html>
<?php
}
else
{
    echo "error";
    header('Location:index.php');
}
?>