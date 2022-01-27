document.getElementById("e-link").onclick = changePage_elink;
document.getElementById("see_all_link").onclick = changePage_seeAllLink;
document.getElementById("icon_link").onclick = changePage_icon_link;
document.getElementById("icon_link2").onclick = changePage_icon_link;
document.getElementById("icon_link3").onclick = changePage_icon_link;
document.getElementById("icon_link4").onclick = changePage_icon_link;
document.getElementById("icon_link5").onclick = changePage_icon_link;
document.getElementById("icon_link6").onclick = changePage_icon_link;
document.getElementById("icon_link7").onclick = changePage_icon_link;


// تغییر صفحه با کلیک بر روی گزینه ی ورود به صفحه ی login
function changePage_elink() {
    document.location.href="login_page.html";
}
// تغییر صفحه با کلیک بر گزینه ی مشاده همه به صفحه ی لیست تخصص ها
function changePage_seeAllLink() {
    document.location.href="profession_list_page.html";
}
// در صفحه اصلی با تلیک بر روی هر یک از تخصص ها به صفحه ی لیست پزشکان هدایت می شود.
function changePage_icon_link() {
    document.location.href="doctors_list_page.html";
}
// در صفحه تخصص ها با کلیک بر روی هر یک از باکس تخصص ها به صفحه لیست پزشکان منتقل میشود.

function sign_up_patiants(){
    document.location.href="sign_up_patiants.html";
}
function sign_up_doctors(){
    document.location.href="sign_up_doctors.html";
}
function login_doctors(){
    document.location.href="login_page_doctors.html";
}

