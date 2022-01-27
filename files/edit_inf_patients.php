<?php
echo '<link href="logsign_page_patients.css" type="text/css" rel="stylesheet"/>';
if(isset($_GET['edit_patients_inf'])){
    $user_ac = 'patient'.$_GET['id_edit'];
    $con = mysqli_connect("localhost",$user_ac,$_GET['id_edit'],"hospital");
//    $sql = "SELECT password FROM patients WHERE username ='".$_GET['username_edit']."'";
    $sql = "UPDATE patients SET phone='".$_GET['phone_edit']."',password='".$_GET['pass_edit']."',username='".$_GET['username_edit']."' WHERE id='".$_GET['id_edit']."'";
    $con->query($sql);
//    $pass = "";
//    while($row = $result->fetch_assoc()) {
//        $pass = $row["password"];
//    }
//    echo $pass;
    if ($con->query($sql) === TRUE) {
        echo "yeyyy";
    }

}

if(isset($_GET['see_doctors_list'])){
    $spec_list= ["گوارش و کبد","غدد و متابولیسم","گوش،حلق و بینی","مغز و اعصاب","خون و آنکلوژی","زنان و زایمان","پوست و مو","روماتولوژی","جراحی مغز و اعصاب"];
    $user_ac = 'patient'.$_GET['id_edit'];
    $con = mysqli_connect("localhost",$user_ac,$_GET['id_edit'],"hospital");
    $sql = "SELECT name_d,spec,number_d,online_pay,experience_years,address,phone,first_free_turn,week_days1,week_days2,week_days3,week_days4,week_days5,week_days6,week_days7 FROM doctors";
    $result=$con->query($sql);

//    $myObj = null;
    $myObj = array();
    $doctor1 = [];
    $i = 0;
    if ($result == null){
        echo "اطلاعات هیچ پزشکی موجود نمی باشد!";
    }

    else{
        while($row = $result->fetch_assoc()) {
        $doctor1[$i] = array();
//        $myObj->name = $row['name_d'];
        $doctor1[$i]["name"] = $row['name_d'];
        $doctor1[$i]["spec"] = $spec_list[$row['spec']];
        $doctor1[$i]["number"] = $row['number_d'];
        $doctor1[$i]["online_pay"] = $row['online_pay'];
        $doctor1[$i]["experience_years"] = $row['experience_years'];
        $doctor1[$i]["address"] = $row['address'];
        $doctor1[$i]["phone"] = $row['phone'];
        $doctor1[$i]["first_free_turn"] = $row['first_free_turn'];
        $doctor1[$i]["week_days"] = [$row['week_days1'],$row['week_days2'],$row['week_days3'],$row['week_days4'],$row['week_days5'],$row['week_days6'],$row['week_days7']];
        $myObj[$i] = $doctor1[$i];
        $i++;

//        $myObj->spec = $row['spec'];
//        $myObj->number = $row['number_d'];
//        $myObj->online_pay = $row['online_pay'];
//        $myObj->experience_years = $row['experience_years'];
//        $myObj->address = $row['address'];
//        $myObj->phone = $row['phone'];
//        $myObj->week_days= [$row['week_days1'],$row['week_days2'],$row['week_days3'],$row['week_days4'],$row['week_days5'],$row['week_days6'],$row['week_days7']];
//
//        echo $row['name_d'];
//        echo $row['spec'];
//        echo $row['number_d'];
//        echo $row['online_pay'];
//        echo $row['experience_years'];
//        echo $row['address'];
//        echo $row['phone'];
//        echo $row['first_free_turn'];
//        echo $row['week_days1'];
//        echo $row['week_days2'];
//        echo $row['week_days3'];
//        echo $row['week_days4'];
//        echo $row['week_days5'];
//        echo $row['week_days6'];
//        echo $row['week_days7'];
//        echo "<br>";
    }}
//


//    $myJSON = json_encode($myObj);


    session_start(); // DO CALL ON TOP OF BOTH PAGES
    $_SESSION['obj'] = $myObj;
    $_SESSION['patient_id'] = $_GET['id_edit'];
//
////    $_SESSION['spec_list'] = $spec_list;
//
//    echo $myObj[0];
//    echo "************************************";
//    echo json_encode($myObj)[0];
    header("Location: get_d_list.php");
}
?>