<html>
<body>

<?php
//$user = "";
echo '<link href="logsign_page_patients.css" type="text/css" rel="stylesheet"/>';

if(isset($_GET['login_p'])){
//    echo "hello ".$_GET["username"];
    $con = mysqli_connect("localhost","root","","hospital");
    $sql_2 = "SELECT id FROM patients WHERE username ='".$_GET['username']."'";
    $result_2 = $con->query($sql_2);
    $id = 0;
    while($row_2 = $result_2->fetch_assoc()) {
        $id = $row_2["id"];
    }
    $user_ac = 'patient'.$id;
    $con = mysqli_connect("localhost",$user_ac,$id,"hospital");
////    echo $_GET['username'];
    if ($con -> connect_errno) {
    echo "نام کاربری یا رمز عبور اشتباه است.";
    exit();
    }
    $sql = "SELECT password FROM patients WHERE id ='".$id."'";
    $sql_1 = "SELECT phone FROM patients WHERE id ='".$id."'";
    $sql_2 = "SELECT username FROM patients WHERE id='".$id."'";
    $result = $con->query($sql);
    $result_1 = $con->query($sql_1);
    $result_2 = $con->query($sql_2);
    $pass ="";
    while($row = $result->fetch_assoc()) {
         $pass = $row["password"];
    }
////    echo $pass;
    $phone = "";
    while($row_1 = $result_1->fetch_assoc()) {
        $phone = $row_1["phone"];
    }
//
    $user = "";
    while($row_2 = $result_2->fetch_assoc()) {
        $user = $row_2["username"];
    }

    if ($pass == $_GET['password'] and $user == $_GET['username']){

        echo
            "<form class='edit_patients_informations' action='edit_inf_patients.php' method='get'>
          <input id='username_patients_div' name='id_edit' value='".$id."' readonly>
          <input id='username_patients_div' name='username_edit' value='".$_GET['username']."' >
          <input id='username_patients_div' name='phone_edit' value='".$phone."' placeholder='شماره تلفن: ".$phone."'>
          <input id='username_patients_div' name='pass_edit' value='".$pass."' placeholder='رمزعبور: ".$pass."'>
          <button id='edit_patients_but' type='submit' name='edit_patients_inf' >ویرایش </button>
          <button id='edit_patients_but' type='submit' name='see_doctors_list' >لیست پزشکان </button>
        </form>";

    }
    else{
//        echo "hello ".$pass."  ks";
        echo "<div id='username_patients_div'>شما قبلا ثبت نام نکرده اید! </div>";
    }

//    echo "<script src='logsign_page_patients.js'></script>";
////

}

if(isset($_GET['signup_p'])){

    $con = mysqli_connect("localhost","root","","hospital");
    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }

//    $user = $_GET['username'];

//    echo "hello ".$_GET["phone"];
    $sql = "INSERT INTO patients (username, password, phone)VALUES ('".$_GET['username']."','".$_GET['password']."','".$_GET['phone']."')";
    if ($con->query($sql) === TRUE) {
        echo "ثبت نام با موفقیت انجام شد";
    } else {
        echo "نام کاربری تکراری است";
    }
//
    $sql_id = "SELECT id FROM patients WHERE username ='".$_GET['username']."'";
    $result = $con->query($sql_id);
    $id =0;
    while($row = $result->fetch_assoc()) {
        $id = $row["id"];
    }
    echo $id;
    $user_ac = 'patient'.$id;

    $sql = "CREATE USER '".$user_ac."'@'localhost' IDENTIFIED BY '".$id."'";
    $con->query($sql);

    $sql ="GRANT CONNECT TO '".$user_ac."'@'localhost' IDENTIFIED BY '".$id."'";
    $con->query($sql);


    $sql = "GRANT SELECT,UPDATE ON patients TO '".$user_ac."'@'localhost'" ;
    $con->query($sql);

    $sql = "GRANT SELECT ON doctors TO '".$user_ac."'@'localhost'" ;
    $con->query($sql);

    $sql = "GRANT SELECT,UPDATE,INSERT,DELETE ON comments TO '".$user_ac."'@'localhost'" ;
    $con->query($sql);
    $sql = "GRANT SELECT,UPDATE,INSERT,DELETE ON score TO '".$user_ac."'@'localhost'" ;
    $con->query($sql);

//    header("Location: login_page_patients.html");

}
?>
</body>
</html>
