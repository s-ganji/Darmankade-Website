function search_main_page() {
    var xhr = new XMLHttpRequest();
    data =document.getElementById("search_main").value;
    document.getElementById("header_search").value = data;

    // xhr.open("GET", "search_main_get_dinf.php?q=" + data, true);
    // xhr.onload = function () {
    //     var resp = JSON.parse(this.response);
    //     // document.getElementById("doctor_name").innerText = resp[0][index];
    //     // var resp = JSON.parse(this.responseText);
    //     show_details(resp[0][index],resp[1][index],resp[2][index],resp[3][index],resp[4][index],resp[5][index],resp[6][index],resp[7][index]);
    //
    // };
    // xhr.onerror = function () {
    //     console.error("Error", xhr.statusText);
    // };
    // xhr.send();
    // window.location.href = "search_main_get_dinf.php";
}
