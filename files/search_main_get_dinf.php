<?php


//echo $_GET["search_main"];
$spec_list= ["گوارش و کبد","غدد و متابولیسم","گوش،حلق و بینی","مغز و اعصاب","خون و آنکلوژی","زنان و زایمان","پوست و مو","روماتولوژی","جراحی مغز و اعصاب"];
$con = mysqli_connect("localhost","root","","hospital");

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
        if (strpos($row['name_d'], $_GET["search_main"]) !== false) {
            $doctor1[$i]["name"] = $row['name_d'];
            $doctor1[$i]["spec"] = $spec_list[$row['spec']];
            $doctor1[$i]["number"] = $row['number_d'];
            $doctor1[$i]["online_pay"] = $row['online_pay'];
            $doctor1[$i]["experience_years"] = $row['experience_years'];
            $doctor1[$i]["address"] = $row['address'];
            $doctor1[$i]["phone"] = $row['phone'];
            $doctor1[$i]["first_free_turn"] = $row['first_free_turn'];
            $doctor1[$i]["week_days"] = [$row['week_days1'], $row['week_days2'], $row['week_days3'], $row['week_days4'], $row['week_days5'], $row['week_days6'], $row['week_days7']];
            $myObj[$i] = $doctor1[$i];
            $i++;
        }

    }}
//

//    $myJSON = json_encode($myObj);


session_start(); // DO CALL ON TOP OF BOTH PAGES
$_SESSION['search_dinf'] = $myObj;
//
header("Location: search_main.php");
?>