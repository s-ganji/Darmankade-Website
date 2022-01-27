var name_f;
var spec_f;
var number_f;
var online_pay_f;
var exp_y_f;
var phone_f;
var first_turn_f;
var week_days_f;

// در این تابع با استفاده از api استفاده شده آرایه ی پزشکان از سرور گرفته می شود
function getlist() {
    // data = "";
    // document.getElementById("dd").innerText ="hello";
    var xhr = new XMLHttpRequest();
    data ="hel";
    xhr.open("GET", "search_main.php?q=" + data, true);
    xhr.onload = function () {
        var resp = JSON.parse(this.response);
        // document.getElementsByClassName("doctors_list_right_h5")[0].innerText = resp[0];

        // document.getElementById("dd").innerText = resp[0];

        show_doctors_list(resp[0],resp[1],resp[2],resp[3],resp[4],resp[5],resp[6],resp[7]);
    };
    xhr.onerror = function () {
        console.error("Error", xhr.statusText);
    };
    xhr.send();


}
// در تابع زیر با استفاده از آرایه ی لیست پزشکان و اطلاعات مربوط به هر پزشک لیست صفحه پزشکان پر میشود.
function show_doctors_list(name,spec,number,online_pay,exp_y,phone,first_turn,week_days) {
    name_f =  name;
    spec_f = spec;
    number_f = number;
    online_pay_f = online_pay;
    exp_y_f = exp_y;
    phone_f = phone;
    first_turn_f = first_turn;
    week_days_f = week_days;
    // sessionStorage.setItem('resp', resp);
    for (let i=0;i<name.length;i++) {
        // آدرس
        // document.getElementsByClassName("dl_left_span")[i].innerText = addres[i];

        // تجربه کاری
        let str = "تجربه کاری " + exp_y[i]+" سال";
        document.getElementsByClassName("dl_left_span_1")[i].innerText = str;

        // رضایت کاربران
        // str = JSON.stringify(resp[i].user_percent) + " درصد رضایت کاربران";
        // document.getElementsByClassName("dl_left_span_2")[i].innerText = str;

        // اولین نوبت خالی
        str = "اولین نوبت خالی " + first_turn[i];
        document.getElementsByClassName("dl_left_bottom_p")[i].innerText = str;

        // اسم
        document.getElementsByClassName("doctors_list_right_h5")[i].innerText = name[i];


        // تخصص
        document.getElementsByClassName("doctors_list_right_h6")[i].innerText = spec[i];

        //نظرات
        // str = "("+"نظر"+ JSON.stringify(resp[i].comments)+")";
        // document.getElementsByClassName("doctors_list_right_span")[i].innerText = str;

        // نظر
        // document.getElementsByClassName("doctors_list_right_p")[i].innerText = JSON.stringify(resp[i].comment_text).substring(1,JSON.stringify(resp[i].comment_text).length-1);

        // عکس
        // document.getElementsByClassName("doctor_img")[i].src = JSON.stringify(resp[i].avatar).substring(1,JSON.stringify(resp[i].avatar).length-1);

    }
}

// در تابع زیر ترتیب نمایش پزشکان با براساس فیلد user_percent از بیش ترین به کم ترین مرتب می شود.
// برای مرتب سازی ابتدا آرایه ای از user_percentهای متعلق به هر پزشک ساخته شده، سپس sort شده است
function sort_doctors() {
    let resp = response;
    var user_percent_array = [];
    var user_percent_unsort = [];
    let j=0;
    while (j < resp.length){
        user_percent_array[j]= JSON.stringify(resp[j].user_percent);
        user_percent_unsort[j]= JSON.stringify(resp[j].user_percent);
        j = j +1;
    }

    user_percent_array.sort(function(a, b){return a - b});
    user_percent_array.reverse();
    document.getElementsByClassName("dl_left_span")[0].innerText = JSON.stringify(resp[0].user_percent);
    var str = "";

    for (let i=0;i<resp.length;i++) {
        let up = user_percent_array[i];
        let up_index = user_percent_unsort.indexOf(up);
        delete user_percent_unsort[up_index];

        // آدرس

        // document.getElementsByClassName("dl_left_span")[i].innerText = JSON.stringify(resp[up_index].location).substring(1,JSON.stringify(resp[up_index].location).length-1);

        // تجربه کاری
        let str = "تجربه کاری " + exp_y_f[up_index] +" سال";
        document.getElementsByClassName("dl_left_span_1")[i].innerText = str;

        // رضایت کاربران
        //
        // str = JSON.stringify(resp[up_index].user_percent) + " درصد رضایت کاربران";
        // document.getElementsByClassName("dl_left_span_2")[i].innerText = str;
        // // str = str + resp[i].name+"";


        // اولین نوبت خالی
        str = "اولین نوبت خالی " + first_turn_f[up_index];
        document.getElementsByClassName("dl_left_bottom_p")[i].innerText = str;

        // اسم
        document.getElementsByClassName("doctors_list_right_h5")[i].innerText = JSON.stringify(resp[up_index].name).substring(1,JSON.stringify(resp[up_index].name).length-1);


        // تخصص
        document.getElementsByClassName("doctors_list_right_h6")[i].innerText = JSON.stringify(resp[up_index].spec).substring(1,JSON.stringify(resp[up_index].spec).length-1);


        //نظرات
        str = "("+"نظر"+ JSON.stringify(resp[up_index].comments)+")";
        document.getElementsByClassName("doctors_list_right_span")[i].innerText = str;

        // نظر
        document.getElementsByClassName("doctors_list_right_p")[i].innerText = JSON.stringify(resp[up_index].comment_text).substring(1,JSON.stringify(resp[up_index].comment_text).length-1);

        // عکس
        document.getElementsByClassName("doctor_img")[i].src = JSON.stringify(resp[up_index].avatar).substring(1,JSON.stringify(resp[up_index].avatar).length-1);

    }

}
getlist();
