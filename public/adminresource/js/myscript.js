function loctheothang() {
    input = document.getElementById("thang");

    // Declare variables
    var input, filter, table, tr, td, i, txtValue, tongtien, tien, tiens;
    filter = input.value.toUpperCase();
    table = document.getElementById("baocaotable");
    tr = table.getElementsByTagName("tr");

    if (filter != 0) {
        tongtien = 0;
        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[2];
            tiens = tr[i].getElementsByTagName("td")[9];
            if (td) {
                txtValue = td.textContent || td.innerText;
                txtValue = new Date(txtValue).getMonth() + 1;

                tien = tiens.textContent || tiens.innerText;
                var temp = [];
                temp = tien.split(' ');
                temp = parseInt(temp[56])
                if (txtValue == filter) {
                    tr[i].style.display = "";
                    tongtien += temp;
                } else {
                    tr[i].style.display = "none";
                }
            }
        }

    } else {
        tongtien = 0;
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            tiens = tr[i].getElementsByTagName("td")[9];
            if (td) {
                tien = tiens.textContent || tiens.innerText;
                var temp = [];
                temp = tien.split(' ');
                temp = parseInt(temp[56])
                tongtien += temp;
                console.log(temp)
    
                tr[i].style.display = "";
            }
            
        }
    }
    var tongcong = document.getElementById('tongcong');
    tongcong.textContent = "Tổng cộng: " + tongtien + " VND"
}

function loctheonam() {
    input = document.getElementById("nam");

    // Declare variables
    var input, filter, table, tr, td, i, txtValue, tongtien, tien, tiens;
    filter = input.value.toUpperCase();
    table = document.getElementById("baocaotable");
    tr = table.getElementsByTagName("tr");

    if (filter != 0) {
        tongtien = 0;
        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[2];
            tiens = tr[i].getElementsByTagName("td")[9];
            if (td) {
                txtValue = td.textContent || td.innerText;
                txtValue = new Date(txtValue).getFullYear();
                
                tien = tiens.textContent || tiens.innerText;
                var temp = [];
                temp = tien.split(' ');
                temp = parseInt(temp[56])
                if (txtValue == filter) {
                    tr[i].style.display = "";
                    tongtien += temp;
                } else {
                    tr[i].style.display = "none";
                }
            }
        }

    } else {
        tongtien = 0;
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            tiens = tr[i].getElementsByTagName("td")[9];
            if (td) {
                tien = tiens.textContent || tiens.innerText;
                var temp = [];
                temp = tien.split(' ');
                temp = parseInt(temp[56])
                tongtien += temp;
                console.log(temp)
    
                tr[i].style.display = "";
            }
            
        }
    }
    var tongcong = document.getElementById('tongcong');
    tongcong.textContent = "Tổng cộng: " + tongtien + " VND"
}

function loctheothangvanam() {
    inputthang = document.getElementById("thang");
    inputnam = document.getElementById("nam");

    // Declare variables
    var inputthang, inputnam, filterthang, filternam, table, tr, td, i, txtValue, txtValuethang, txtValuenam, tongtien, tien, tiens;
    filterthang = inputthang.value.toUpperCase();
    filternam = inputnam.value.toUpperCase();
    table = document.getElementById("baocaotable");
    tr = table.getElementsByTagName("tr");

    if (filterthang != 0) {
        tongtien = 0;
        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[2];
            tiens = tr[i].getElementsByTagName("td")[9];
            if (td) {
                txtValue = td.textContent || td.innerText;
                txtValuethang = new Date(txtValue).getMonth()+1;
                txtValuenam = new Date(txtValue).getFullYear();

                tien = tiens.textContent || tiens.innerText;
                var temp = [];
                temp = tien.split(' ');
                temp = parseInt(temp[56])
                if (txtValuethang == filterthang && txtValuenam == filternam) {
                    tr[i].style.display = "";
                    tongtien += temp;
                } else {
                    tr[i].style.display = "none";
                }
            }
        }

    } else {
        tongtien = 0;
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            tiens = tr[i].getElementsByTagName("td")[9];
            if (td) {
                tien = tiens.textContent || tiens.innerText;
                var temp = [];
                temp = tien.split(' ');
                temp = parseInt(temp[56])
                tongtien += temp;
                console.log(temp)
    
                tr[i].style.display = "";
            }
            
        }
    }
    var tongcong = document.getElementById('tongcong');
    tongcong.textContent = "Tổng cộng: " + tongtien + " VND"
}

