


function inf_docs_to_json(){

    // document.getElementById("pass_d").innerHTML= "kd";
    // document.getElementById("username_d").value = document.getElementById("pass_d").value;
    var doc_inf={
        "username": document.getElementById('username_d').value,
        "password": document.getElementById('pass_d').value,
        "name": document.getElementById('name_d').value,
        // "spec": spec_id,
        "spec": document.getElementById('spec_d').value,
        "number": document.getElementById('number_d').value,
        "online_pay": document.getElementById('online_pay_d').value,
        "experience_years": document.getElementById('exp_y_d').value,
        "address": document.getElementById('address_d').value,
        "phone": document.getElementById('phone_d').value,
        "first_free_turn": document.getElementById('first_free_turn').value,
        "week_days": [document.getElementById('sat_w').value,
            document.getElementById('sun_w').value,
            document.getElementById('mon_w').value,
            document.getElementById('tue_w').value,
            document.getElementById('wed_w').value,
            document.getElementById('thu_w').value,
            document.getElementById('fri_w').value
        ],
        "spec_list": ["گوارش و کبد","غدد و متابولیسم","گوش،حلق و بینی","مغز و اعصاب","خون و آنکلوژی","زنان و زایمان","پوست و مو","روماتولوژی","جراحی مغز و اعصاب"]
    };
    dbParam = JSON.stringify(doc_inf);
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("demo").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "logsign_page_doctors.php?x=" + dbParam, true);
    xmlhttp.send();

    // window.location.replace("http://www.w3schools.com");



    // header("Location: login_page_doctors.html");

}
