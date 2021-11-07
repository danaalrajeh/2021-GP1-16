<?php
session_start();
include ("connection.php");
if (isset($_SESSION['id']))
{ 
  $id = $_SESSION['id'];
  $p_id = $_GET['id'];
  $sql = "select * from symptoms where p_id = ?";
  $stmt = $conn ->prepare($sql);
  $stmt->execute([$p_id]);
  $sym = $stmt->fetchAll();
      $ids = $_SESSION['id'];
  $sqls = "select * from users where id = ?";
  $stmts = $conn->prepare($sqls);
  $stmts->execute([$ids]);
  $users = $stmts->fetch();

  $sql1 = "select * from patients where id = ?";
  $stmt1 = $conn ->prepare($sql1);
  $stmt1->execute([$p_id]);
  $patient = $stmt1->fetch();

  ?>
<!DOCTYPE html>
<html>
<head>
	<title>Alarming Symptoms</title>
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
overflow-y: scroll;
border-radius: 20px;
}
.myBox_medic {
border: none;
padding: 5px;
font: 24px/36px sans-serif;
width: 90%;
height: 100vh ;
overflow-y: scroll;
}
/* Scrollbar styles */
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

#p_span{
   display: inline-block;
   width: 49%;
   height: 10%;
   font-size: 1.2vw;

}
.alarm_btn{
margin-left: 43%;
margin-bottom: 5%;
margin-top: 10%;
padding: 1% 3%;
border-radius: 10px;
background-color: #e6e6ff;
font-size: 1vw;
border-color:  #e6e6ff;
color: black;
}
.alarm_btn:hover{
  background-color: white;
}


p{
  font-size: 1vw;
}
#d_p{
  margin-left: 60%;
  background-color: Transparent;
   outline: none;
     color: red;
     font-size: 1.5vw;
     border-color:#f2f2f2 ;
}
#d_p:hover{
  font-size: 2vw;
}
</style>


</head>
<body style="background-color: #ffffff;margin-top: 0;margin-bottom: 0;">
<img id="p_img" src="img\logo_f.png"  ALIGN="center"> <p id="doc_name">&nbsp;&nbsp;Dr. <?php echo $users['fname'];  ?></p>
  <a class="home_b" href="physician_home.php">Home</a><a class="logout_b"  href="logout.php">Logout</a>
   <h3 style="margin-left: 15%;font-size: 1.5vw;"><?php echo $patient['fname']; ?></h3>   
   <div class="myBox" style="width: 70%; height: 65vh; margin-left: 15%;background-color:  #e6f2ff;font-size: 20px;">
   <div class="myBox_medic" style="background-color: #ffffff;margin: 3% 4%;height: 43vh;border-radius: 10px;">
   <?php  
   foreach ($sym as $s) {
     echo '      <div style="height: 10%;">
        <span id="p_span">
          <p style="margin-left: 15%;color: #0044cc;"><strong>'.$s['symptom'].'</strong></p>
        </span>
        <span id="p_span">
      
          <a id="d_p" href="delete_alarm.php?p_id='.$p_id.'&a='.$s['id'].'"  class="confirmation">Remove</a>
        </span>
      </div>
      <hr width="100%"><br>';
   }?>
   

   


      <div style="height: 10%;">
    
      </div>
   </div>
  <?php echo '<a class="alarm_btn" href="add_alarm.php?id='.$p_id.'">Add Symptom</a>';  ?> 
</div>
        <div style="color:red">
            <?php
                if(isset($_GET['msg']) && !empty($_GET['msg'])){
                  if ($_GET['msg'] == 'delete') echo '<script>alert("symptom deleted successfully")</script>';
                  elseif ($_GET['msg'] == 'add') echo '<script>alert("symptom added successfully")</script>';
                  
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