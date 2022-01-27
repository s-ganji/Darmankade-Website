<?php
$q = '';
$q=$_GET["q"];

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
$spec=[];
$number = [];
$online_pay = [];
$experience_years = [];
$address = [];
$phone = [];
$first_free_turn = [];
$week_days = [];

$i = 0;
while ($i!= count($_SESSION['obj'])){
    $names[$i] = $_SESSION['obj'][$i]["name"];
    $spec[$i] = $_SESSION['obj'][$i]["spec"];
    $number[$i] = $_SESSION['obj'][$i]["number"];
    $online_pay[$i] = $_SESSION['obj'][$i]["online_pay"];
    $experience_years[$i] = $_SESSION['obj'][$i]["experience_years"];
    $addres[$i] = $_SESSION['obj'][$i]["address"];
    $phone[$i] = $_SESSION['obj'][$i]["phone"];
    $first_free_turn[$i] = $_SESSION['obj'][$i]["first_free_turn"];
    $week_days[$i] = $_SESSION['obj'][$i]["week_days"];
    $i++;
}
$hey[0] = $names;
$hey[1] = $spec;
$hey[2] = $number;
$hey[3] = $online_pay;
$hey[4] = $experience_years;
//$hey[5] = $addres;
$hey[5] = $phone;
$hey[6] = $first_free_turn;
$hey[7] = $week_days;

$h = json_encode($hey);
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


if ($q == ''){
header("Location:doctors_list_page.html");
//header("Location:test.html");
}
else {
//    echo $myJSON;
    echo $h;
//    echo $myJSON;
}

?>

