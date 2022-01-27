<?php
echo '<link href="logsign_page_patients.css" type="text/css" rel="stylesheet"/>';
if(isset($_GET['login_d'])) {
//    echo "hello ".$_GET["username"];
    $con = mysqli_connect("localhost", "root", "", "hospital");
    $sql_2 = "SELECT id FROM doctors WHERE username ='" . $_GET['username'] . "'";
    $result_2 = $con->query($sql_2);
    $id = 0;
    while ($row_2 = $result_2->fetch_assoc()) {
        $id = $row_2["id"];
    }
    $user_ac = 'doctor' . $id;
//    echo $user_ac;
    $con = mysqli_connect("localhost", $user_ac, $id, "hospital");
//////    echo $_GET['username'];
    if ($con->connect_errno) {
        echo "نام کاربری یا رمز عبور اشتباه است.";
        exit();
    }
    $sql = "SELECT username, password,name_d,spec,number_d,online_pay,experience_years,address,phone,first_free_turn,week_days1,week_days2,week_days3,week_days4,week_days5,week_days6,week_days7 FROM doctors WHERE id ='" . $id . "'";

    $result = $con->query($sql);

    $pass = "";
    $user = "";
    $name = "";
    $spec = 0;
    $number = "";
    $online_pay = 0;
    $exp_y = 0;
    $address = "";
    $phone = "";
    $first_free_turn = "";
    $week_day1 = 0;
    $week_day2 = 0;
    $week_day3 = 0;
    $week_day4 = 0;
    $week_day5 = 0;
    $week_day6 = 0;
    $week_day7 = 0;

    $doctor1 = array();
    while ($row = $result->fetch_assoc()) {
        $pass = $row["password"];
        $user = $row["username"];
        $name = $row["name_d"];
        $spec = $row["spec"];
        $number = $row["number_d"];
        $online_pay = $row["online_pay"];
        $exp_y = $row["experience_years"];
        $address = $row["address"];
        $phone = $row["phone"];
        $first_free_turn = $row["first_free_turn"];
        $week_day1 = $row["week_days1"];
        $week_day2 = $row["week_days2"];
        $week_day3 = $row["week_days3"];
        $week_day4 = $row["week_days4"];
        $week_day5 = $row["week_days5"];
        $week_day6 = $row["week_days6"];
        $week_day7 = $row["week_days7"];
    }

    $comments = [];

    $sql = "SELECT comment FROM comments WHERE doctor_id ='" . $id . "'";
    $result = $con->query($sql);
    $j = 0;
//    echo $result;
    if ($result == null) {
        $comments[0] = "هیچ نظری وجود ندارد";
    }

    else {
        while ($row = $result->fetch_assoc()) {
//            echo $row["comment"];
            $comments[$j] = $row["comment"];
            $j = $j + 1;
        }
    }
//    $comments_numbers = count($comments);

    $scores = [];
//    echo $id;
    $sql = "SELECT score FROM score WHERE doctor_id ='" . $id . "'";
    $result = $con->query($sql);
    $j = 0;
    if ($result == null) {
        $scores[0] = "هیچ نظری وجود ندارد";
    }
else{
    while($row = $result->fetch_assoc()){
        $scores[$j] = $row["score"];
        $j = $j+1;
    }
//    echo $scores;
}


    $spec_list = ["گوارش و کبد", "غدد و متابولیسم", "گوش،حلق و بینی", "مغز و اعصاب", "خون و آنکلوژی", "زنان و زایمان", "پوست و مو", "روماتولوژی", "جراحی مغز و اعصاب"];

    if ($pass == $_GET['password'] and $user == $_GET['username']) {
        $doctor1["username"] = $user;
        $doctor1["pass"] = $pass;
        $doctor1["name"] = $name;
        $doctor1["spec"] = $spec_list[$spec];
        $doctor1["number"] = $number;
        $doctor1["online_pay"] = $online_pay;
        $doctor1["experience_years"] = $exp_y;
        $doctor1["address"] = $address;
        $doctor1["phone"] = $phone;
        $doctor1["first_free_turn"] = $first_free_turn;
        $doctor1["week_days"] = [$week_day1, $week_day2, $week_day3, $week_day4, $week_day5, $week_day6, $week_day7];
        $doctor1["scores"] = $scores;
        $doctor1["comments"] = $comments;
//        $doctor1["comments_number"] = $comments_numbers;
//        $doctor1["scores_number"] = $scores;
    }
    session_start();
    $_SESSION['doctor'] = $doctor1;
//    echo $doctor1["comments"];
    header("Location: doctor_page_for_doctor.php");
}
?>