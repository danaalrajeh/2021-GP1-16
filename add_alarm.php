<?php
session_start();
include ("connection.php");
if (isset($_SESSION['id']))
{ 
  $id = $_SESSION['id'];
  $p_id = $_GET['id'];
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
  <title>Add Alarm</title>
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
.myBox_medic {
border: none;
padding: 5px;
font: 24px/36px sans-serif;
width: 90%;
height: 100vh ;

}
.alram {
border: none;
padding: 5px;
font: 24px/36px sans-serif;
width: 100%;
height: 200px;
border-radius: 10px;
}
#add_alarm{
  width: 100%;
  height: 10%;
  padding: 12px 0px;
  font-size: 1vw;
  border-bottom-style: solid;
  border-bottom-color:  #cccccc;
  border-top-style: hidden;
   border-right-style: hidden;
  border-left-style: hidden;
  background-color: #ffffff;
}
#btn_add_alarm{
  margin-left: 35%;
  margin-top: 7%;
  font-size: 1.5vw;
  border-radius: 10px;
  background-color:  #e6e6ff;
  padding: 2%;
  border-color:#e6e6ff;
  width: 15.5vw;
}
#btn_add_alarm:hover{
 font-size: 2vw;
}
</style>


</head>
<body style="background-color: #ffffff;margin-top: 0;margin-bottom: 0;">
<img id="p_img" src="img\logo_f.png"  ALIGN="center"> <p id="doc_name">&nbsp;&nbsp;Dr. <?php echo $users['fname'];  ?></p>
  <a class="home_b" href="physician_home.php">Home</a><a class="logout_b"  href="logout.php">Logout</a>
   <h3 style="margin-left: 15%;font-size: 1.5vw;"><?php echo $patient['fname']; ?></h3>   
   <div class="myBox" style="width: 70%; height: 65vh; margin-left: 15%;background-color:  #e6f2ff;font-size: 20px;">
     <div class="myBox_medic" style="background-color: #ffffff;margin: 3% 4%;height: 55vh;border-radius: 10px;">
      <form action="add_alarm_in.php" method="post">
      <input type="hidden" name="p_id" value="<?= !empty($p_id) ? $p_id : '' ?>">
      <input id="add_alarm"  type="text" name="sym" placeholder="Symptom . . . . .">
      <button type="submit" id="btn_add_alarm">ADD</button>
      </form>
   </div>
</div>


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