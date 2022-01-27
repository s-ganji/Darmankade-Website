<?php
session_start(); // DO CALL ON TOP OF BOTH PAGES
$patient_id = $_SESSION['patient_id'];

$user_ac = 'patient'.$patient_id;
$con = mysqli_connect("localhost",$user_ac,$patient_id,"hospital");


if(isset($_GET['comment_submit'])){
//    echo $patient_id;
    $sql = "SELECT id FROM doctors WHERE name_d ='".$_GET['doctor_name']."'";
    $result=$con->query($sql);
    $doctor_id = 0;
    while($row = $result->fetch_assoc()){
        $doctor_id = $row['id'];
    }
    echo $doctor_id;
    if($_GET['username_comment'] != ""){
        $sql = "INSERT INTO comments(patient_id,doctor_id,comment) VALUE ('".$patient_id."','".$doctor_id."','".$_GET['username_comment']."')";
        if($con->query($sql)==TRUE){
         echo 'کامنت شما ثبت گردید';
         header("Location:doctor_page.html");

        }
    }

}
if(isset($_GET['score_submit'])){
    $sql = "SELECT id FROM doctors WHERE name_d ='".$_GET['doctor_name']."'";
    $result=$con->query($sql);
    $doctor_id = 0;
    while($row = $result->fetch_assoc()){
        $doctor_id = $row['id'];
    }
    if($_GET['username_score'] != ""){
        $sql = "INSERT INTO score(patient_id,doctor_id,score) VALUE ('".$patient_id."','".$doctor_id."','".$_GET['username_score']."')";
        if($con->query($sql)==TRUE){
            echo 'امتیاز شما ثبت گردید';
            header("Location:doctor_page.html");
        }
    }


}
?>

