// در این تابع با استفاده از id باکس پزشکی که روی آن کلیک شده ایتدا نام پرشک بدست می آید. سپس براساس نام پزشک آی دی آن بدست می آید و در doctor_id ذخیره میشود.
// var response;
function changePage_details(clicked_id) {
    document.getElementById("doctors_list_right_h5").innerText= "hello";
    // // data = "";
    // var xhr = new XMLHttpRequest();
    // data ="hel";
    // xhr.open("GET", "get_d_list.php?q=" + data, true);
    // xhr.onload = function () {
    //     var resp = JSON.parse(this.responseText);
    //     document.getElementsByClassName("doctors_list_right_h5")[0].innerHTML = resp[0];
    //     // document.getElementById("dd").innerText = this.responseText;
    //     // find_id(resp,clicked_id);
    //
    // };
    // xhr.onerror = function () {
    //     console.error("Error", xhr.statusText);
    // };
    // xhr.send();
}
function hello() {
    document.getElementById("doctors_list_right_h5").innerText= "hello";
}

function find_id(resp,clicked_id) {
    let name = document.getElementsByClassName("doctors_list_right_h5")[clicked_id].textContent;
    var doctor_id;

    let name_list = [];


    let i =0;
    while(i < resp.length){
        name_list[i] = resp[i].name;
        i = i+1;
    }
    let name_index = name_list.indexOf(name);
    sessionStorage.setItem('key', name_index);
    // response = resp[name_index];

    document.location.href ="doctor_page.html";


}



