var tructiepid = document.getElementById("tructiep")
var chuyenkhoanid = document.getElementById("chuyenkhoan")
var nhapsotien = document.getElementById("nhapsotien")
var nhappchuyenkhoan = document.getElementById("nhapchuyenkhoan")

function doitructiep_chuyenkhoan(){
    if(tructiepid.checked){
        nhappchuyenkhoan.style.display = "none"
        nhapsotien.style.display = ""
    }
    if(chuyenkhoanid.checked){
        nhappchuyenkhoan.style.display = ""
        nhapsotien.style.display = "none"
    }
}