<?php
$doctor_name = '';
$doctor_name=$_GET["q"];
session_start();
$myJSON = json_encode($_SESSION['obj']);
$patient_id = $_SESSION['patient_id'];
$user_ac = 'patient'.$patient_id;
$con = mysqli_connect("localhost",$user_ac,$_GET['id_edit'],"hospital");
$sql = "SELECT id FROM doctors WHERE name_d='".$doctor_name."'";
$result=$con->query($sql);
$doctor_id = 0;
while($row = $result->fetch_assoc()){
    $doctor_id = $row['id'];
}
$_SESSION['doctor_id'] = $doctor_id;
header("doctor_page.html");
//echo $_SESSION['doctor_id'];
?>