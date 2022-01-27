<?php
header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_GET["x"], false);

$con = mysqli_connect("localhost","root","","hospital");
//// Check connection
//if (mysqli_connect_errno()) {
//    echo "Failed to connect to MySQL: " . mysqli_connect_error();
//    exit();
//}
$sql = "INSERT INTO doctors (username, password,name_d,spec,number_d,online_pay,experience_years,address,phone,first_free_turn,week_days1,week_days2,week_days3,week_days4,week_days5,week_days6,week_days7)VALUES ('".$obj->username."','".$obj->password."','".$obj->name."','".$obj->spec."','".$obj->number."','".$obj->online_pay."','".$obj->experience_years."','".$obj->address."','".$obj->phone."','".$obj->first_free_turn."','".$obj->week_days[0]."','".$obj->week_days[1]."','".$obj->week_days[2]."','".$obj->week_days[3]."','".$obj->week_days[4]."','".$obj->week_days[5]."','".$obj->week_days[6]."')";
//$sql = "INSERT INTO doctors(username)VALUES('".$obj->username."')";
$con->query($sql);

$sql_id = "SELECT id FROM doctors WHERE username ='".$obj->username."'";
$result = $con->query($sql_id);
$id =0;
while($row = $result->fetch_assoc()) {
    $id = $row["id"];
}
//echo $id;
$user_ac = 'doctor'.$id;

$sql = "CREATE USER '".$user_ac."'@'localhost' IDENTIFIED BY '".$id."'";
$con->query($sql);

$sql ="GRANT CONNECT TO '".$user_ac."'@'localhost' IDENTIFIED BY '".$id."'";
$con->query($sql);

$sql = "GRANT SELECT,UPDATE ON doctors TO '".$user_ac."'@'localhost'" ;
$con->query($sql);

$sql = "GRANT SELECT ON comments TO '".$user_ac."'@'localhost'" ;
$con->query($sql);
$sql = "GRANT SELECT ON score TO '".$user_ac."'@'localhost'" ;
$con->query($sql);


?>