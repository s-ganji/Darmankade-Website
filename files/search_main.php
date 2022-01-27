<?php

$q = '';
$q = $_GET["q"];

session_start(); // DO CALL ON TOP OF BOTH PAGES
//$myJSON = json_encode($_SESSION['obj']);

$hey = [];
//$cc = [];
//$i = 0;
//while ($i!= count($_SESSION['obj'])){
//$cc[$i] = array();
//$cc[$i]["name"] = $_SESSION['obj'][$i]["name"];
//$cc[$i]["spec"] = $_SESSION['obj'][$i]["spec"];
//$cc[$i]["number"] = $_SESSION['obj'][$i]["number"];
//$cc[$i]["online_pay"] = $_SESSION['obj'][$i]["online_pay"];
//$cc[$i]["experience_years"] = $_SESSION['obj'][$i]["experience_years"];
//$cc[$i]["address"] = $_SESSION['obj'][$i]["address"];
//$cc[$i]["phone"] = $_SESSION['obj'][$i]["phone"];
//$cc[$i]["first_free_turn"] = $_SESSION['obj'][$i]["first_free_turn"];
//$cc[$i]["week_days"] = $_SESSION['obj'][$i]["week_days"];
//$hey[$i] = $cc[$i];
//$i = $i +1;
//}

$names = [];
$spec = [];
$number = [];
$online_pay = [];
$experience_years = [];
$address = [];
$phone = [];
$first_free_turn = [];
$week_days = [];

$i = 0;
while ($i != count($_SESSION['search_dinf'])) {
    $names[$i] = $_SESSION['search_dinf'][$i]["name"];
    $spec[$i] = $_SESSION['search_dinf'][$i]["spec"];
    $number[$i] = $_SESSION['search_dinf'][$i]["number"];
    $online_pay[$i] = $_SESSION['search_dinf'][$i]["online_pay"];
    $experience_years[$i] = $_SESSION['search_dinf'][$i]["experience_years"];
    $addres[$i] = $_SESSION['search_dinf'][$i]["address"];
    $phone[$i] = $_SESSION['search_dinf'][$i]["phone"];
    $first_free_turn[$i] = $_SESSION['search_dinf'][$i]["first_free_turn"];
    $week_days[$i] = $_SESSION['search_dinf'][$i]["week_days"];
    $i++;
}
$hey[0] = $names;
$hey[1] = $spec;
$hey[2] = $number;
$hey[3] = $online_pay;
$hey[4] = $experience_years;
$hey[5] = $addres;
$hey[6] = $phone;
$hey[7] = $first_free_turn;
$hey[8] = $week_days;


$h = json_encode($hey);
//echo $_SESSION['search_dinf'][0]["name"] ;
//echo $h;
//echo $hey[5][0];
//echo "<br>";
//echo $hey[5][1];
//echo "<br>";
//echo $hey[5][2];
//echo "<br>";
//
//echo "*******************************";
//echo $hey[0][0];
//echo $hey[0][1];
//echo $hey[0][2];
//echo $_SESSION['obj'][0]["address"];


if ($q == '') {
    if (count($names) == 1) {
//        echo "hello";
        header("Location:search_doctor_page.html");
    } else {
        header("Location:search_doctor_lists.html");
    }
}
//header("Location:test.html");

else {
//    echo $myJSON;
    echo $h;
//    echo $myJSON;
}


?>