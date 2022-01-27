var response;
var name_d;
var phone_d;
var week_days_d;
var address_d;
// گرفتن اصلاعات پزشک مورد نظر با ستفاده از id
function get_details(){
    // var index = sessionStorage.getItem('key');
    // show_details(response)

    data = "hello";
    var xhr = new XMLHttpRequest();
    // data ="hel";
    xhr.open("GET", "doctor_page_for_doctor.php?q="+data , true);
    xhr.onload = function () {
        var resp = JSON.parse(this.response);
        // document.getElementById("doctor_name").innerText = resp[11];
        show_details(resp[0],resp[1],resp[2],resp[3],resp[4],resp[5],resp[6],resp[7],resp[8],resp[9],resp[10],resp[11],resp[12]);

    };
    xhr.onerror = function () {
        console.error("Error", xhr.statusText);
    };
    xhr.send();

    // let url = "https://intense-ravine-40625.herokuapp.com/doctors/" + doctor_id;
    // fetch(url)
    //     .then((resp) => resp.json())
    //     // .then((resp) => changePage_doctorpage())
    //     .then((resp) => show_details(resp))
    // ;
}
// نشان دادن اطلاعات پزشک انتخاب شده از صفحه ی لیست پزشکان در صفحه ی پزشک
function show_details(username,pass,name,spec,number,online_pay,exp_y,address,phone,first_turn,week_days,scores,comments) {

    phone_d = phone;
    week_days_d = week_days;
    address_d = address;

    // اسم
    document.getElementById("doctor_name").innerText =name;
    document.getElementById("doctor_username").innerText =username;
    document.getElementById("doctor_pass").innerText =pass;
    // document.getElementById('name_doctor_nav_list').innerText = name;
    document.getElementById("doctor_spec_nav_list").innerText =spec;

    name_d = name;
    // document.getElementById('doctor_name_for_comments_scores').value = resp.name;
    // تخصص
    document.getElementById("doctor_spec").innerText =spec;
    // تصویر
    // document.getElementById("doctor_img_dp").src =JSON.stringify(resp.avatar).substring(1,JSON.stringify(resp.avatar).length-1);
    // شماره نظام پزشکی
    let str ="شماره نظام پزشکی: " + number;
    document.getElementById("doctor_number").innerText = str;

    // پرداخت آنلاین
    if (online_pay){
        document.getElementById("online_pay_d").innerText = "دارد";
    }
    else {
        document.getElementById("online_pay_d").innerText = "ندارد";
    }

    // اولین نوبت آزاد
    document.getElementById("first_empty_date").innerText =first_turn;
    // document.getElementById("first_empty_date").innerText =;

    // سال های تجربه
    str = exp_y+" سال";
    document.getElementById("experience_years").innerText =str;

    // برد کرام
    // تخصص
    document.getElementById("doctor_spec_nav_list").innerText =spec;
    // اسم
    str = "آقای دکتر " + name;
    document.getElementById("name_doctor_nav_list").innerText = str;

    // باکس کامنت
    // نظردهنده
    // str = "نظر " + JSON.stringify(resp.commenter).substring(1,JSON.stringify(resp.commenter).length-1) + ": ";
    // document.getElementById("commenter_name").innerText = str;
    //
    // // نظر
    // document.getElementById("comment_doctor_page").innerText =JSON.stringify(resp.comment_text).substring(1,JSON.stringify(resp.comment_text).length-1);
    //
    // // rate
    // document.getElementById("doctor_rate").innerText =JSON.stringify(resp.rate);
    //
    // // تعداد نظرات
    // document.getElementById("number_of_comments").innerText =JSON.stringify(resp.comments);

    // اطلاعات مطب
    document.getElementById("office_address").innerText =address;
    document.getElementById("doctor_number_office_information").innerText = phone;

    var h = 0;
    str = '';
    while (h < comments.length) {
        str = str + "نظر کاربر " + (h+1) +": ";
        str = str +comments[h];
        // str =str + "<br>";
        h = h+1;
    }

    document.getElementById("comments_from_users").value = str;
    var k = 0;
    str = '';
    while (k !==scores.length) {
        str = str + "امتیاز کاربر " + (k+1) +": ";
        str = str +scores[k];
    }
    document.getElementById("scors_from_users").value = str;
    // document.getElementById("comments_number").innerText = comments_number;
    // document.getElementById("scores_number").innerText = scores_number;

}
// در صورت کلیک بر روی کزینه ی اطلاعات مطب این تابع فراخوانی می شود.
function show_office_informations(){
    // let resp = response;
    // زمانی که گزینه ی اطلاعات مطب کلیک می شود، پس زمینه ی آن سفید می شود.
    // و پس زمینه ی روز های حضور خاکستری
    document.getElementById("office_informations_button").style.backgroundColor = "white";
    document.getElementById("presents_days_button").style.backgroundColor = "#ededed";

    // وقتی این گزینه کلیک شود، باید divمربوط به روزهای حضور نمایش داده نشود.
    document.getElementById("days_of_presence_dp").style.display = 'none';
    document.getElementById("office_informations_bottom").style.display = 'flex';

    // اطلاعات مطب، بدست آمده از API
    document.getElementById("office_address").innerText = address_d;
    document.getElementById("doctor_number_office_information").innerText = phone_d;



}

// در صورت کلیک بر روی کزینه ی روزهای حضور این تابع فراخوانی می شود.
function show_presents_days() {
    // let resp = response;
    // زمانی که گزینه یروز های حضور کلیک می شود، پس زمینه ی آن سفید می شود.
    // و پس زمینه ی اطلاات مطب خاکستری
    document.getElementById("presents_days_button").style.backgroundColor = "white";
    document.getElementById("office_informations_button").style.backgroundColor = "#ededed";

    // وقتی این گزینه کلیک شود، باید divمربوط به اطلاعات مطب نمایش داده نشود.
    document.getElementById("office_informations_bottom").style.display = 'none';
    document.getElementById("days_of_presence_dp").style.display = 'flex';

// براساس روزهای حضور که از API بدست می آید، با توجه به اینکه trueیا falseباشن علامت تیک یا ضربدر رسم می شود
    let week_days = week_days_d;
    week_days.reverse();

    let j = 0;
    while (j < week_days.length) {
        if (week_days[j]==1) {
            var points = document.getElementsByClassName("polyline_presence")[j].getAttribute("points");
            points = "20 6 9 17 4 12";
            document.getElementsByClassName("polyline_presence")[j].setAttribute("points", points);
        }
        if (week_days[j]==0) {
            let newLine = document.createElementNS('http://www.w3.org/2000/svg', 'line');
            newLine.setAttribute('x1', '18');
            newLine.setAttribute('y1', '6');
            newLine.setAttribute('x2', '6');
            newLine.setAttribute('y2', '18');
            newLine.setAttribute("stroke", "#fb815e");
            document.getElementsByClassName("svg_dp")[j].appendChild(newLine);

            newLine = document.createElementNS('http://www.w3.org/2000/svg', 'line');
            newLine.setAttribute('x1', '6');
            newLine.setAttribute('y1', '6');
            newLine.setAttribute('x2', '18');
            newLine.setAttribute('y2', '18');
            newLine.setAttribute("stroke", "#fb815e");
            document.getElementsByClassName("svg_dp")[j].appendChild(newLine);
        }
        j = j + 1;
    }


    week_days = week_days_d;
    week_days.reverse();
}



get_details();
