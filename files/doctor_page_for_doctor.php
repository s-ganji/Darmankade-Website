<?php
//$hey = array();
//$hey["name"]="nam";
$q = '';
$q=$_GET["q"];
session_start(); // DO CALL ON TOP OF BOTH PAGES
//echo $_SESSION['doctor']["name"];
//$mydoctor = json_encode($_SESSION['doctor']);

$usernames = $_SESSION['doctor']["username"];
$pass = $_SESSION['doctor']["pass"];
$names = $_SESSION['doctor']["name"];
$spec = $_SESSION['doctor']["spec"];
$number = $_SESSION['doctor']["number"];
$online_pay = $_SESSION['doctor']["online_pay"];
$experience_years = $_SESSION['doctor']["experience_years"];
$addres = $_SESSION['doctor']["address"];
$phone= $_SESSION['doctor']["phone"];
$first_free_turn = $_SESSION['doctor']["first_free_turn"];
$week_days = $_SESSION['doctor']["week_days"];
$scores = $_SESSION['doctor']["scores"];
$comments = $_SESSION['doctor']["comments"];

$hey = [];
$hey[0] = $usernames;
$hey[1] = $pass;
$hey[2] = $names;
$hey[3] = $spec;
$hey[4] = $number;
$hey[5] = $online_pay;
$hey[6] = $experience_years;
$hey[7] = $addres;
$hey[8] = $phone;
$hey[9] = $first_free_turn;
$hey[10] = $week_days;
$hey[11] = $scores;
$hey[12] = $comments;
//echo $_SESSION['doctor']["comments"];
$h = json_encode($hey);

//
if ($q == ''){
    header("Location:doctor_page_for_d.html");
//header("Location:test.html");
}
else {
    echo $h;
}

//echo "hello";
?>

